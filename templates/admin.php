<?php
/**
 * The Main dashboard file.
 *
 */
defined( 'ABSPATH' ) || exit;
?>

<div class="wrap reviveso-wrap" data-reload="no">
    <div id="post-body-content" class="reviveso-metaboxes py-3">
        <?php
            $this->render_settings();
            do_action( 'reviveso_dashboard_settings_section' );
        ?>
    </div>
</div>

<?php REVIVESO_Tailwind_UI::main_ender(); ?>
</div>
<?php
