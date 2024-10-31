<div class="reviveso-modal__overlay revived_posts text-left text-gray-700">
	<div class='relative z-10' aria-labelledby='modal-title' role='dialog' aria-modal='true'>
		<div class='fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity'></div>
		<div class='fixed inset-0 z-10 w-screen overflow-y-auto'>
			<div class='flex min-h-full items-end justify-center p-4 sm:items-center sm:p-0'>
				<div class='relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-3xl sm:p-6'>
					<div>
						<div class="text-right absolute right-3 top-3">
							<button type='button' class='rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>
								<span class='sr-only'><?php
									esc_html_e( 'Close', 'revive-so' ); ?></span>
								<svg class='h-6 w-6' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' aria-hidden='true'>
									<path stroke-linecap='round' stroke-linejoin='round' d='M6 18L18 6M6 6l12 12'></path>
								</svg>
							</button>
						</div>
						<div>
							<h3 class='text-base font-semibold leading-6 text-gray-900 text-center' id='modal-title'><?php
								esc_html_e( 'Revive.so PRO', 'revive-so' ); ?></h3>
							<div class="mt-6">
								<h4 class="reviveso-upsell-description-modal"><?php
									esc_html_e( 'Revive.so PRO grants you even more control over your content allowing you to auto post your republished posts to social media and offer even more republishing customizations for your posts.', 'reviveso-best-grid-gallery' ); ?></h4>
								<ul role="list" class="divide-y divide-gray-100">
									<li class="flex gap-x-6 py-5">
										<div class="flex min-w-0 gap-x-4">
											<div class="min-w-0 flex-auto">
												<p class="text-sm font-semibold leading-6 text-gray-900"><?php esc_html_e( 'Customized Republishing:', 'revive-so' ); ?></p>
											</div>
										</div>
										<div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
											<p class="text-sm leading-6 text-gray-900"><?php esc_html_e( 'Tailor republishing parameters for each post.', 'revive-so' ); ?></p>
										</div>
									</li>
									<li class="flex gap-x-6 py-5">
										<div class="flex min-w-0 gap-x-4">
											<div class="min-w-0 flex-auto">
												<p class="text-sm font-semibold leading-6 text-gray-900"><?php esc_html_e( 'Automated Social Sharing:', 'revive-so' ); ?></p>
											</div>
										</div>
										<div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
											<p class="text-sm leading-6 text-gray-900"><?php esc_html_e( 'Share content on Facebook, Twitter, etc., automatically.', 'revive-so' ); ?></p>
										</div>
									</li>
									<li class="flex gap-x-6 py-5">
										<div class="flex min-w-0 gap-x-4">
											<div class="min-w-0 flex-auto">
												<p class="text-sm font-semibold leading-6 text-gray-900"><?php esc_html_e( 'Manual Republishing:', 'revive-so' ); ?></p>
											</div>
										</div>
										<div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
											<p class="text-sm leading-6 text-gray-900"><?php esc_html_e( 'Repost content manually for strategic timing.', 'revive-so' ); ?></p>
										</div>
									</li>
									<li class="flex gap-x-6 py-5">
										<div class="flex min-w-0 gap-x-4">
											<div class="min-w-0 flex-auto">
												<p class="text-sm font-semibold leading-6 text-gray-900"><?php esc_html_e( 'AI Rephrasing:', 'revive-so' ); ?></p>
											</div>
										</div>
										<div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
											<p class="text-sm leading-6 text-gray-900"><?php esc_html_e( 'Utilize AI to rephrase initial paragraphs for variety.', 'revive-so' ); ?></p>
										</div>
									</li>
									<li class="flex gap-x-6 py-5">
										<div class="flex min-w-0 gap-x-4">
											<div class="min-w-0 flex-auto">
												<p class="text-sm font-semibold leading-6 text-gray-900"><?php esc_html_e( 'Email Notifications:', 'revive-so' ); ?></p>
											</div>
										</div>
										<div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
											<p class="text-sm leading-6 text-gray-900"><?php esc_html_e( 'Stay updated on republishing activities via email.', 'revive-so' ); ?></p>
										</div>
									</li>
									<li class="flex gap-x-6 py-5">
										<div class="flex min-w-0 gap-x-4">
											<div class="min-w-0 flex-auto">
												<p class="text-sm font-semibold leading-6 text-gray-900"><?php esc_html_e( 'Short URL:', 'revive-so' ); ?></p>
											</div>
										</div>
										<div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
											<p class="text-sm leading-6 text-gray-900"><?php esc_html_e( 'Create concise, visually appealing links for sharing.', 'revive-so' ); ?></p>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="mt-5 sm:mt-6 text-center">
						 <?php
							$link = 'https://revive.so/pricing/?utm_source=reviveso-lite&utm_medium=rewriting-tab&utm_campaign=upsell';
							echo '<a target="_blank" href="https://revive.so/pricing/?utm_source=reviveso-lite&utm_medium=revived_posts_page&utm_campaign=admin_modal" style="margin-top:10px;"><button type="button" class="rounded-full bg-indigo-600 px-3.5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 hover:cursor-pointer w-full" style="margin:0 auto;">' . esc_html__( 'Get Premium!', 'revive-so' ) . '</button></a>'; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
