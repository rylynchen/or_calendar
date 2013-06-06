<?php

/**
 * Page: calendar.
 */
function or_calendar_page() {
  $view = views_get_view('calendar');
  $view->set_display('page_1');
  $month = isset($_GET['month']) ? $_GET['month'] : date('Y-m');
  $view->set_arguments(array($month));
  return $view->preview();
}