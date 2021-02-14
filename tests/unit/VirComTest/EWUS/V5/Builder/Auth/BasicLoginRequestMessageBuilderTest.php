<?php

declare(strict_types=1);

namespace VirComTest\EWUS\V5\Builder\Auth;

use VirCom\EWUS\V5\Builder\Auth\BasicLoginRequestMessageBuilder;
use VirCom\EWUS\V5\Request\Auth\BasicLoginRequest;
use VirCom\EWUS\V5\Enum\NHFBranchIdentifierEnum;
use Codeception\Test\Unit;
use XMLWriter;

class BasicLoginRequestMessageBuilderTest extends Unit
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
              <auth:stringValue>15</auth:stringValue>
             </auth:value>
            </auth:item>
            <auth:item>
             <auth:name>login</auth:name>
             <auth:value>
              <auth:stringValue>TEST1</auth:stringValue>
             </auth:value>
            </auth:item>
           </auth:credentials>
           <auth:password>qwerty!@#</auth:password>
          </auth:login>
         </soapenv:Body>
        </soapenv:Envelope>
        result;

    private BasicLoginRequestMessageBuilder $builder;
    private BasicLoginRequest $request;
    
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

        $this->builder = new BasicLoginRequestMessageBuilder(
            $xmlWriter
        );

        $this->request = new BasicLoginRequest(
            NHFBranchIdentifierEnum::_15(),
            'TEST1',
            'qwerty!@#'
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