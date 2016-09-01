<?php

namespace Clippings\ParsedownProvider\Test;

use Silex\Application;
use Clippings\ParsedownProvider\ParsedownTrait;

class ApplicationWithTrait extends Application
{
    use ParsedownTrait;
}