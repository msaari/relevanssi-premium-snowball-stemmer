<?php
/**
 * Relevanssi Premium Snowball Stemmer
 *
 * /relevanssi-premium-snowball-stemmer.php
 *
 * @package Relevanssi Premium Snowball Stemmer
 * @author  Mikko Saari
 * @license https://wordpress.org/about/gpl/ GNU General Public License
 * @see     https://www.relevanssi.com/snowball-stemmer/
 *
 * @wordpress-plugin
 * Plugin Name: Relevanssi Premium Snowball Stemmer
 * Plugin URI: https://www.relevanssi.com/snowball-stemmer/
 * Description: This plugin adds Snowball Stemmer for Relevanssi Premium.
 * Version: 1.3
 * Author: Mikko Saari
 * Author URI: http://www.mikkosaari.fi/
 * Text Domain: relevanssi
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

add_filter( 'relevanssi_stemmer', 'relevanssi_premium_snowball_stemmer' );

require 'admin-menu.php';

/**
 * Does the actual stemming. Gets the language from the option
 * `relevanssi_premium_snowball_stemmer_language`.
 *
 * @param string $word The word to stem.
 *
 * @return string The stemmed word.
 */
function relevanssi_premium_snowball_stemmer( $word ) {
	require plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

	$language = get_option( 'relevanssi_premium_snowball_stemmer_language', 'en' );
	try {
		$stemmer = Wamania\Snowball\StemmerFactory::create( $language );
	} catch ( Wamania\Snowball\NotFoundException $e ) {
		return $word;
	}

	$stemmed_word = $stemmer->stem( $word );
	if ( is_string( $stemmed_word ) && $word !== $stemmed_word ) {
		return $word . ' ' . $stemmed_word;
	}

	// User asked for a non-existing language or some other error happened.
	return $word;
}

add_action(
	'relevanssi_disable_stemmer',
	function() {
		remove_filter( 'relevanssi_stemmer', 'relevanssi_premium_snowball_stemmer' );
	}
);

add_action(
	'relevanssi_enable_stemmer',
	function() {
		add_filter( 'relevanssi_stemmer', 'relevanssi_premium_snowball_stemmer' );
	}
);
