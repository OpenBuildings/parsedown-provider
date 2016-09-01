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
        $this->container->register(new ParsedownServiceProvider());
    }

    public function getTwigFilters()
    {
        return [$this->container['parsedown.twig_filter']];
    }

    public function getFixturesDir()
    {
        return __DIR__.'/Fixtures/';
    }
}
