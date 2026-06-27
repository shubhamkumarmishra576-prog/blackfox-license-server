<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\License;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_code',
        'product_name',
        'version',
        'build_number',
        'license_type',
        'max_activations',
        'allowed_computers',
        'download_url',
        'api_key',
        'description',
        'status',
    ];

    public function licenses()
    {
        return $this->hasMany(License::class);
    }

    public function isActive()
    {
        return $this->status === 'active';
    }
}