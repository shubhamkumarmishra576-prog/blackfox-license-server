<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'product_id',
        'license_key',
        'license_type',
        'max_activations',
        'activation_mode',
         'allowed_computers',
        'used_activations',
        'expires_at',
        'last_activation_at',
        'status',
    ];

    protected $casts = [
        'expires_at' => 'date',
        'last_activation_at' => 'datetime',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}