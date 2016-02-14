<?php
/**
 * @file
 * Webform Component information for a phone number field type
 */
/**
 * Implements _webform_defaults_component().
 */
function _webform_defaults_phone() {
  return array(
    'name'      => '',
    'form_key'  => NULL,
    'required'  => 0,
    'mandatory' => 0,
    'pid'       => 0,
    'weight'    => 0,
    'value'     => '',
    'extra'     => array(
      'title_display'              => 0,
      'width'                      => '',
      'disabled'                   => FALSE,
      'private'                    => FALSE,
      'attributes'                 => array(),
      'description'                => '',
      'placeholder'                => '',
      'country'                    => 'ca',
      'phone_country_code'         => 0,
      'phone_default_country_code' => 1,
      'phone_int_max_length'       => 15,
      'ca_phone_separator'         => '-',
      'ca_phone_parentheses'       => 1,
    ),
  );
}

/**
 * Implements _webform_theme_component().
 */
function _webform_theme_phone() {
  return array( 'webform_display_phonefield' => array( 'render element' => 'element' ) );
}

/**
 * Generate the form for editing a component.
 * Create a set of form elements to be displayed on the form for editing this
 * component. Use care naming the form items, as this correlates directly to the
 * database schema. The component "Name" and "Description" fields are added to
 * every component type and are not necessary to specify here (although they
 * may be overridden if desired).
 *
 * @param $component
 *   A Webform component array.
 *
 * @return
 *   An array of form items to be displayed on the edit component page
 */
function _webform_edit_phone($component) {
  $form = array();
  // General Options
  $form['extra']['country'] = array(
    '#type'          => 'select',
    '#title'         => t('Country'),
    '#options'       => phone_countries(),
    '#default_value' => $component['extra']['country'],
    '#description'   => t('Which country-specific rules should this field be validated against and formatted according to.'),
    '#required'      => TRUE,
  );
  $form['extra']['phone_country_code'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Add the country code if not filled by the user'),
    '#default_value' => $component['extra']['phone_country_code'],
  );
  // International Options
  $form['extra']['phone_int_help'] = array(
    '#type'   => 'markup',
    '#value'  => t('International phone numbers are in the form +XX YYYYYYY where XX is a country code and YYYYYYY is the local number. This field type is based off of the <a href="http://www.itu.int/rec/T-REC-E.123/en">E.123 specification</a>.'),
    '#states' => array(
      'visible' => array(
        ':input[name="extra[country]"]' => array( 'value' => 'int' ),
      ),
    ),
  );
  $form['extra']['phone_default_country_code'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Default country code to add to international numbers without one (omit + sign)'),
    '#default_value' => $component['extra']['phone_default_country_code'],
    '#states'        => array(
      'visible' => array(
        ':input[name="extra[country]"]' => array( 'value' => 'int' ),
      ),
    ),
  );
  $form['extra']['phone_int_max_length'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Maximum length of international numbers, according to the ITU this is 15'),
    '#default_value' => $component['extra']['phone_int_max_length'],
    '#states'        => array(
      'visible' => array(
        ':input[name="extra[country]"]' => array( 'value' => 'int' ),
      ),
    ),
  );
  // US/Canada Options
  $form['extra']['ca_phone_separator'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Separator'),
    '#default_value' => $component['extra']['ca_phone_separator'],
    '#size'          => 2,
    '#states'        => array(
      'visible' => array(
        ':input[name="extra[country]"]' => array( 'value' => 'ca' ),
      ),
    ),
  );
  $form['extra']['ca_phone_parentheses'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Use parentheses around area code'),
    '#default_value' => $component['extra']['ca_phone_parentheses'],
    '#states'        => array(
      'visible' => array(
        ':input[name="extra[country]"]' => array( 'value' => 'ca' ),
      ),
    ),
  );
  $form['value'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Default value'),
    '#default_value' => $component['value'],
    '#description'   => t('The default value of the field.') . theme('webform_token_help'),
    '#size'          => 60,
    '#maxlength'     => 1024,
    '#weight'        => 0,
  );
  $form['display']['width'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Width'),
    '#default_value' => $component['extra']['width'],
    '#description'   => t('Width of the textfield.') . ' ' . t('Leaving blank will use the default size.'),
    '#size'          => 5,
    '#maxlength'     => 10,
    '#weight'        => 0,
    '#parents'       => array( 'extra', 'width' ),
  );
  $form['display']['placeholder'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Placeholder'),
    '#default_value' => $component['extra']['placeholder'],
    '#description'   => t('The text will be shown in the field until the user starts entering a value.'),
    '#weight'        => 1,
    '#parents'       => array( 'extra', 'placeholder' ),
  );
  $form['display']['disabled'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Disabled'),
    '#return_value'  => 1,
    '#description'   => t('Make this field non-editable. Useful for setting an unchangeable default value.'),
    '#weight'        => 11,
    '#default_value' => $component['extra']['disabled'],
    '#parents'       => array( 'extra', 'disabled' ),
  );
  return $form;
}

