<?php

namespace Clippings\ParsedownProvider\Test;

use Pimple\Container;
use Clippings\ParsedownProvider\ParsedownServiceProvider;

/**
 * @coversDefaultClass \Clippings\ParsedownProvider\ParsedownServiceProvider
 */
class ParsedownServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::register
     */
    public function testRegister()
    {
        $app = new Container();
        $app->register(new ParsedownServiceProvider());

        $this->assertArrayHasKey('parsedown.class', $app);
        $this->assertArrayHasKey('parsedown.breaks_enabled', $app);
        $this->assertArrayHasKey('parsedown.markup_escaped', $app);
        $this->assertArrayHasKey('parsedown.urls_linked', $app);
        $this->assertArrayHasKey('parsedown', $app);
        $this->assertArrayHasKey('parsedown.twig_filter', $app);

        $this->assertInstanceOf('Parsedown', $app['parsedown']);
        $this->assertSame($app['parsedown'], $app['parsedown']);

        $this->assertTrue($app['parsedown.breaks_enabled']);
        $this->assertFalse($app['parsedown.markup_escaped']);
        $this->assertTrue($app['parsedown.urls_linked']);

        $this->assertInstanceOf(
            'Twig_SimpleFilter',
            $app['parsedown.twig_filter']
        );
    }
}
