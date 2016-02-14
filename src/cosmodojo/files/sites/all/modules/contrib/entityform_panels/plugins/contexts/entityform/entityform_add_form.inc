<?php

/**
 * @file
 * Plugin to provide a entityform_add_form context
 */

/**
 * Plugins are described by creating a $plugin array which will be used
 * by the system that includes this file.
 */
$plugin = array(
  'title' => t('Entityform add form'),
  'description' => t('A entityform add form.'),
  'context' => 'entityform_context_create_entityform_add_form',
  'edit form' => 'entityform_context_entityform_add_form_settings_form',
  'defaults' => array('type' => ''),
  'keyword' => 'entityform_add',
  'context name' => 'entityform_add_form',
  'convert list' => array('type' => t('Entityform type')),
  'convert' => 'entityform_context_entityform_add_form_convert',
  'placeholder form' => array(
    '#type' => 'textfield',
    '#description' => t('Enter the entityform type of this context.'),
  ),
);

/**
 * Form callback.
 *
 * It's important to remember that $conf is optional here, because contexts
 * are not always created from the UI.
 */
function entityform_context_create_entityform_add_form($empty, $data = NULL, $conf = FALSE) {
  static $creating = FALSE;
  $context = new ctools_context(array(
    'form',
    'entityform_add_form',
    'entityform_add',
    'entity:entityformtype',
    'entity:entityform',
  ));
  $context->plugin = 'entityform_add_form';

  if ($empty || ($creating)) {
    return $context;
  }
  $creating = TRUE;

  if (!empty($data)) {
    $types = entityform_get_types();
    $type = $data['type'];

    // Validate the entityform type exists.
    if (isset($types[$type]) && entityform_access('create', $type)) {
      // Initialize settings:
      global $user;

      // Do what entityform_form_wrapper() does.
      // @see entityform_form_wrapper()
      $entityform = entityform_empty_load($type);
      $form_state = array(
        'want form' => TRUE,
        'build_info' => array(
          'args' => array($entityform, 'submit'),
        ),
      );
      // Use module_load_include so that caches and stuff can know to load this.
      form_load_include($form_state, 'inc', 'entityform', 'entityform.admin');
      $form_id = $entityform->type . '_entityform_edit_form';
      $form = drupal_build_form($form_id, $form_state);

      // In a form, $data is the object being edited.
      $context->data     = $entityform;
      $context->title    = $types[$type]->label;
      $context->argument = $type;

      // These are specific pieces of data to this form.
      // All forms should place the form here.
      $context->form       = $form;
      $context->form_state = $form_state;
      $context->form_id    = $form_id;
      $context->form_title = t('Submit @name', array('@name' => $types[$type]->label));
      $context->entityform_type  = $type;
      $context->restrictions['type'] = array($type);
      $context->restrictions['form'] = array('form');

      $creating = FALSE;
      return $context;
    }
  }
  $creating = FALSE;
}

/**
 * Edit form.
 */
function entityform_context_entityform_add_form_settings_form($form, &$form_state) {
  $conf = $form_state['conf'];

  $options = array_keys(entityform_get_types());
  $options = array_combine($options, $options);

  $form['type'] = array(
    '#title' => t('Entiyform type'),
    '#type' => 'select',
    '#options' => $options,
    '#default_value' => $conf['type'],
    '#description' => t('Select the node type for this form.'),
  );

  return $form;
}

/**
 * Edit form submit.
 */
function entityform_context_entityform_add_form_settings_form_submit($form, &$form_state) {
  $form_state['conf']['type'] = $form_state['values']['type'];
}

/**
 * Convert a context into a string.
 */
function entityform_context_entityform_add_form_convert($context, $type) {
  switch ($type) {
    case 'type':
      return $context->data->type;
  }
}
