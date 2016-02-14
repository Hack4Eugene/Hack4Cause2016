<?php

/**
 * @file
 * Provide access control/visibility based on entityform submission token.
 */

if (module_exists('entityform_anonymous')) {
  $plugin = array(
    'title' => t('Entityform: Anonymous token is valid'),
    'description' => t('Control access by the submission token.'),
    'callback' => 'entityform_anonymous_valid_token_ctools_access_check',
    'settings form' => 'entityform_anonymous_valid_token_ctools_access_settings',
    'summary' => 'entityform_anonymous_valid_token_ctools_access_summary',
    'required context' => array(
      new ctools_context_required(t('Entityform Submission'), 'entity:entityform'),
      new ctools_context_optional(t('Submission token'), 'string'),
    ),
  );
}

/**
 * Settings form.
 */
function entityform_anonymous_valid_token_ctools_access_settings($form, &$form_state, $conf) {
  $form['context'][1]['#description'] = t('Note: if no context is chosen, the GET request parameter <em>token</em> is used.');
  return $form;
}

/**
 * Check for access.
 */
function entityform_anonymous_valid_token_ctools_access_check($conf, $context) {
  $token = NULL;
  if (isset($context[1]->data)) {
    $token = $context[1]->data;
  }
  elseif (isset($_GET['token'])) {
    $token = $_GET['token'];
  }
  return isset($context[0]->data) && $token == _entityform_anonymous_get_token($context[0]->data->identifier());
}

/**
 * Provide a summary description.
 */
function entityform_anonymous_valid_token_ctools_access_summary($conf, $context) {
  $token_identifier = $context[1]->type == 'any' ? t('Current token request parameter') : $context[1]->identifier;
  return t('@token is a valid token for @submission', array('@token' => $token_identifier, '@submission' => $context[0]->identifier));
}
