<?php

declare(strict_types=1);

namespace Renova\Soap\Driver\ExtSoap;

use Renova\Soap\Faker\EngineFaker;
use Renova\SoapClient\Soap\Driver\ExtSoap\ExtSoapOptions;
use Renova\SoapClient\Soap\Engine\Engine;
use Renova\SoapClient\Soap\Handler\HandlerInterface;

class ExtSoapEngineFactory
{
    public static function fromOptionsWithHandler(
        ExtSoapOptions $options,
        HandlerInterface $handler,
        $withMocking = false
    ) {
        $driver = ExtSoapDriver::createFromOptions($options);

        return $withMocking ? new EngineFaker($driver, $handler, $options->getWsdl()) : new Engine($driver, $handler);
    }
}
