<?php
/**
 * /uninstall.php
 *
 * @package Relevanssi Premium Snowball Stemmer
 * @author  Mikko Saari
 * @license https://wordpress.org/about/gpl/ GNU General Public License
 * @see     https://www.relevanssi.com/snowball_stemmer/
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

global $wpdb;

if ( function_exists( 'is_multisite' ) && is_multisite() ) {
	$blogids    = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
	$old_blogid = $wpdb->blogid;
	foreach ( $blogids as $uninstall_blog_id ) {
		switch_to_blog( $uninstall_blog_id );
		relevanssi_premium_snowball_stemmer_uninstall();
		restore_current_blog();
	}
} else {
	relevanssi_premium_snowball_stemmer_uninstall();
}

/**
 * Removes Relevanssi Snowball Stemmer options.
 */
function relevanssi_premium_snowball_stemmer_uninstall() {
	delete_option( 'relevanssi_premium_snowball_stemmer_language' );
}
