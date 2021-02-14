<?php

declare(strict_types=1);

namespace VirCom\EWUS\V5\Builder\Auth\Login;

use VirCom\EWUS\V5\Request\Auth\Login\AbstractLoginRequest;
use VirCom\EWUS\V5\Enum\EWUSXMLNamespacesEnum;
use XMLWriter;

abstract class AbstractLoginRequestMessageBuilder implements LoginRequestMessageBuilder
{
    public function __construct(
        protected XMLWriter $xmlWriter 
    ) { }

    public function createMessage(
        AbstractLoginRequest $request
    ): string {

        $this->initializeDocument();
        $this->createEnvelope($request);
        $this->closeDocument();

        return $this->xmlWriter->outputMemory();
    }

    private function initializeDocument(): void
    {
        $this->xmlWriter->openMemory();
        $this->xmlWriter->setIndent(true);
        $this->xmlWriter->startDocument('1.0', 'UTF-8');
    }

    private function createEnvelope(
        AbstractLoginRequest $request
    ): void {
        $this->xmlWriter->startElement('soapenv:Envelope');
        $this->xmlWriter->writeAttribute('xmlns:soapenv', EWUSXMLNamespacesEnum::XMLNS_SOAPENV()->getValue());
        $this->xmlWriter->writeAttribute('xmlns:auth', EWUSXMLNamespacesEnum::XMLNS_AUTH()->getValue());

        $this->createHeader($request);
        $this->createBody($request);

        $this->xmlWriter->endElement();
    }

    private function closeDocument(): void
    {
        $this->xmlWriter->endDocument();
    }

    private function createHeader(
        AbstractLoginRequest $request
    ): void {
        $this->xmlWriter->startElement('soapenv:Header');
        $this->xmlWriter->endElement();
    }

    private function createBody(
        AbstractLoginRequest $request
    ): void {
        $this->xmlWriter->startElement('soapenv:Body');

        $this->createLoginAction($request);

        $this->xmlWriter->endElement();
    }


    private function createLoginAction(
        AbstractLoginRequest $request
    ): void {
        $this->xmlWriter->startElement('auth:login');

        $this->createCredentials($request);
        $this->createPassword($request);

        $this->xmlWriter->endElement();
    }

    private function createCredentials(
        AbstractLoginRequest $request
    ): void {
        $this->xmlWriter->startElement('auth:credentials');

        $this->addStandardCredentials($request);
        $this->addAdditionalCredentials($request);

        $this->xmlWriter->endElement();
    }

    private function addStandardCredentials(
        AbstractLoginRequest $request
    ): void {
        $this->addStandardDomainCredential($request);
        $this->addStandardLoginCredential($request);
    }

    private function addStandardDomainCredential(
        AbstractLoginRequest $request
    ): void {
        $this->xmlWriter->startElement('auth:item');
        
        $this->xmlWriter->startElement('auth:name');
        $this->xmlWriter->text('domain');
        $this->xmlWriter->endElement();

        $this->xmlWriter->startElement('auth:value');
        
        $this->xmlWriter->startElement('auth:stringValue');
        $this->xmlWriter->text($request->getDomain()->getValue());
        $this->xmlWriter->endElement();

        $this->xmlWriter->endElement();

        $this->xmlWriter->endElement();
    }

    private function addStandardLoginCredential(
        AbstractLoginRequest $request
    ): void {
        $this->xmlWriter->startElement('auth:item');
        
        $this->xmlWriter->startElement('auth:name');
        $this->xmlWriter->text('login');
        $this->xmlWriter->endElement();

        $this->xmlWriter->startElement('auth:value');
        
        $this->xmlWriter->startElement('auth:stringValue');
        $this->xmlWriter->text($request->getLogin());
        $this->xmlWriter->endElement();

        $this->xmlWriter->endElement();

        $this->xmlWriter->endElement();
    }

    private function createPassword(
        AbstractLoginRequest $request
    ): void {
        $this->xmlWriter->startElement('auth:password');
        $this->xmlWriter->text($request->getPassword());
        $this->xmlWriter->endElement();
    }

    abstract protected function addAdditionalCredentials(
        AbstractLoginRequest $request
    ): void;
}