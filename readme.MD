# Snowball Stemmer for Relevanssi Premium

This simple WordPress plugin adds the [Wamania PHP Stemmer](https://github.com/wamania/php-stemmer) for Relevanssi Premium. Wamania PHP Stemmer includes Snowball stemmers for over dozen languages. For the exact list, see the Wamania PHP Stemmer Github.

## Requirements

Using this plugin requires Relevanssi Premium.

## Installing

You can use this as a Composer requirement:

```
{
  "repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/msaari/relevanssi-premium-snowball-stemmer.git"
    }
  ],
  "require": {
      "msaari/relevanssi-premium-snowball-stemmer": "*"
  }
}
```

If you install the plugin manually, you need to use `composer install` to fetch the dependencies; they are not included in the package you get from GitHub.

## Usage

Install the plugin. That will add a new "Stemmer" tab in the Relevanssi settings page. You can set the stemmer language there and then just rebuild the index.

## Changelog

### 1.5

- When Relevanssi is set to use the AND operator, stemmer only returns the stemmed word instead of returning both stemmed word and the original word.

### 1.4

- Adds the `relevanssi_stemmer_allow_stemming` filter hook to exclude words from being stemmed.
- Updates wamania/php-stemmer to version 3.0.0.

### 1.3

- Adds `relevanssi_disable_stemmer` and `relevanssi_enable_stemmer` actions Relevanssi Premium 2.15.1 needs.

### 1.2

- Returns to use wamania/php-stemmer now that it includes the Finnish stemmer.
- Fixes a bug in the Finnish stemmer.

### 1.1.1

- Adds `repositories` part to the `composer.json`

### 1.1

- Adds Finnish
- Uses msaari/php-stemmer instead of wamania/php-stemmer
- The stemmer returns both the stemmed word and the original word

## License

This plugin is licensed under GPL2 license. The Wamania PHP stemmer is by Wamania, and is licensed under the MIT license.
