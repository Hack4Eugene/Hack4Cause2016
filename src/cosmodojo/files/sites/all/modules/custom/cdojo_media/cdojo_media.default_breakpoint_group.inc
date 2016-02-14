<?php
/**
 * @file
 * cdojo_media.default_breakpoint_group.inc
 */

/**
 * Implements hook_default_breakpoint_group().
 */
function cdojo_media_default_breakpoint_group() {
  $export = array();

  $breakpoint_group = new stdClass();
  $breakpoint_group->disabled = FALSE; /* Edit this to true to make a default breakpoint_group disabled initially */
  $breakpoint_group->api_version = 1;
  $breakpoint_group->machine_name = 'scale_200px_wide';
  $breakpoint_group->name = 'Scale 200px Wide';
  $breakpoint_group->breakpoints = array(
    0 => 'custom.user.all',
  );
  $breakpoint_group->type = 'custom';
  $breakpoint_group->overridden = 0;
  $export['scale_200px_wide'] = $breakpoint_group;

  return $export;
}
