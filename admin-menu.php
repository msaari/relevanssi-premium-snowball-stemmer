<?php
/**
 * Relevanssi Premium Snowball Stemmer
 *
 * /admin-menu.php
 *
 * @package Relevanssi Premium Snowball Stemmer
 * @author  Mikko Saari
 * @license https://wordpress.org/about/gpl/ GNU General Public License
 * @see     https://www.relevanssi.com/snowball-stemmer/
 */

add_filter( 'relevanssi_tabs', 'relevanssi_premium_snowball_stemmer_tab', 20 );

/**
 * Adds the stemmer tab to the Relevanssi admin menu.
 *
 * @param array $tabs The tabs array.
 *
 * @return array The updated tabs array.
 */
function relevanssi_premium_snowball_stemmer_tab( $tabs ) {
	$tabs[] = array(
		'slug'     => 'snowball-stemmer',
		'name'     => 'Stemmer',
		'require'  => false,
		'callback' => 'relevanssi_premium_snowball_stemmer_render_tab',
		'save'     => true,
	);
	return $tabs;
}

/**
 * Renders the options page.
 *
 * Relevanssi Light doesn't have plenty of options at the moment. That is
 * unlikely to change in the future.
 */
function relevanssi_premium_snowball_stemmer_render_tab() {
	$languages = array(
		'catalá (Catalan)'       => 'ca',
		'dansk (Danish)'         => 'da',
		'Deutsch (German)'       => 'de',
		'English'                => 'en',
		'español (Spanish)'      => 'es',
		'français (French)'      => 'fr',
		'italiano (Italian)'     => 'it',
		'Nederlands (Dutch)'     => 'nl',
		'norsk (Norwegian)'      => 'no',
		'português (Portuguese)' => 'pt',
		'românește (Romanian)'   => 'ro',
		'русский язык (Russian)' => 'ru',
		'suomi (Finnish)'        => 'fi',
		'svensk (Swedish)'       => 'sv',
	);

	if ( ! empty( $_REQUEST ) && isset( $_REQUEST['submit'] ) ) {
		check_admin_referer( 'save_options', 'relevanssi_premium_snowball_stemmer' );
		$language = $_REQUEST['relevanssi_premium_snowball_language'];
		if ( in_array( $language, $languages, true ) ) {
			update_option( 'relevanssi_premium_snowball_stemmer_language', $language );
		}
	}

	$selected_language = get_option( 'relevanssi_premium_snowball_stemmer_language', 'en' );

	$language_options = array_map(
		function( $key, $value ) use ( $selected_language ) {
			$selected = $selected_language === $value ? "selected='selected'" : '';
			return "<option value='$value' $selected>$key</option>";
		},
		array_keys( $languages ),
		$languages
	);

	?>
	<div class="wrap">
		<?php wp_nonce_field( 'save_options', 'relevanssi_premium_snowball_stemmer' ); ?>

		<h3 id="stemmer"><?php esc_html_e( 'Snowball Stemmer', 'relevanssi_premium_snowball_stemmer' ); ?></h3>

		<p><?php esc_html_e( 'Choose the language here and then rebuild the index on the Indexing tab. Once you do that, all words in the posts and all search terms are stemmed, making it easier to find posts with varying word forms. The search term highlighting does not support stemming at the moment, so highlighting will only work when the search term matches the word form in the post.', 'relevanssi_premium_snowball_stemmer' ); ?></p>

		<p><?php esc_html_e( 'Choose the language', 'relevanssi_premium_snowball_stemmer' ); ?>:
		<select name="relevanssi_premium_snowball_language" id="relevanssi_premium_snowball_language">
			<?php echo implode( "\n", $language_options ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</select>
		</p>

	</div>
	<?php
}
