<?php
  $module_path = drupal_get_path('module', 'or_calendar');
  drupal_add_css($module_path.'/or_calendar.css');
  drupal_add_js('sites/all/libraries/ScrollPic.js');
  drupal_add_js($module_path.'/or_calendar.js', array('scope' => 'footer'));
?>
<div class="date-nav item-list">
  <div class="date-heading">
    <h3><?php echo $plugin->view->args[0]; ?></h3>
    <div class="orth_date_month_scroll">
      <div><a href="javascript:void(0)" id="prev">« Prev</a></div>
      <ul id="orth_date_month_scroll_items">
        <?php
          $start_year = variable_get('or_calendar_start_year', date('Y'));
          $end_year = date('Y') + variable_get('or_calendar_extend_year', 0);
          for($j = $start_year; $j <= $end_year; $j++) {
            for($i = 1; $i <= 12; ++$i) {
              $attr = array();
              $month = $j.'-'.sprintf('%02d', $i);
              $attr['query']['month'] = $month;
              // if ($plugin->view->args[0] == $month) {
              //   $attr['attributes']['class'][] = 'active';
              // }
              echo '<li>'.l($month, current_path(), $attr).'</li>';
            }
          }
        ?>
      </ul>
      <div><a href="javascript:void(0)" id="next">Next »</a></div>
    </div>
  </div>
</div>
