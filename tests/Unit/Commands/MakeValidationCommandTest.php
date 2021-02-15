<?php

namespace Renova\Soap\Tests\Unit\Commands;

use Renova\Soap\Tests\TestCase;

class MakeValidationCommandTest extends TestCase
{
    public function testConsoleCommand()
    {
        $this->artisan('soap:make:validation --dry-run')
            ->expectsQuestion('Please type the wsdl or the name of your client configuration if u have defined one in the config "soap.php"', 'laravel_soap')
            ->expectsConfirmation('Do you want to generate for every client method a validation?', 'no')
            ->expectsQuestion('Which method do you want to generate?', 'GetWeatherInformation');
    }
}
