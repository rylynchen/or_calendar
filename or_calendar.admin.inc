<?php

/**
 * Administration page for baidu map
 */
function or_calendar_settings() {
  $form = array();
  $form['or_calendar_start_year'] = array(
    '#type' => 'textfield',
    '#title' => t('Start year :'),
    '#default_value' => variable_get('or_calendar_start_year', date('Y')),
  );
  $form['or_calendar_extend_year'] = array(
    '#type' => 'textfield',
    '#title' => t('Extend year :'),
    '#default_value' => variable_get('or_calendar_extend_year', 0),
  );
  $form['or_calendar_views'] = array(
    '#type' => 'textarea',
    '#title' => t('Use orth calendar view template :'),
    '#default_value' => variable_get('or_calendar_views', ''),
  );
  return system_settings_form($form);
}