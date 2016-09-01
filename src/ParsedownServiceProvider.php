<?php

namespace Clippings\ParsedownProvider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ParsedownServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['parsedown.class'] = 'Parsedown';

        $app['parsedown.breaks_enabled'] = true;
        $app['parsedown.markup_escaped'] = false;
        $app['parsedown.urls_linked'] = true;

        $app['parsedown'] = function (Container $app) {
            $parsedown = new $app['parsedown.class']();

            $parsedown->setBreaksEnabled($app['parsedown.breaks_enabled']);
            $parsedown->setMarkupEscaped($app['parsedown.markup_escaped']);
            $parsedown->setUrlsLinked($app['parsedown.urls_linked']);

            return $parsedown;
        };

        if (isset($app['twig'])) {
            $app->extend(
                'twig',
                function (Twig_Environment $twig, Container $app) {
                    $twig->addFilter(new Twig_SimpleFilter(
                        'parsedown',
                        array($app['parsedown'], 'text'),
                        array(
                            'is_safe' => array('html'),
                        )
                    ));

                    return $twig;
                }
            );
        }
    }
}