/**
 * Render a Webform component to be part of a form.
 *
 * @param $component
 *   A Webform component array.
 * @param $value
 *   If editing an existing submission or resuming a draft, this will contain
 *   an array of values to be shown instead of the default in the component
 *   configuration. This value will always be an array, keyed numerically for
 *   each value saved in this field.
 * @param $filter
 *   Whether or not to filter the contents of descriptions and values when
 *   rendering the component. Values need to be unfiltered to be editable by
 *   Form Builder.
 *
 * @see _webform_client_form_add_component()
 */
function _webform_render_phone($component, $value = NULL, $filter = TRUE) {
  //TODO: change these to use non-private functions (no _) if/when webform 3.x is entirely deprecated
  $form_item = array(
    '#type'             => module_exists('elements') ? 'telfield' : 'textfield',
    //    '#default_value'    => $filter ? webform_replace_tokens($component['value'], NULL, NULL, NULL, TRUE) : $component['value'],
    '#default_value'    => $filter ? _webform_filter_values($component['value']) : $component['value'],
    '#attributes'       => $component['extra']['attributes'],
    '#theme_wrappers'   => array( 'webform_element' ),
    //    '#description'      => $filter ? webform_filter_descriptions($component['extra']['description']) : $component['extra']['description'],
    '#description'      => $filter ? _webform_filter_descriptions($component['extra']['description']) : $component['extra']['description'],
    '#element_validate' => array( 'webform_validate_phone' ),
    '#maxlength'        => ( $component['extra']['country'] == 'int' ? ( isset( $component['extra']['phone_int_max_length'] ) ? $component['extra']['phone_int_max_length'] : NULL ) : NULL ),
    '#required'         => $component['required'] || $component['mandatory'], //Either one being true will could as required...because webform changed in 4.x-alpha8
    '#size'             => 17,
    //    '#title'            => $filter ? webform_filter_xss($component['name']) : $component['name'],
    '#title'            => $filter ? _webform_filter_xss($component['name']) : $component['name'],
    '#title_display'    => $component['extra']['title_display'] ? $component['extra']['title_display'] : 'before',
    '#weight'           => $component['weight'],
    '#translatable'     => array( 'title', 'description' ),
  );
  if ($component['required']) {
    $form_item['#attributes']['required'] = 'required';
  }
  if (isset( $value )) {
    $form_item['#default_value'] = $value[0];
  }
  // Change the 'width' option to the correct 'size' option.
  if ($component['extra']['width'] > 0) {
    $form_item['#size'] = $component['extra']['width'];
  }
  // Show the placeholder text if used.
  if ($component['extra']['placeholder']) {
    $form_item['#attributes']['placeholder'] = $component['extra']['placeholder'];
  }
  if ($component['extra']['disabled']) {
    if ($filter) {
      $form_item['#attributes']['readonly'] = 'readonly';
    }
    else {
      $form_item['#disabled'] = TRUE;
    }
  }
  if (isset( $value[0] )) {
    $form_item['#default_value'] = $value[0];
  }
  return $form_item;
}

/**
 * Validation Callback for phone field
 */
function webform_validate_phone($element, $form_state) {
  $value = $element['#value'];
  if (isset( $value ) && $value != '') {
    $ccode = $element['#webform_component']['extra']['country'];
    //run through 'phone' module's validation
    if (!valid_phone_number($ccode, $value)) {
      $country = phone_country_info($ccode);
      form_error($element, t($country['error'], array( '%value' => $value )));
    }
  }
}

/**
 * Display the result of a submission for a component.
 * The output of this function will be displayed under the "Results" tab then
 * "Submissions". This should output the saved data in some reasonable manner.
 *
 * @param $component
 *   A Webform component array.
 * @param $value
 *   An array of information containing the submission result, directly
 *   correlating to the webform_submitted_data database table schema.
 * @param $format
 *   Either 'html' or 'text'. Defines the format that the content should be
 *   returned as. Make sure that returned content is run through check_plain()
 *   or other filtering functions when returning HTML.
 *
 * @return
 *   A renderable element containing at the very least these properties:
 *    - #title
 *    - #weight
 *    - #component
 *    - #format
 *    - #value
 *   Webform also uses #theme_wrappers to output the end result to the user,
 *   which will properly format the label and content for use within an e-mail
 *   (such as wrapping the text) or as HTML (ensuring consistent output).
 */
