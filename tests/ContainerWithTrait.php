<?php

namespace Clippings\ParsedownProvider\Test;

use Pimple\Container;
use Clippings\ParsedownProvider\ParsedownTrait;

class ContainerWithTrait extends Container
{
    use ParsedownTrait;
}
