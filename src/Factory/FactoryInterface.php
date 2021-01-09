<?php

declare(strict_types=1);

namespace VirCom\EWUS\Factory;

interface FactoryInterface
{
    public function createService(): object;
}