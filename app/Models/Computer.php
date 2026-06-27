<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'license_id',
        'computer_name',
        'hardware_id',
        'os_name',
        'os_version',
        'app_version',
        'last_ip',
        'last_seen_at',
        'status',
    ];

    protected $casts = [
        'last_seen_at' => 'datetime',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function license()
    {
        return $this->belongsTo(License::class);
    }

    public function isActive()
    {
        return $this->status === 'active';
    }
}