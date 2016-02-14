<?php

/**
 * @file
 * Handle rendering entityform form fields as panes.
 */

$plugin = array(
  'title' => t('Entityform form field'),
  'defaults' => array(
    'label' => '',
    'formatter' => '',
    'hide_field' => FALSE,
    'enable_custom_default_value' => FALSE,
    'custom_default_value' => array(),
    'substitute' => FALSE,
  ),
  'category' => 'EntityForm',
  'content types' => 'entityform_form_field_content_type_content_types',
  'render callback' => 'entityform_form_field_content_type_render',
  'admin title' => 'entityform_form_field_content_type_admin_title',
  'admin info' => 'entityform_form_field_content_type_admin_info',
  'edit form' => 'entityform_form_field_content_type_edit_form',
  'content type' => 'entityform_form_field_content_type_content_type',
  'all contexts' => TRUE,
  'required context' => 'entityform_add_form',
);

/**
 * Just one subtype.
 *
 * Ordinarily this function is meant to get just one subtype. However, we are
 * using it to deal with the fact that we have changed the subtype names. This
 * lets us translate the name properly.
 */
function entityform_form_field_content_type_content_type($subtype) {
  $types = entityform_form_field_content_type_content_types();
  if (isset($types[$subtype])) {
    return $types[$subtype];
  }
}


/**
 * Return all field content types available.
 */
function entityform_form_field_content_type_content_types() {
  // This will hold all the individual field content types.
  $types = array();
  $content_types = array();
  $entity_type = 'entityform';
  $entity = entity_get_info($entity_type);

  foreach ($entity['bundles'] as $type => $bundle) {
    foreach (field_info_instances($entity_type, $type) as $field_name => $field) {
      if (!isset($types[$entity_type . ':' . $field_name])) {
        $types[$entity_type . ':' . $field_name] = array(
          'category' => t('EntityForm'),
          'icon' => 'icon_field.png',
          'title' => t('Field form: @widget_label', array(
            '@widget_label' => t($field['label']),
          )),
          'description' => t('Field on the referenced entity.'),
          'required context' => new ctools_context_required(t('Entityform Add Form'), 'entityform_add_form'),
        );
      }
      $content_types[$entity_type . ':' . $field_name]['types'][$type] = $bundle['label'];
    }
  }
  return $types;
}

/**
 * Render the custom content type.
 *
 * @todo Default value overriding needs some refactoring to speed it up!!!
 */
function entityform_form_field_content_type_render($subtype, $conf, $panel_args, &$contexts) {
  if (empty($contexts[$conf['context']]) || empty($contexts[$conf['context']]->data)) {
    return;
  }
  $context = &$contexts[$conf['context']];

  // Get a shortcut to the entity.
  $entity = $context->data;
  list($entity_type, $field_name) = explode(':', $subtype, 2);

  // Load the entity type's information for this field.
  $ids = entity_extract_ids($entity_type, $entity);
  $field = field_info_field($field_name);
  $instance = field_info_instance($entity_type, $field_name, $ids[2]);

  // Do not render if the entity type does not have this field.
  if (empty($instance)) {
    return;
  }
  $block = new stdClass();

  if (isset($context->form)) {

    // Set custom default value if enabled.
    if (!empty($conf['enable_custom_default_value'])) {
      $entity_wrapper = entity_metadata_wrapper($entity_type, $entity);
      // Check if the default value has to be checked for keywords.
      if (!empty($conf['substitute'])) {
        foreach ($conf['custom_default_value'] as $column => $custom_value) {
          $conf['custom_default_value'][$column] = ctools_context_keyword_substitute($custom_value, array(), $contexts);
        }
      }
      foreach ($conf['custom_default_value'] as $column => $custom_value) {
        if (count($field['columns']) > 1) {
          $entity_wrapper->{$field_name}->setProperty($column, $conf['custom_default_value'][$column]);
        }
        else {
          if ($entity_wrapper->{$field_name} instanceof EntityListWrapper) {
            $conf['custom_default_value'][$column] = array($conf['custom_default_value'][$column]);
          }
          $entity_wrapper->{$field_name} = $conf['custom_default_value'][$column];
        }
      }

      $default_value_structure = $entity_wrapper->value()->{$field_name};
      $instance['default_value'] = $default_value_structure;
      $context->form_state['values'][$field_name] = $default_value_structure;

      // Overwrite the default form element with one that contains the custom
      // default value. This is necessary since we don't know how the form
      // element is build and this can't directly inject the new value.
      $field_form_element = ctools_field_invoke_field_default($instance, 'form', $entity_type, $entity_wrapper->value(), $context->form, $context->form_state);
      $context->form[$field_name] = $field_form_element[$field_name] + $context->form[$field_name];
      // Has to be called to ensure the new value is set.
      form_builder($context->form['#form_id'], $context->form, $context->form_state);
    }

    // Hide the field.
    if (!empty($conf['hide_field'])) {
      // We can't set access to false because that would collide with the
      // validators.
      $context->form[$field_name]['#prefix'] = '<span class="element-hidden">';
      $context->form[$field_name]['#suffix'] = '</span>';
    }

    $block->content = array();
    $block->content[$field_name] = $context->form[$field_name];
    // Remove the field from the global form rendering array.
    unset($context->form[$field_name]);
  }
  else {
    $block->content = t('Entity info.');
  }

  return $block;
}

