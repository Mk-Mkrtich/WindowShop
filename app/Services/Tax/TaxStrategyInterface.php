<?php

namespace App\Services\Tax;

interface TaxStrategyInterface
{
    public function calculate(float $price): float;
}
