<?php

declare(strict_types=1);

namespace Builder\Auth;

use VirCom\EWUS\Request\Auth\BasicLoginRequest;
use VirCom\EWUS\Request\Auth\DoctorLoginRequest;
use VirCom\EWUS\Request\Auth\ServiceProviderLoginRequest;
use VirCom\EWUS\Builder\Auth\LoginMessageBuilder;
use VirCom\EWUS\Enum\NHFBranchIdentifierEnum;
use Sabre\Xml\Writer as XmlBuilder;
use Codeception\Test\Unit;
use Mockery;
use Mockery\LegacyMockInterface;
use Mockery\MockInterface;

class LoginMessageBuilderTest extends Unit
{
    protected BasicLoginRequest $basicLoginRequest;
    protected LoginMessageBuilder $loginMessageBuilder;
    
    protected function _before()
    {
        $this->basicLoginRequest = new BasicLoginRequest(
            NHFBranchIdentifierEnum::_15(),
            'TEST1',
            'qwerty!@#'
        );

        /** @var XmlBuilder|MockInterface|LegacyMockInterface $xmlBuilder */
        $xmlBuilder = Mockery::mock(XmlBuilder::class);
        $this->loginMessageBuilder = new LoginMessageBuilder(
            $xmlBuilder
        );
    }

    public function testThatBuilderUsesDomainWhenGeneratesOutputXmlDocumentForBasicLoginRequest()
    {
        
    }
}