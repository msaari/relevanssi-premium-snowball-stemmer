# Snowball Stemmer for Relevanssi Premium

This simple WordPress plugin adds the [Wamania PHP Stemmer](https://github.com/wamania/php-stemmer) for Relevanssi Premium. Wamania PHP Stemmer includes Snowball stemmers for over dozen languages. For the exact list, see the Wamania PHP Stemmer Github.

## Requirements

Using this plugin requires Relevanssi Premium.

## Usage

Install the plugin. Then, in theme `functions.php` file, add these:

```
update_option( 'relevanssi_premium_stemmer_language', 'english' );
add_filter( 'relevanssi_stemmer', 'relevanssi_premium_snowball_stemmer' );
```

If you are using English, you can skip the `update_option()` – the stemmer will assume English. You can use either the full language name in English, or the two-letter code.

## License

This plugin is licensed under GPL2 license. The Wamania PHP stemmer is by Wamania, and is licensed under the MIT license.