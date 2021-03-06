# Kirby Mix Plugin

**Note:** A Laravel Mix plugin for Kirby 3 can be found [here](https://github.com/MRFD/kirby-mix).

---

This plugin is made for [Kirby](http://getkirby.com) V2 in combination with [Laravel Mix](https://laravel-mix.com). This plugin extends the use of the Kirby `js()` and the `css()` helper in combination with the Laravel Mix `mix.version()` option. To enable the plugin, use the following line in your `config.php`:

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

Marijn Roovers <marijn@mrfd.nl>

## Thanks to

Bastian Allgeier <bastian@getkirby.com> & Lukas Bestle <lukas@getkirby.com>
