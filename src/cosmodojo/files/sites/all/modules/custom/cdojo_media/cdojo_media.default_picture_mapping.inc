<?php
/**
 * @file
 * cdojo_media.default_picture_mapping.inc
 */

/**
 * Implements hook_default_picture_mapping().
 */
function cdojo_media_default_picture_mapping() {
  $export = array();

  $picture_mapping = new PictureMapping();
  $picture_mapping->disabled = FALSE; /* Edit this to true to make a default picture_mapping disabled initially */
  $picture_mapping->api_version = 2;
  $picture_mapping->label = 'Scale 200px Wide';
  $picture_mapping->machine_name = 'scale_200px_wide';
  $picture_mapping->breakpoint_group = 'scale_200px_wide';
  $picture_mapping->mapping = array(
    'custom.user.all' => array(
      '1x' => array(
        'mapping_type' => 'image_style',
        'image_style' => 'scale_200px_wide',
      ),
      '2x' => array(
        'mapping_type' => 'image_style',
        'image_style' => 'scale_200px_wide_x2',
      ),
    ),
  );
  $export['scale_200px_wide'] = $picture_mapping;

  return $export;
}
