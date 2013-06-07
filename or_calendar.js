(function($, Drupal)
{
	Drupal.orCalendar = Drupal.orCalendar || {
		prevMonth: function(){
			var last = $('#or_calendar_months .show').eq(10);
			var prev = $('#or_calendar_months .show').eq(0).prev();
			if (prev.length != 0) {
				$(last).removeClass('show').addClass('hidden').css('display', 'none');
				$(prev).removeClass('hidden').addClass('show').css('display', 'block');
			}
		},
		nextMonth: function(){
			var first = $('#or_calendar_months .show').eq(0);
			var next = $('#or_calendar_months .show').eq(10).next();
			if (next.length != 0) {
				$(first).removeClass('show').addClass('hidden').css('display', 'none');
				$(next).removeClass('hidden').addClass('show').css('display', 'block');
			}
		},
		prevWeek: function(){
			var last = $('.or_calendar_weeks .show').eq(8);
			var prev = $('.or_calendar_weeks .show').eq(0).prev();
			if (prev.length != 0) {
				$(last).removeClass('show').addClass('hidden').css('display', 'none');
				$(prev).removeClass('hidden').addClass('show').css('display', 'block');
			}
		},
		nextWeek: function(){
			var first = $('.or_calendar_weeks .show').eq(0);
			var next = $('.or_calendar_weeks .show').eq(8).next();
			if (next.length != 0) {
				$(first).removeClass('show').addClass('hidden').css('display', 'none');
				$(next).removeClass('hidden').addClass('show').css('display', 'block');
			}
		}
	}
	$('.or_calendar_prev_month').live('click', Drupal.orCalendar.prevMonth);
	$('.or_calendar_next_month').live('click', Drupal.orCalendar.nextMonth);
	$('.or_calendar_prev_week').live('click', Drupal.orCalendar.prevWeek);
	$('.or_calendar_next_week').live('click', Drupal.orCalendar.nextWeek);
}(jQuery, Drupal));