<?php

namespace Clippings\ParsedownProvider\Test;

use Pimple\Container;
use Twig_Test_IntegrationTestCase;
use Silex\Provider\TwigServiceProvider;
use Clippings\ParsedownProvider\ParsedownServiceProvider;

class ParsedownTwigFilterTest extends Twig_Test_IntegrationTestCase
{
    /**
     * @var Pimple\Container
     */
    private $container;

    public function setUp()
    {
        parent::setUp();

        $this->container = new Container();
        $app['twig'] = true;
        // Change default configuration to test the configured instance is used in Twig
        $this->container->register(new ParsedownServiceProvider(), array(
            'parsedown.urls_linked' => false,
        ));
    }

    public function getTwigFilters()
    {
        return array($this->container['parsedown.twig_filter']);
    }

    public function getFixturesDir()
    {
        return __DIR__.'/Fixtures/';
    }
}
