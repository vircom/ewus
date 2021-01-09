<?php

declare(strict_types=1);

namespace VirCom\EWUS\Factory\Builder\Auth;

use VirCom\EWUS\Builder\Auth\LoginMessageBuilder;
use VirCom\EWUS\Factory\FactoryInterface;
use Sabre\Xml\Writer as XmlWriter;

class LoginMessageBuilderFactory implements FactoryInterface
{
    public function createService(): LoginMessageBuilder
    {
        return new LoginMessageBuilder(
            new XmlWriter()
        );
    }
}