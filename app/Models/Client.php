<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\License;

class Client extends Model
{
    protected $fillable = [

        'client_code',

        'company_name',

        'owner_name',

        'email',

        'phone',

        'address',

        'city',

        'state',

        'country',

        'postal_code',

        'status',

        'company_logo',

        'notes',

    ];
    public function licenses()
{
    return $this->hasMany(License::class);
}
}