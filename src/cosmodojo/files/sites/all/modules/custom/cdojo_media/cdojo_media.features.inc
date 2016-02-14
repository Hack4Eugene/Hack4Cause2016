<?php
/**
 * @file
 * cdojo_media.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function cdojo_media_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "breakpoints" && $api == "default_breakpoint_group") {
    return array("version" => "1");
  }
  if ($module == "breakpoints" && $api == "default_breakpoints") {
    return array("version" => "1");
  }
  if ($module == "picture" && $api == "default_picture_mapping") {
    return array("version" => "2");
  }
}

/**
 * Implements hook_image_default_styles().
 */
function cdojo_media_image_default_styles() {
  $styles = array();

  // Exported image style: scale_200px_wide.
  $styles['scale_200px_wide'] = array(
    'label' => 'Scale 200px Wide',
    'effects' => array(
      1 => array(
        'name' => 'image_scale',
        'data' => array(
          'width' => 200,
          'height' => '',
          'upscale' => 0,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: scale_200px_wide_x2.
  $styles['scale_200px_wide_x2'] = array(
    'label' => 'Scale 200px Wide x2',
    'effects' => array(
      2 => array(
        'name' => 'image_scale',
        'data' => array(
          'width' => 400,
          'height' => '',
          'upscale' => 0,
        ),
        'weight' => 1,
      ),
    ),
  );

  return $styles;
}
