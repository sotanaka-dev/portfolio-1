<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addressee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'postal_code',
        'address',
        'tel',
        'is_default',
    ];

    protected $casts = [
        'is_default' => 'boolean',
    ];
}
