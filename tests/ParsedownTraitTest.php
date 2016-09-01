<?php

namespace Clippings\ParsedownProvider\Test;

class ParsedownTraitTest extends \PHPUnit_Framework_TestCase
{
    public function testParsedownTrait()
    {
        $app = new ApplicationWithTrait();

        $parsedownMock = $this->getMockBuilder('Parsedown')
            ->setMethods(['text'])
            ->getMock();

        $parsedownMock->expects($this->once())
            ->method('text')
            ->with('markdown')
            ->will($this->returnValue('html'));

        $app['parsedown'] = $parsedownMock;

        $this->assertEquals('html', $app->parsedown('markdown'));
    }
}