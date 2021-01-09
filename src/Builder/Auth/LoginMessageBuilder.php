<?php

declare(strict_types=1);

namespace VirCom\EWUS\Builder\Auth;

use VirCom\EWUS\Request\Auth\BasicLoginRequest;
use Sabre\Xml\Writer as XmlBuilder;

class LoginMessageBuilder
{
    public function __construct(
        private XmlBuilder $xmlBuilder
    ) { }

    public function build(
        BasicLoginRequest $request
    ): string {
        $this->xmlBuilder->openMemory();
        $this->xmlBuilder->setIndent(true);
        $this->xmlBuilder->startDocument();

        $this->xmlBuilder->startElement('soapenv:Envelope');
        $this->xmlBuilder->writeAttributes([
            'xmlns:soapenv' => 'http://schemas.xmlsoap.org/soap/envelope/',
            'xmlns:auth' => 'http://xml.kamsoft.pl/ws/kaas/login_types',
        ]);

        $this->xmlBuilder->startElement('soapenv:Header');
        $this->xmlBuilder->endElement();

        $this->xmlBuilder->startElement('soapenv:Body');
        
        $this->xmlBuilder->startElement('auth:login');

        $this->xmlBuilder->startElement('auth:credentials');

        $this->xmlBuilder->startElement('auth:item');

        $this->xmlBuilder->startElement('auth:name');
        $this->xmlBuilder->write('domain');
        $this->xmlBuilder->endElement();

        $this->xmlBuilder->startElement('auth:value');

        $this->xmlBuilder->startElement('auth:stringValue');
        $this->xmlBuilder->write($request->getDomain()->__toString());
        $this->xmlBuilder->endElement();

        $this->xmlBuilder->endElement();

        $this->xmlBuilder->endElement();

        $this->xmlBuilder->startElement('auth:item');

        $this->xmlBuilder->startElement('auth:name');
        $this->xmlBuilder->write('login');
        $this->xmlBuilder->endElement();

        $this->xmlBuilder->startElement('auth:value');

        $this->xmlBuilder->startElement('auth:stringValue');
        $this->xmlBuilder->write($request->getLogin());
        $this->xmlBuilder->endElement();

        $this->xmlBuilder->endElement();

        $this->xmlBuilder->endElement();

        $this->xmlBuilder->endElement();

        $this->xmlBuilder->startElement('auth:password');
        $this->xmlBuilder->write($request->getPassword());
        $this->xmlBuilder->endElement();

        $this->xmlBuilder->endElement();

        $this->xmlBuilder->endElement();

        $this->xmlBuilder->endElement();


        return $this->xmlBuilder->outputMemory();
    }
}