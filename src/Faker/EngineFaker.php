<?php

declare(strict_types=1);

namespace Renova\Soap\Faker;

use Renova\Soap\Xml\XMLSerializer;
use Renova\SoapClient\Soap\Engine\DriverInterface;
use Renova\SoapClient\Soap\Engine\EngineInterface;
use Renova\SoapClient\Soap\Engine\Metadata\MetadataInterface;
use Renova\SoapClient\Soap\Handler\HandlerInterface;
use Renova\SoapClient\Soap\HttpBinding\LastRequestInfo;
use Renova\SoapClient\Soap\HttpBinding\SoapRequest;

/**
 * Class EngineFaker.
 */
class EngineFaker implements EngineInterface
{
    /**
     * @var DriverInterface
     */
    private $driver;

    /**
     * @var HandlerInterface
     */
    private $handler;

    /**
     * @var string
     */
    private $wsdl;

    /**
     * EngineFaker constructor.
     * @param  DriverInterface  $driver
     * @param  HandlerInterface  $handler
     * @param  string  $wsdl
     */
    public function __construct(
        DriverInterface $driver,
        HandlerInterface $handler,
        $wsdl = ''
    ) {
        $this->driver = $driver;
        $this->handler = $handler;
        $this->wsdl = $wsdl;
    }

    /**
     * @return MetadataInterface
     */
    public function getMetadata(): MetadataInterface
    {
        return $this->driver->getMetadata();
    }

    /**
     * @param  string  $method
     * @param  array  $arguments
     * @return mixed
     */
    public function request(string $method, array $arguments)
    {
        $request = new SoapRequest(XMLSerializer::arrayToSoapXml($arguments), $this->wsdl, $method, 1);
        $response = $this->handler->request($request);

        return json_decode($response->getResponse());
    }

    /**
     * @return LastRequestInfo
     */
    public function collectLastRequestInfo(): LastRequestInfo
    {
        return $this->handler->collectLastRequestInfo();
    }
}