function _webform_display_phone($component, $value, $format = 'html') {
  return array(
    '#title'          => $component['name'],
    '#title_display'  => $component['extra']['title_display'] ? $component['extra']['title_display'] : 'before',
    '#weight'         => $component['weight'],
    '#theme'          => 'webform_display_phonefield',
    '#theme_wrappers' => $format == 'html' ? array( 'webform_element' ) : array( 'webform_element_text' ),
    '#post_render'    => array( 'webform_element_wrapper' ),
    '#component'      => $component,
    '#format'         => $format,
    '#value'          => isset( $value[0] ) ? $value[0] : '',
    '#translatable'   => array( 'title', 'description' ),
  );
}

/**
 * Format the output of data for this component.
 */
function theme_webform_display_phonefield($variables) {
  $element = $variables['element'];
  $plain_value = check_plain($element['#value']);
  if ($element['#format'] == 'html') {
    //Use smarter detection if available for formatting the output
    $is_mobile_device = module_exists('mobile_tools') ? mobile_tools_is_mobile_device() : strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') !== FALSE || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== FALSE;
    $value = ( $is_mobile_device ) ? '<a href="tel:' . $plain_value . '">' . $plain_value . '</a>' : $plain_value;
  }
  else {
    $value = $plain_value;
  }
  return $value;
}

/**
 * A hook for changing the input values before saving to the database.
 * Webform expects a component to consist of a single field, or a single array
 * of fields. If you have a component that requires a deeper form tree
 * you must flatten the data into a single array using this callback
 * or by setting #parents on each field to avoid data loss and/or unexpected
 * behavior.
 * Note that Webform will save the result of this function directly into the
 * database.
 *
 * @param $component
 *   A Webform component array.
 * @param $value
 *   The POST data associated with the user input.
 *
 * @return
 *   An array of values to be saved into the database. Note that this should be
 *   a numerically keyed array.
 */
function _webform_submit_phone($component, $value) {
  $ccode = $component['extra']['country'];
  if (phone_countries($ccode) !== NULL) {
    if (isset( $value ) && !empty( $value )) {
      //Use 'phone' module to format the number
      return format_phone_number($ccode, $value, $component['extra']);
    }
  }
  return FALSE; //If we haven't returned already, something failed.
}

/**
 * Calculate and returns statistics about results for this component.
 * This takes into account all submissions to this webform. The output of this
 * function will be displayed under the "Results" tab then "Analysis".
 *
 * @param $component
 *   An array of information describing the component, directly correlating to
 *   the webform_component database schema.
 * @param $sids
 *   An optional array of submission IDs (sid). If supplied, the analysis will
 *   be limited to these sids.
 * @param $single
 *   Boolean flag determining if the details about a single component are being
 *   shown. May be used to provided detailed information about a single
 *   component's analysis, such as showing "Other" options within a select list.
 *
 * @return
 *   An array of data rows, each containing a statistic for this component's
 *   submissions.
 */
function _webform_analysis_phone($component, $sids = array(), $single = FALSE) {
  // Generate the list of options and questions.
  $query = db_select('webform_submitted_data', 'wsd', array( 'fetch' => PDO::FETCH_ASSOC ))->fields('wsd', array( 'data' ))->condition('nid', $component['nid'])->condition('cid', $component['cid']);
  if (count($sids)) {
    $query->condition('sid', $sids, 'IN');
  }
  $non_blanks = 0;
  $submissions = 0;
  $result = $query->execute();
  foreach ($result as $data) {
    if (drupal_strlen(trim($data['data'])) > 0) {
      $non_blanks++;
    }
    $submissions++;
  }
  $rows[0] = array(
    t('Left Blank'),
    ( $submissions - $non_blanks )
  );
  $rows[1] = array(
    t('User entered value'),
    $non_blanks
  );
  return $rows;
}

/**
 * Return the result of a component value for display in a table.
 * The output of this function will be displayed under the "Results" tab then
 * "Table".
 *
 * @param $component
 *   A Webform component array.
 * @param $value
 *   An array of information containing the submission result, directly
 *   correlating to the webform_submitted_data database schema.
 *
 * @return
 *   Textual output formatted for human reading.
 */
function _webform_table_phone($component, $value) {
  return check_plain(empty( $value[0] ) ? '' : $value[0]);
}

/**
 * Return the header for this component to be displayed in a CSV file.
 * The output of this function will be displayed under the "Results" tab then
 * "Download".
 *
 * @param $component
 *   A Webform component array.
 * @param $export_options
 *   An array of options that may configure export of this field.
 *
 * @return
 *   An array of data to be displayed in the first three rows of a CSV file, not
 *   including either prefixed or trailing commas.
 */
