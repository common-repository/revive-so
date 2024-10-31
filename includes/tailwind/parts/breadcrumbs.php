<!-- Heading -->
<div class='grid grid-flow-column grid-cols-2 gap-x-8 gap-y-4 bg-white px-4 py-4 sm:flex-row sm:items-center sm:px-6 lg:px-8'>
	<div>
		<div class='flex items-center gap-x-3'>
			<div class='flex-none rounded-full bg-green-400/10 p-1 text-green-400'>
				<div class='h-2 w-2 rounded-full bg-current'></div>
			</div>
			<h1 class='flex gap-x-3 text-base leading-7'>
				<span class='font-semibold text-gray-700'><?php
					echo esc_html( $page_tabs[ $current_tab ]['name'] ); ?></span>
				<?php
				if ( ! empty( $settings[ $current_tab ][ $current_section ] ) ) {
					?>
					<span class='text-gray-600'>/</span>
					<span class='font-semibold text-gray-700'><?php
						echo esc_html( $settings[ $current_tab ][ $current_section ]['title'] ); ?></span>
					<?php
				}
				?>
			</h1>
		</div>
		<p class='mt-2 text-xs leading-6 text-gray-700'><?php
			echo ! empty( $settings[ $current_tab ]['description'] ) ? wp_kses_post( $settings[ $current_tab ]['description'] ) : ''; ?></p>
	</div>
	<div class='inline text-right sm:order-none'><span class="rounded-full bg-indigo-400/10 px-2 py-1 text-xs font-medium text-indigo-400 ring-1 ring-inset ring-indigo-400/30">v<?php
			echo esc_html( REVIVESO_VERSION ); ?></span></div>
</div>
