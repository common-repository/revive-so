<?php
/**
 * The header of the application.
 */

?>
<header>
	<?php
	// Only show the top navigation if the filter returns true.
	if ( apply_filters( 'reviveso_top_nav', false, $settings, $current_tab, $current_section, $page_tabs ) ) {
		include __DIR__ . '/parts/top-navigation.php';
		include __DIR__ . '/parts/breadcrumbs.php';
	}
	?>
</header>
<?php
