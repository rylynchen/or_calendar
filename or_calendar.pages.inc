<?php

/**
 * Page: calendar.
 */
function or_calendar_page() {
  $view_type = isset($_GET['view']) ? $_GET['view'] : 'calendar';
  if ($view_type == 'map') {
    // map
    $week = isset($_GET['week']) ? explode('TO', $_GET['week']) : or_calendar_current_week();
    $attr = array('query' => array('view' => 'calendar', 'month' => date('Y-m', strtotime($week[0]))));
    $html = '<div>'.l($view_type == 'calendar' ? 'Map' : 'Calendar', 'calendar', $attr).'</div>';
    $bids = or_calendar_get_bids_by_week($week);
    $bmaps = bmap_load_multiple($bids);
    $html .= theme('or_calendar_map', array('week' => $week, 'bmaps' => $bmaps));
  }
  else {
    // calendar
    $month = isset($_GET['month']) ? $_GET['month'] : date('Y-m');
    $month_first_mon = strtotime("monday", strtotime($month));
    $week = date('Y-m-d', $month_first_mon).'TO'.date('Y-m-d', strtotime(date('Y-m-d', $month_first_mon)." +6 days"));
    $attr = array('query' => array('view' => 'map', 'week' => $week));
    $html = '<div>'.l($view_type == 'calendar' ? 'Map' : 'Calendar', 'calendar', $attr).'</div>';
    $view = views_get_view('calendar');
    $view->set_display('page_1');
    $view->set_arguments(array($month));
    $html .= $view->preview();
  }
  return $html;
}

/**
 * Get current week.
 */
function or_calendar_current_week() {
  return array(
    date('Y-m-d', strtotime("this week")),
    date('Y-m-d', strtotime("this week + 6 days")),
  );
}

/**
 * Get bmaps by week.
 *
 * @param $week
 */
function or_calendar_get_bids_by_week($week) {
	$mon = $week[0];
	$sun = $week[1];
  $query = new CalendarGetBidsByWeekEFQ(strtotime($mon), strtotime("$sun +1 day"));
  $result = $query->execute();
  $bids = array();
  if (isset($result['node'])) {
    foreach ($result['node'] as $node) {
      $bmapAssoc = bmap_assoc_load_by_nid($node->nid);
      if ($bmapAssoc) {
        $bids[] = $bmapAssoc->bid;
      }
    }
  }
  return $bids;
}