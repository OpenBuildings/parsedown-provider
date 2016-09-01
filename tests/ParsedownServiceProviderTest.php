<?php

namespace Clippings\ParsedownProvider\Test;

use Pimple\Container;
use Clippings\ParsedownProvider\ParsedownServiceProvider;

class ParsedownServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testRegister()
    {
        $container = new Container();
        $container->register(new ParsedownServiceProvider());
        $this->assertNotNull(
            $container['parsedown'],
            '"parsedown" service must be registered by the provider'
        );
        $this->assertInstanceOf(
            'Parsedown',
            $container['parsedown'],
            '"parsedown" service must be an instance of Parsedown'
        );
        $this->assertSame(
            $container['parsedown'],
            $container['parsedown'],
            '"parsedown" service must always return the same instance'
        );
    }
}
