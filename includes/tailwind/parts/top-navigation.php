<?php
/**
 * The top navigation of the application.
 */

?>
<!-- Secondary navigation -->
<nav class='flex overflow-x-auto border-b bg-white border-gray/10 py-4'>
	<ul role='list' class='flex min-w-full flex-none gap-x-6 px-4 text-md font-semibold leading-6 text-gray-700 sm:px-6 lg:px-8'>
		<?php
		foreach ( $page_tabs as $key => $tab ) {
			$link  = add_query_arg(
				array(
					'page' => 'reviveso',
					'tab'  => $key,
				),
				admin_url( 'admin.php' )
			);
			$class = '';
			if ( $current_tab == $key ) {
				$class = 'text-indigo-400';
			} else {
				$class = 'text-gray hover:text-indigo-400';
			}
			$badge = '';
			// If not empty, add the upsell class. This way we can do the upsell modal.
			if ( ! empty( $tab['badge'] ) ) {
				$class .= ' reviveso-tab-upsell ';
				$badge = '<span class="inline-flex items-center rounded-full bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">' . esc_attr( $tab['badge'] ) . '</span>';
			}
			?>
			<li>
				<a href='<?php
				echo esc_url( $link ); ?>' class='<?php
				echo esc_attr( $class ); ?> hover:text-indigo-600 group flex gap-x-3 rounded-md p-2 text-md leading-6 font-semibold'>
					<?php
					echo esc_html( $tab['name'] ) . wp_kses_post( $badge ); ?>
				</a>
			</li>
			<?php
		} ?>
	</ul>
</nav>
<?php

if ( isset( $settings[ $current_tab ] ) && 1 < count( $settings[ $current_tab ] ) ) {
?>
<nav class='flex overflow-x-auto border-b border-gray/10 py-4 bg-white'>
	<ul role='list' class='flex min-w-full flex-none gap-x-6 px-4 text-sm font-semibold leading-6 text-gray-700 sm:px-6 lg:px-8'>
		<?php

			$url = 'admin.php?page=reviveso&tab=' . $current_tab . '&section=';
			foreach ( $settings[ $current_tab ] as $key => $value ) {
				if ( $current_section == $key ) {
					$class = 'text-indigo-400';
				} else {
					$class = 'text-gray hover:text-indigo-400';
				}
				$badge = '';
				// If not empty, add the upsell class. This way we can do the upsell modal.
				if ( ! empty( $value['type'] ) && 'upsell' === $value['type'] ) {
					$class .= ' reviveso-tab-upsell ';
					$badge = '<span class="inline-flex items-center rounded-full bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">' . esc_attr( $value['badge'] ) . '</span>';
				}
				?>
				<li>
					<a href='<?php
					echo esc_url( admin_url( $url . $key ) ); ?>' class='<?php
					echo esc_attr( $class ); ?> hover:text-indigo-600 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold'>
						<?php
						echo esc_html( $value['name'] ) . wp_kses_post( $badge ); ?>
					</a>
				</li>
				<?php
			}
		?>
	</ul>
</nav>
<?php } ?>
<!-- Secondary navigation -->
<?php
