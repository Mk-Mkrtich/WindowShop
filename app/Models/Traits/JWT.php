<?php

namespace App\Models\Traits;

trait JWT
{
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }


    public function getAuthIdentifierName(): string
    {
        return 'id';
    }
}
