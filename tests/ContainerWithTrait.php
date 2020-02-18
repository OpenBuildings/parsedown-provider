<?php

namespace Clippings\ParsedownProvider\Test;

use Clippings\ParsedownProvider\ParsedownTrait;
use Pimple\Container;

class ContainerWithTrait extends Container
{
    use ParsedownTrait;
}
