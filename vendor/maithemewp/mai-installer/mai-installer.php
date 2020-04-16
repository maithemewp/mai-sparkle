<?php
/**
 * Mai Installer.
 *
 * @package   BizBudding\MaiInstaller
 * @link      https://bizbuding.com
 * @author    BizBudding
 * @copyright Copyright © 2020 BizBudding
 * @license   GPL-2.0-or-later
 */

/**
 * Install and active dependencies.
 *
 * @since 1.0.0
 *
 * @return void
 */
add_filter( 'pand_theme_loader', '__return_true' );
WP_Dependency_Installer::instance()->run( __DIR__ );

add_action( 'admin_init', 'mai_theme_redirect', 100 );
/**
 * Redirect after activation.
 *
 * @since 1.0.0
 *
 * @return void
 */
function mai_theme_redirect() {
	global $pagenow;

	if ( "themes.php" == $pagenow && is_admin() && isset( $_GET['activated'] ) ) {
		exit( wp_redirect( admin_url( 'admin.php?page=mai-demo-import' ) ) );
	}
}
