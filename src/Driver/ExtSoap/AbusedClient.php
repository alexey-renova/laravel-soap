<?php

declare(strict_types=1);

namespace Renova\Soap\Driver\ExtSoap;

use Renova\SoapClient\Soap\Driver\ExtSoap\AbusedClient as RenovaAbusedClient;
use Renova\SoapClient\Soap\Driver\ExtSoap\ExtSoapOptions;
use Renova\SoapClient\Soap\HttpBinding\SoapRequest;
use Renova\SoapClient\Xml\SoapXml;

class AbusedClient extends RenovaAbusedClient
{
    public static function createFromOptions(ExtSoapOptions $options): RenovaAbusedClient
    {
        return new self($options->getWsdl(), $options->getOptions());
    }

    public function __doRequest($request, $location, $action, $version, $oneWay = 0)
    {
        $xml = SoapXml::fromString($request);
        $action = $action ?? $xml->getBody()->firstChild->localName;
        $this->storedRequest = new SoapRequest($request, $location, $action, $version, $oneWay);

        return $this->storedResponse ? $this->storedResponse->getResponse() : '';
    }
}
