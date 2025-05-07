<?php

namespace App\Services\Tax;

class TaxCalculator
{

    protected $strategy;

    public function __construct(TaxStrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    public function calculate(float $price): float
    {
        return $this->strategy->calculate($price);
    }
}