/**
 * Returns the administrative title for an instance of this content type.
 */
function entityform_form_field_content_type_admin_title($subtype, $conf, $context) {
  list($entity_type, $field_name) = explode(':', $subtype, 2);

  if (!empty($context->restrictions)) {
    $field = field_info_instance($entity_type, $field_name, $context->restrictions['type'][0]);
  }
  else {
    $field = array('label' => $subtype);
  }

  return t('EntityForm element @field', array('@field' => $field['label']));
}

/**
 * Returns the administrative information for an instance of this content type.
 */
function entityform_form_field_content_type_admin_info($subtype, $conf, $context) {
  $info = NULL;
  if (!empty($conf['enable_custom_default_value'])) {
    $info .= t('Custom default value set.') . '<br />';
  }
  if (!empty($conf['substitute'])) {
    $info .= t('Token replacement enabled.') . '<br />';
  }
  if (!empty($conf['hide_field'])) {
    $info .= t('Form field hidden.') . '<br />';
  }

  return (object) array(
    'title' => check_plain(str_replace("_", " ", $subtype)),
    'content' => $info,
  );
}


/**
 * Allow some detailed configuration.
 */
function entityform_form_field_content_type_edit_form($form, &$form_state) {
  $conf = $form_state['conf'] + $form_state['plugin']['defaults'];
  // If no context is selected fetch the default one.
  if (empty($conf['context'])) {
    $conf['context'] = key($form['context']['#options']);
  }
  $context = $form_state['contexts'][$conf['context']];
  // Get a shortcut to the entity.
  $entity = $context->data;
  list($entity_type, $field_name) = explode(':', $form_state['subtype_name'], 2);
  $entity_wrapper = entity_metadata_wrapper($entity_type, $entity);

  // Load the entity type's information for this field.
  $ids = entity_extract_ids($entity_type, $entity);
  $field = field_info_field($field_name);
  $instance = field_info_instance($entity_type, $field_name, $ids[2]);

  $form['hide_field'] = array(
    '#type' => 'checkbox',
    '#title' => t('Hide field'),
    '#description' => t('Hides the field but saves the value nevertheless'),
    '#default_value' => $conf['hide_field'],
  );

  $form['enable_custom_default_value'] = array(
    '#type' => 'checkbox',
    '#title' => t('Overwrite the default value'),
    '#description' => t('If enabled the default field values can be overwritten.'),
    '#default_value' => $conf['enable_custom_default_value'],
  );
  $form['substitute'] = array(
    '#type' => 'checkbox',
    '#title' => t('Use context keywords'),
    '#description' => t('If checked, context keywords will be substituted in the default value.'),
    '#default_value' => $conf['substitute'],
    '#states' => array(
      'invisible' => array(
        ':input[name="enable_custom_default_value"]' => array('checked' => FALSE),
      ),
    ),
  );

  ctools_form_include($form_state, 'field_ui.admin', 'field_ui', '');
  $form['custom_default_value'] = array(
    '#type' => 'fieldset',
    '#title' => t('Default values for the field columns.'),
    '#collapsible' => FALSE,
    '#tree' => TRUE,
    '#states' => array(
      'invisible' => array(
        ':input[name="enable_custom_default_value"]' => array('checked' => FALSE),
      ),
    ),
  );
  foreach ($field['columns'] as $column_name => $column) {
    $form['custom_default_value'][$column_name] = array(
      '#type' => 'textfield',
      '#title' => $column_name,
      '#default_value' => (isset($conf['custom_default_value'][$column_name])) ? $conf['custom_default_value'][$column_name] : NULL,
    );
  }

  $form['contexts'] = array(
    '#title' => t('Substitutions'),
    '#type' => 'fieldset',
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#states' => array(
      'visible' => array(
        ':input[name="enable_custom_default_value"]' => array('checked' => TRUE),
        ':input[name="substitute"]' => array('checked' => TRUE),
      ),
    ),
  );
  $rows = array();
  foreach ($form_state['contexts'] as $context) {
    foreach (ctools_context_get_converters('%' . check_plain($context->keyword) . ':', $context) as $keyword => $title) {
      $rows[] = array(
        check_plain($keyword),
        t('@identifier: @title', array('@title' => $title, '@identifier' => $context->identifier)),
      );
    }
  }
  $header = array(t('Keyword'), t('Value'));
  $form['contexts']['context'] = array(
    '#markup' => theme('table', array('header' => $header, 'rows' => $rows)),
  );

  return $form;
}

/**
 * Save configuration.
 */
function entityform_form_field_content_type_edit_form_validate($form, &$form_state) {
  list($entity_type, $field_name) = explode(':', $form_state['subtype_name'], 2);
  // Ignore errors from the default value form fields. To allow keywords.
  if ($form_state['values']['substitute']) {
    if ($form_errors = form_get_errors()) {
      foreach ($form_errors as $element => $error) {
        if (stripos($element, $field_name) === 0) {
          $form = &drupal_static('form_set_error', array());
          unset($form[$element]);
        }
      }
    }
  }
  return $form;
}

/**
 * Save configuration.
 */
function entityform_form_field_content_type_edit_form_submit($form, &$form_state) {
  foreach ($form_state['plugin']['defaults'] as $key => $value) {
    if (isset($form_state['values'][$key])) {
      $form_state['conf'][$key] = $form_state['values'][$key];
    }
  }
  return $form;
}
