<?php

namespace Renova\Soap\Facades;

use Renova\Soap\SoapFactory;
use Illuminate\Support\Facades\Facade;

/**
 * Class Soap.
 *
 * @method static \Renova\Soap\SoapClient baseWsdl(string $wsdl)
 * @method static \Renova\Soap\SoapClient stub(callable $callback)
 * @method static \Renova\Soap\SoapClient buildClient(string $setup = '')
 * @method static \Renova\Soap\SoapClient byConfig(string $setup = '')
 * @method static \Renova\Soap\SoapClient options(array $options)
 * @method static \Renova\Soap\SoapClient handlerOptions(array $options)
 * @method static \Renova\Soap\SoapClient withWsse(array $config)
 * @method static \Renova\Soap\SoapClient withWsa()
 * @method static \Renova\Soap\SoapClient withRemoveEmptyNodes()
 * @method static \Renova\Soap\SoapClient withBasicAuth(string $username, string $password)
 * @method \Renova\Soap\Client\Response call(string $method, array $arguments = [])
 * @method static \GuzzleHttp\Promise\PromiseInterface response($body = null, $status = 200, array $headers = [])
 * @method static \Renova\Soap\Client\ResponseSequence sequence(array $responses = [])
 * @method static \Renova\Soap\Client\ResponseSequence fakeSequence(string $urlPattern = '*')
 * @method static \Renova\Soap\SoapFactory fake($callback = null)
 * @method static assertSent(callable $callback)
 * @method static assertNotSent(callable $callback)
 * @method static assertActionCalled(string $action)
 * @method static assertNothingSent()
 * @method static assertSequencesAreEmpty()
 * @method static assertSentCount($count)
 */
class Soap extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return SoapFactory::class;
    }
}
