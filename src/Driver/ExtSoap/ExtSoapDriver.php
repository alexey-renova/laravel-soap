<?php

namespace Renova\Soap\Driver\ExtSoap;

use Renova\SoapClient\Soap\Driver\ExtSoap\ExtSoapDriver as RenovaExtSoapDriver;
use Renova\SoapClient\Soap\Driver\ExtSoap\ExtSoapOptions;

class ExtSoapDriver extends RenovaExtSoapDriver
{
    public static function createFromOptions(ExtSoapOptions $options): RenovaExtSoapDriver
    {
        $client = AbusedClient::createFromOptions($options);

        return self::createFromClient($client);
    }
}
