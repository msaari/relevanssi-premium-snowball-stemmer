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

### 1.1.1
- Adds `repositories` part to the `composer.json`

### 1.1
- Adds Finnish
- Uses msaari/php-stemmer instead of wamania/php-stemmer
- The stemmer returns both the stemmed word and the original word

## License

This plugin is licensed under GPL2 license. The Wamania PHP stemmer is by Wamania, and is licensed under the MIT license.