function _webform_csv_headers_phone($component, $export_options) {
  $header = array();
  $header[0] = '';
  $header[1] = '';
  $header[2] = $export_options['header_keys'] ? $component['form_key'] : $component['name'];
  return $header;
}

/**
 * Format the submitted data of a component for CSV downloading.
 * The output of this function will be displayed under the "Results" tab then
 * "Download".
 *
 * @param $component
 *   A Webform component array.
 * @param $export_options
 *   An array of options that may configure export of this field.
 * @param $value
 *   An array of information containing the submission result, directly
 *   correlating to the webform_submitted_data database schema.
 *
 * @return
 *   An array of items to be added to the CSV file. Each value within the array
 *   will be another column within the file. This function is called once for
 *   every row of data.
 */
function _webform_csv_data_phone($component, $export_options, $value) {
  return !isset( $value[0] ) ? '' : $value[0];
}

/**
 * The first hook provides the name and position of the field in the Form Builder palette, as well as a default element to display when the field is pulled out of the palette.
 * The second hook maps the component properties and options to FormAPI properties that Form Builder can manipulate.
 * Form Builder then will manage pulling the form out of the normal Webform configuration form, loading configuration, and saving it.
 * There are plenty of examples in the form_builder_webform.components.inc file that other modules (such as Webform Phone Number) can use as templates.
 * I'm moving this request over to that module's queue, and changing to a feature request.
 */
/**
 * @defgroup form-builder-webform-phone-callbacks Callbacks for the Phone component
 * @{
 */
/**
 * Implements _form_builder_webform_form_builder_types_component().
 */
function _form_builder_webform_form_builder_types_phone() {
  drupal_add_css(drupal_get_path('module', 'webform_phone') . '/webform_phone.css');
  $fields = array();
  $fields['phone'] = array(
    'title'      => t('Phone Number'),
    'properties' => array(
      'country',
      'phone_country_code',
      'phone_default_country_code',
      'phone_int_max_length',
      'ca_phone_separator',
      'ca_phone_parentheses',
    ),
    'weight'     => -17,
    //Doesn't make sense that modules get to weight themselves, why wouldn't everyone want to be first?
  );
  $defaults = _webform_defaults_phone();
  $fields['phone']['default'] = _form_builder_webform_default('phone');
  $fields['phone']['default']['#title'] = t('New Phone Number Field');
  $fields['phone']['default']['#country'] = $defaults['extra']['country'];
  $fields['phone']['default']['#phone_country_code'] = $defaults['extra']['phone_country_code'];
  $fields['phone']['default']['#phone_default_country_code'] = $defaults['extra']['phone_default_country_code'];
  $fields['phone']['default']['#phone_int_max_length'] = $defaults['extra']['phone_int_max_length'];
  $fields['phone']['default']['#ca_phone_separator'] = $defaults['extra']['ca_phone_separator'];
  $fields['phone']['default']['#ca_phone_parentheses'] = $defaults['extra']['ca_phone_parentheses'];
  return $fields;
}

/**
 * Implements _form_builder_webform_form_builder_map_component().
 */
function _form_builder_webform_form_builder_map_phone() {
  return array(
    'form_builder_type' => 'phone',
    'properties'        => array(
      'country'                    => array(
        'form_parents'    => array(
          'extra',
          'country'
        ),
        'storage_parents' => array(
          'extra',
          'country'
        ),
      ),
      'phone_country_code'         => array(
        'form_parents'    => array(
          'extra',
          'phone_country_code'
        ),
        'storage_parents' => array(
          'extra',
          'phone_country_code'
        ),
      ),
      'phone_default_country_code' => array(
        'form_parents'    => array(
          'extra',
          'phone_default_country_code'
        ),
        'storage_parents' => array(
          'extra',
          'phone_default_country_code'
        ),
      ),
      'phone_int_max_length'       => array(
        'form_parents'    => array(
          'extra',
          'phone_int_max_length'
        ),
        'storage_parents' => array(
          'extra',
          'phone_int_max_length'
        ),
      ),
      'ca_phone_separator'         => array(
        'form_parents'    => array(
          'extra',
          'ca_phone_separator'
        ),
        'storage_parents' => array(
          'extra',
          'ca_phone_separator'
        ),
      ),
      'ca_phone_parentheses'       => array(
        'form_parents'    => array(
          'extra',
          'ca_phone_parentheses'
        ),
        'storage_parents' => array(
          'extra',
          'ca_phone_parentheses'
        ),
      ),
    ),
  );
}
/**
 * @} End of "defgroup form-builder-webform-phone-callbacks"
 */

