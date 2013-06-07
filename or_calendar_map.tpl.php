<?php or_calendar_map_tpl_load_js_css(); ?>
<div class="or_calendar_map">
	<h3><?php echo $week[0].' ~ '.$week[1]; ?></h3>
    <div class="orth_date_week_scroll">
      <div style="float:left;"><a href="javascript:void(0)" class="or_calendar_prev_week">« </a></div>
      <ul class="or_calendar_weeks">
      	<?php
      		$weeks_width = $prev_weeks_width = $next_weeks_width = 4;
			for ($i = 0; $i <= $weeks_width; ++$i) {
				$prev_mon = strtotime($week[0].' -'.$i.' weeks');
				$prev_sun = strtotime($week[1].' -'.$i.' weeks');
				$next_mon = strtotime($week[0].' +'.$i.' weeks');
				$next_sun = strtotime($week[1].' +'.$i.' weeks');
				if ($prev_mon < mktime(0, 0, 0, 1, 1, $start_year)) {
					$prev_weeks_width--;
					$next_weeks_width++;
				}
				if ($next_mon >= mktime(0, 0, 0, 1, 1, ($end_year + 1))) {
					$prev_weeks_width++;
					$next_weeks_width--;
				}
			}
			$prev_line = strtotime($week[0].' -'.$prev_weeks_width.' weeks');
			$next_line = strtotime($week[1].' +'.$next_weeks_width.' weeks');
      		for($year = $start_year; $year <= $end_year; ++$year) {
				$firstDayOfYear = mktime(0, 0, 0, 1, 1, $year);
				$nextMonday     = strtotime('monday', $firstDayOfYear);
				$nextSunday     = strtotime('sunday', $nextMonday);
				while (date('Y', $nextMonday) == $year) {
					$nextMondayStr = date('Y-m-d', $nextMonday);
					$nextSundayStr = date('Y-m-d', $nextSunday);
					$txt = $nextMondayStr.' ~ '.$nextSundayStr;
					$href = current_path();
					$attr = array('query' => array('view' => 'map', 'week' => $nextMondayStr.'TO'.$nextSundayStr));
					$class = ' class="hidden"';
					if ($nextMonday == strtotime($week[0]) && $nextSunday == strtotime($week[1])) {
						$class = ' class="show current"';
						$href = 'javascript:void(0)';
						$attr = array('external' => TRUE);
					}
					elseif ($nextMonday >= $prev_line && $nextSunday <= $next_line) {
						$class = ' class="show"';
					}
				    echo '<li'.$class.'>'.l($txt, $href, $attr).'</a></li>';
				    $nextMonday = strtotime('+1 week', $nextMonday);
				    $nextSunday = strtotime('+1 week', $nextSunday);
				}
      		}
      	?>
      </ul>
      <div style="float:left;"><a href="javascript:void(0)" class="or_calendar_next_week"> »</a></div>
    </div>
    <div class="clean"></div>
	<?php echo theme('bmap_field_map', array('points' => $bmaps));?>
</div>