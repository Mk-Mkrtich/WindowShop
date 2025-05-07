<?php

namespace App\Services\Tax;

class WithTaxStrategy implements TaxStrategyInterface
{
    public function calculate(float $price): float
    {
        return $price * 1.2;
    }
}
