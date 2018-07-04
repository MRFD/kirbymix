# Kirby Mix Plugin

This plugin is made for [Kirby](http://getkirby.com/) in combination with [Laravel Mix](https://laravel.com/docs/5.6/mix). This plugin extends the use of the Kirby `js()` and the `css()` helper in combination with the Laravel Mix `mix.version()` option. To enable the plugin, use the following line in your `config.php`:

```php
c::set('kirbymix', true);
```

## Modifying manifest path

Tell the plugin where the `mix-manifest.json` file is to be found (relative path):

```php
c::set('kirbymix.manifest', 'assets/mix-manifest.json');
```

## Modifying public path

When using the option `setPublicPath` in your `webpack.mix.js`, modify the following config:

```php
c::set('kirbymix.publicpath', 'assets');
```

## Author

Marijn Roovers <mailto:marijn@mrfd.nl>

## Thanks to

Bastian Allgeier <mailto:bastian@getkirby.com> & Lukas Bestle <mailto:lukas@getkirby.com>
