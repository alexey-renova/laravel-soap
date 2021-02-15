<?php

namespace Renova\Soap\Exceptions;

use Renova\Soap\Client\Response;
use Exception;

class RequestException extends Exception
{
    /**
     * The response instance.
     *
     * @var \Renova\Soap\Client\Response
     */
    public $response;

    /**
     * Create a new exception instance.
     *
     * @param  \Renova\Soap\Client\Response  $response
     * @return void
     */
    public function __construct(Response $response)
    {
        parent::__construct("Soap request error with status code {$response->status()}:\n {$response->body()}",
            $response->status());

        $this->response = $response;
    }
}
