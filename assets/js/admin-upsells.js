(function ($) {
	'use strict';
	const revivesoOpenModal = (e) => {
		e.preventDefault();
		const upsell = e.data.upsell;
		$.get(
			revUps.ajaxurl,
			{
				action: 'reviveso_modal-' + upsell + '_upgrade',
			},
			(html) => {
				$('body').addClass('modal-open');
				$('body').append(html);

				$(document).one(
					'click',
					'.reviveso-modal__overlay.' + upsell,
					{
						upsell,
					},
					revivesoCloseModal
				);
				$(document).one(
					'click',
					'.reviveso-modal__dismiss.' + upsell,
					{
						upsell,
					},
					revivesoCloseModal
				);
			}
		);
	};

	const revivesoCloseModal = (e) => {
		const upsell = e.data.upsell;
		$('.reviveso-modal__overlay.' + upsell).remove();
		$('body').removeClass('modal-open');
	};

	$('body').on(
		'click',
		"a.reviveso-tab-upsell",
		{
			upsell: 'revived_posts',
		},
		revivesoOpenModal
	);

})(jQuery);
