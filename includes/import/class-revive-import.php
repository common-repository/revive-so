<?php 
/**
 * Settings callbacks.
 *
 */


defined( 'ABSPATH' ) || exit;

class REVIVESO_Pro_Settings_Importer
{
	use REVIVESO_HelperFunctions;
	use REVIVESO_Hooker;

	public function __construct() {
        
		add_action( 'admin_footer', array( $this, 'dismiss_notices_script' ), 99 );
		add_action( 'wp_ajax_reviveso-dismiss-import', array( $this, 'dismiss_notice' ), 20 );

		add_action( 'admin_notices', array( $this, 'show_import_notices' ), 8 );
		add_action( 'admin_init', array( $this, 'import_settings' ), 50 );
		
	}

    /**
	 * Display Upgrade Notices
	 *
	 * @return void
	 * @since 2.0.0
	 */
	public function show_import_notices() {

		$revivepress_settings = get_option( 'wpar_plugin_settings', false );
		$import_notice        = get_option( 'reviveso_show_import_notice', 1 );
        $url = add_query_arg( array( 'revs_import' => 'revivepress'), admin_url('admin.php') );
		if ( $revivepress_settings && $import_notice ) {
			if ( REVIVESO_Admin::is_reviveso_admin_page() ) {
				?>
				<!-- Global notification live region, render this permanently at the end of the document -->
				<div aria-live='assertive' class='notice pointer-events-none fixed inset-0 flex items-start px-4 py-6 sm:items-start sm:p-6 mt-6'>
					<div class='flex w-full flex-col items-end space-y-4 sm:items-end z-10'>
						<div class='pointer-events-auto flex w-full max-w-md divide-x divide-gray-200 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5'>
							<div class='flex w-0 flex-1 items-center p-4'>
								<div class='w-full'>
									<p class='mt-1 text-sm text-gray-500'>
										<?php
										esc_html_e( 'We have detected your site has settings saved for RevivePress plugin. Would you like to import these settings into Revive.so?', 'revive-so' ); ?>
									</p>
								</div>
							</div>
							<div class='flex'>
								<div class='flex flex-col divide-y divide-gray-200'>
									<div class='flex h-0 flex-1'>
										<a href="<?php
										echo esc_attr( $url ); ?>" class='flex w-full items-center justify-center rounded-none rounded-br-lg  text-indigo-600 border border-transparent px-4 py-3 text-sm font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500'><strong><?php
												esc_html_e( 'Ok, import settings', 'revive-so' ); ?></strong></a>
									</div>
									<div class='flex h-0 flex-1'>
										<a href="#" class='reviveso_import_dissmiss flex w-full items-center justify-center rounded-none rounded-br-lg border border-transparent px-4 py-3 text-sm font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500'><strong><?php
												esc_html_e( 'No, thank you.', 'revive-so' ); ?></strong></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?php
			} else { ?>
				<div class="reviveso-import-notice updated notice notice-success" style="padding: 10px 10px 20px">
					<p><?php
						esc_html_e( 'We have detected your site has settings saved for RevivePress plugin. Would you like to import these settings into Revive.so?', 'revive-so' ); ?></p>
					<a href="<?php
					echo esc_attr( $url ); ?>" class="button button-primary"><?php
						esc_html_e( 'Ok, import settings', 'revive-so' ); ?></a>&nbsp;
					<button class="reviveso_import_dissmiss button button-secondary"><?php
						esc_html_e( 'No, thank you.', 'revive-so' ); ?></button>&nbsp;
				</div>
				<?php
			}
		}
	}

	public function import_settings(){
	
        $revivepress_settings = get_option('wpar_plugin_settings');
        $action = ( isset( $_GET['revs_import'] ) && 'revivepress' == $_GET['revs_import'] ) ? true : false;
        $new_settings = array();
        if( $revivepress_settings && $action ){

            foreach( $revivepress_settings as $key => $setting ){
                $new_key = str_replace('wpar', 'reiveveso', $key );
                $new_settings[$new_key] = $setting;
            }

            update_option('reviveso_plugin_settings', $new_settings );

            $social    = get_option( 'wpar_social_credentials', false );
            $facebook  = get_option( 'wpar_facebook_accounts_db', false );
            $linkedin  = get_option( 'wpar_linkedin_accounts_db', false );
            $pinterest = get_option( 'wpar_pinterest_accounts_db', false );
            $twitter   = get_option( 'wpar_twitter_accounts_db', false );
            $tumblr    = get_option( 'wpar_tumblr_accounts_db', false );

            if( $social ){
                update_option( 'reviveso_social_credentials', $social );
            }
            
            if( $facebook ){
                update_option( 'reviveso_facebook_accounts_db', $facebook );
            }
        
            if( $linkedin ){
                update_option( 'reviveso_linkedin_accounts_db', $linkedin );
            }
        
            if( $pinterest ){
                update_option( 'reviveso_pinterest_accounts_db', $pinterest );
            }
        
            if( $twitter ){
                update_option( 'reviveso_twitter_accounts_db', $twitter );
            }
        
            if( $tumblr ){
                update_option( 'reviveso_tumblr_accounts_db', $tumblr );
            }

            update_option('reviveso_show_import_notice', 0 );
            
            header("Location: " . add_query_arg( array( 'page' => 'reviveso'), admin_url('admin.php') ) , TRUE, 301);
            exit();
        }
       
        
	}
    
	public function dismiss_notice() {

		check_admin_referer( 'reviveso-dismiss-import', 'nonce' );

        update_option('reviveso_show_import_notice', 0 );

		wp_send_json_success();
		die();

	}

	public function dismiss_notices_script() {

			?>
            <script type="text/javascript">
                jQuery(document).ready(function ($) {
                    $('.reviveso_import_dissmiss').click(function (evt) {
                        console.log('dwadawdawdaw');
                        evt.preventDefault();
                        var inst = this;
                        $.ajax({
                            url: "<?php echo esc_url( admin_url( 'admin-ajax.php' ) ) ?>",
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                action: 'reviveso-dismiss-import',
                                nonce: '<?php echo esc_html( wp_create_nonce( 'reviveso-dismiss-import' ) ); ?>',
                            },
                            success: function (response) {
                                if (response.success) {
                                    jQuery( inst ).parent().hide();
                                }
                            }
                        });

                    });
                });
            </script>
			<?php
		
	}
}