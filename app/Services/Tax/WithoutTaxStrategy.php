<?php

namespace App\Services\Tax;

class WithoutTaxStrategy implements TaxStrategyInterface
{
    public function calculate(float $price): float
    {
        return $price;
    }
}
