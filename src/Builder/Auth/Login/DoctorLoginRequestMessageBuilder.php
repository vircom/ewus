<?php

declare(strict_types=1);

namespace VirCom\EWUS\V5\Builder\Auth\Login;

use VirCom\EWUS\V5\Exception\Builder\InvalidArgumentException;
use VirCom\EWUS\V5\Request\Auth\Login\AbstractLoginRequest;
use VirCom\EWUS\V5\Request\Auth\Login\DoctorLoginRequest;

class DoctorLoginRequestMessageBuilder extends AbstractLoginRequestMessageBuilder
{
    /**
     * @param DoctorLoginRequest $request
     * @return void
     */
    protected function addAdditionalCredentials(
        AbstractLoginRequest $request
    ): void {
        $this->validate($request);
        $this->addAdditionalCustomCredentialType($request);
    }

    private function validate(
        AbstractLoginRequest $request
    ): void {
        if(!$request instanceof DoctorLoginRequest) {
            throw new InvalidArgumentException(
                sprintf(
                    "Builder requires instance of %s class. %s given!",
                    DoctorLoginRequest::class,
                    get_class($request)
                )
            );
        }
    }

    private function addAdditionalCustomCredentialType(
        DoctorLoginRequest $request
    ): void {
        $this->xmlWriter->startElement('auth:item');
        
        $this->xmlWriter->startElement('auth:name');
        $this->xmlWriter->text('type');
        $this->xmlWriter->endElement();

        $this->xmlWriter->startElement('auth:value');
        
        $this->xmlWriter->startElement('auth:stringValue');
        $this->xmlWriter->text($request->getType()->getValue());
        $this->xmlWriter->endElement();

        $this->xmlWriter->endElement();

        $this->xmlWriter->endElement();
    }
}