jQuery(window).on("load", function() {
	jQuery('body.revive-so-admin-page').addClass('revive-so-admin-page-loaded');
	jQuery( '.reviveso-loading-icon' ).fadeOut(400);
	jQuery('body').removeClass( 'wp-core-ui' );
	jQuery('html').addClass('h-full');
});
