<?php

namespace Clippings\ParsedownProvider\Test;

class ParsedownTraitTest extends \PHPUnit_Framework_TestCase
{
    public function testParsedownTrait()
    {
        if (-1 === version_compare(PHP_VERSION, '5.4.0')) {
            $this->markTestSkipped(
                'Skipping trait test as PHP traits are available after PHP 5.4'
            );
        }

        $container = new ContainerWithTrait();

        $parsedownMock = $this->getMockBuilder('Parsedown')
            ->setMethods(array('text'))
            ->getMock();

        $parsedownMock->expects($this->once())
            ->method('text')
            ->with('markdown')
            ->will($this->returnValue('html'));

        $container['parsedown'] = $parsedownMock;

        $this->assertEquals('html', $container->parsedown('markdown'));
    }
}
