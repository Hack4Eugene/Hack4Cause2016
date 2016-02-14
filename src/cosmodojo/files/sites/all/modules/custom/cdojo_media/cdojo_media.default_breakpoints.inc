<?php
/**
 * @file
 * cdojo_media.default_breakpoints.inc
 */

/**
 * Implements hook_default_breakpoints().
 */
function cdojo_media_default_breakpoints() {
  $export = array();

  $breakpoint = new stdClass();
  $breakpoint->disabled = FALSE; /* Edit this to true to make a default breakpoint disabled initially */
  $breakpoint->api_version = 1;
  $breakpoint->machine_name = 'custom.user.all';
  $breakpoint->name = 'all';
  $breakpoint->breakpoint = 'screen';
  $breakpoint->source = 'user';
  $breakpoint->source_type = 'custom';
  $breakpoint->status = 1;
  $breakpoint->weight = 1;
  $breakpoint->multipliers = array(
    '2x' => '2x',
    '1x' => '1x',
  );
  $export['custom.user.all'] = $breakpoint;

  return $export;
}
