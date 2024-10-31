<?php
/**
 * The footer of the application.
 */

/**
 * Action trigger to display extra information if needed
 *
 * @hook  reviveso_extra_info
 * @since 2.0.0
 */
?>
	<div class="gap-x-6 border-b border-gray/5 bg-white px-4 shadow-sm sm:px-6 lg:px-8 py-11">
		<?php
		/**
		 * Action trigger to display extra information if needed
		 *
		 * @hook  reviveso_extra_info
		 * @since 2.0.0
		 */
		do_action( 'reviveso_extra_info' );
		?>
	</div>
<?php
