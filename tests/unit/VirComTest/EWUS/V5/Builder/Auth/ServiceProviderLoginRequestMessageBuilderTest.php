<?php

declare(strict_types=1);

namespace VirComTest\EWUS\V5\Builder\Auth;

use Codeception\Test\Unit;
use VirCom\EWUS\V5\Builder\Auth\ServiceProviderLoginRequestMessageBuilder;
use VirCom\EWUS\V5\Request\Auth\ServiceProviderLoginRequest;
use VirCom\EWUS\V5\Enum\NHFBranchIdentifierEnum;
use XmlWriter;

class ServiceProviderLoginRequestMessageBuilderTest extends Unit
{
    
    private const XML_RESULT_MESSAGE = <<<result
        <?xml version="1.0" encoding="UTF-8"?>
        <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:auth="http://xml.kamsoft.pl/ws/kaas/login_types">
         <soapenv:Header/>
         <soapenv:Body>
          <auth:login>
           <auth:credentials>
            <auth:item>
             <auth:name>domain</auth:name>
             <auth:value>
              <auth:stringValue>01</auth:stringValue>
             </auth:value>
            </auth:item>
            <auth:item>
             <auth:name>login</auth:name>
             <auth:value>
              <auth:stringValue>TEST</auth:stringValue>
             </auth:value>
            </auth:item>
            <auth:item>
            <auth:name>type</auth:name>
             <auth:value>
              <auth:stringValue>SWD</auth:stringValue>
             </auth:value>
            </auth:item>
            <auth:item>
             <auth:name>idntSwd</auth:name>
             <auth:value>
              <auth:stringValue>123456789</auth:stringValue>
             </auth:value>
            </auth:item>
           </auth:credentials>
           <auth:password>qwerty!@#</auth:password>
          </auth:login>
         </soapenv:Body>
        </soapenv:Envelope>
        result;

    private ServiceProviderLoginRequestMessageBuilder $builder;
    private ServiceProviderLoginRequest $request;
    
    protected function _before()
    {
        /** @var XMLWriter $xmlWriter */
        $xmlWriter = $this->make(
            XmlWriter::class,
            [
                'outputMemory' => function() {
                    return self::XML_RESULT_MESSAGE;
                },
            ]
        );

        $this->builder = new ServiceProviderLoginRequestMessageBuilder(
            $xmlWriter
        );

        $this->request = new ServiceProviderLoginRequest(
            NHFBranchIdentifierEnum::_01(),
            'TEST',
            'qwerty!@#',
            '123456789'
        );
    }

    public function testCreateMessageMethodReturnsExpectedResult()
    {
        $this->assertEquals(
            self::XML_RESULT_MESSAGE,
            trim(
                $this->builder->createMessage(
                    $this->request
                )
            )
        );
    }
}