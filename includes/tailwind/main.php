<?php
/**
 * Main template file.
 *
 */

?>
<div>
	<div class='reviveso-loading-icon bg-white'>
	</div>
	<?php
	include __DIR__ . '/parts/sidebar.php'; ?>

	<div class='xl:pl-72 reviveso-clearfix text-gray-700'>
		<?php
		if ( ! empty( $page_tabs[ $current_tab ]['has_search'] ) || apply_filters( 'reviveso_page_has_search', false, $settings, $current_tab, $current_section, $page_tabs ) ) {

			include __DIR__ . '/parts/search.php';
		}
		?>
		<main class="relative z-50">
			<?php
			include __DIR__ . '/header.php'; ?>

			<!-- Activity list -->
			<div class='border-t border-gray-700/4 reviveso-clearfix gap-x-6 border-b bg-white px-4 shadow-sm pb-5'>
				<?php include __DIR__ . '/content.php'; ?>
				<?php
