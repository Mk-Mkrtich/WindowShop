<?php

namespace App\Services\Tax;

use App\Models\User;

class CalculationContext
{
    protected $strategy;

    public function __construct(User $user)
    {
        $this->strategy = match ($user->calculation_type) {
            User::CALC_WITHOUT_TAX => new WithoutTaxStrategy(),
            default => new WithTaxStrategy(),
        };
    }

    public function calculate(float $price): float
    {
        return $this->strategy->calculate($price);
    }
}
