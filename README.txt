INSTALL
==========

1. Extract module into /sites/all/modules folder.
2. Enable "Or calendar" on /admin/modules page.

CONFIG
==========

1.Hack file, date/date_views/theme/date-views-pager.tpl.php, content replace to :

<?php if (!empty($pager_prefix)) print $pager_prefix; ?>
<div class="date-nav-wrapper clearfix<?php if (!empty($extra_classes)) print $extra_classes; ?>">
  <?php if (or_calendar_handler_views($plugin->view->name)) :?>
    <?php echo theme('or_calendar_header', array('plugin' => $plugin)); ?>
  <?php else: ?>
    <div class="date-nav item-list">
      <div class="date-heading">
        <h3><?php print $nav_title ?></h3>
      </div>
      <ul class="pager">
      <?php if (!empty($prev_url)) : ?>
        <li class="date-prev">
          <?php print l('&laquo;' . ($mini ? '' : ' ' . t('Prev', array(), array('context' => 'date_nav'))), $prev_url, $prev_options); ?>
        &nbsp;</li>
      <?php endif; ?>
      <?php if (!empty($next_url)) : ?>
        <li class="date-next">&nbsp;
          <?php print l(($mini ? '' : t('Next', array(), array('context' => 'date_nav')) . ' ') . '&raquo;', $next_url, $next_options); ?>
        </li>
      <?php endif; ?>
      </ul>
    </div>
  <?php endif; ?>
</div> 

2.config use custom template views name in admin/config/user-interface/orth_or_calendar

