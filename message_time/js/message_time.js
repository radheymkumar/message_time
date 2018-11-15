(function ($) {
	Drupal.behaviors.message_time = {
		attach: function(context, settings) {
			jQuery('.messages').delay(drupalSettings.message_time.message_fadeOut).slideUp('slow');
		}
	}
})(jQuery);