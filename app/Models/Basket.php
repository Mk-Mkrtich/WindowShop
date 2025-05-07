<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    /**
     * @var array|mixed
     */

    protected $fillable = [
        'user_id',
        'session_id',
        'items'
    ];

    protected $casts = [
        'items' => 'array',
    ];

    public function __get($key)
    {
        if ($key === 'items') {
            $value = parent::__get($key);
            if (is_null($value)) return [];

            return $value;
        }
        return parent::__get($key);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
