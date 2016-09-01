Parsedown Service Provider
==========================

This is a service provider for the [Markdown parser Parsedown][Parsedown].
It could be used to easily use and configure Parseodwn with [Pimple][] or [Silex][].

Usage
-----

``` php
$app->register(new Clippings\ParsedownProvider\ParsedownServiceProvider());

$html = $app['parsedown']->text($markdown);
```

It registers one service - `parsedown` which returns the same instance of `Parsedown`.

Configuration
-------------

You configure it like that:

``` php
$app->register(new Clippings\ParsedownProvider\ParsedownServiceProvider(), [
    'parsedown.markup_escaped' => true,
]);
```

It accepts the following configuration parameters:

- `parsedown.class` - The class to use to instantiate Parsedown.
  Default: `Parsedown`. You can use that to load an an extension of Parsedown
  like [`ParsedownExtra`][ParsedownExtra].

  Don't forget to `composer require erusev/parsedown-extra` and then you can do:

  ``` php
  $app->register(new Clippings\ParsedownProvider\ParsedownServiceProvider(), [
      'parsedown.class' => 'ParsedownExtra',
  ]);
  ```

- `parsedown.breaks_enabled` - Whether to treat line breaks as new lines or not. Default: `true`. This is not the default for Markdown and Parsedown, but it is very common configuration - e.g. GitHub treats line breaks like that.

- `parsedown.markup_escaped` - Whether to escape HTML. Default: `false`.

- `parsedown.urls_linked` - Whether URLs are linked by default. Default: `true`. This is the Parsedown default. URLs would be auto-linked. It is similar to [GFM][].


Twig
----

If you have already registered [Twig][], probably with the `TwigServiceProvider`, the Parsedown service provider would also register a `parsedown` Twig filter for you to use in your templates.

You can use it like that:

```
{{ foo.markdown|parsedown }}
```

This will convert the Markdown you have directly in your template and output HTML using the same Parsedown instance you have configured.

Silex Application Trait
-----------------------

If you use it with Silex you can add the `ParsedownTrait` in your application:

``` php
<?php

class Application extends Silex\Application
{
    use Clippings\ParsedownProvider\ParsedownTrait;
}
```

Then you could use it like that:

``` php
$html = $app->parsedown($markdown);
```

Authors and License
--------------------

The Parsedown provider was developed by the [Clippings.com][Clippings] team and is distributed under the MIT license.

Read more about our projects at the [Clippings Geeks blog][].

[Parsedown]: https://github.com/erusev/parsedown
[ParsedownExtra]: https://github.com/erusev/parsedown-extra
[Silex]: http://silex.sensiolabs.org
[Pimple]: http://pimple.sensiolabs.org
[Twig]: http://twig.sensiolabs.org
[GFM]: https://guides.github.com/features/mastering-markdown/#GitHub-flavored-markdown
[Clippings]: https://clippings.com/
[Clippings Geeks blog]: https://clippings.github.io/
