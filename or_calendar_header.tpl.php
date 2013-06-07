<?php or_calendar_tpl_load_js_css($plugin); ?>
<div class="date-nav item-list">
  <div class="date-heading">
    <h3><?php echo $plugin->view->args[0]; ?></h3>
    <div class="orth_date_month_scroll">
      <div><a href="javascript:void(0)" class="or_calendar_prev_month">« </a></div>
      <ul id="or_calendar_months">
        <?php echo or_calendar_tpl_months_html($plugin); ?>
      </ul>
      <div><a href="javascript:void(0)" class="or_calendar_next_month"> »</a></div>
    </div>
  </div>
</div>
