<?php

namespace App\Services;

use App\Models\Computer;
use App\Models\License;

class ActivationService
{
    public function activate(License $license, array $device): array
    {
        if ($license->status !== 'active') {

    return [
        'success' => false,
        'message' => 'License is not active.'
    ];

}

if ($license->expires_at && now()->greaterThan($license->expires_at)) {

    return [
        'success' => false,
        'message' => 'License has expired.'
    ];

}

        $existing = Computer::where('hardware_id', $device['hardware_id'])
            ->where('license_id', $license->id)
            ->first();

        if ($existing) {

            $existing->update([

    'computer_name' => $device['computer_name'],

    'os_name' => $device['os_name'] ?? $existing->os_name,

    'os_version' => $device['os_version'] ?? $existing->os_version,

    'app_version' => $device['app_version'] ?? $existing->app_version,

    'last_seen_at' => now(),

    'last_ip' => request()->ip(),

]);

            return [
                'success' => true,
                'message' => 'Computer already activated.'
            ];
        }

        // Single Computer License
if ($license->activation_mode === 'single') {

    if ($license->used_activations >= 1) {

        return [
            'success' => false,
            'message' => 'This license is already activated on another computer.'
        ];

    }

}

// Group License
if ($license->activation_mode === 'group') {

    if ($license->used_activations >= $license->allowed_computers) {

        return [
            'success' => false,
            'message' => 'Activation limit reached.'
        ];

    }

}

        Computer::create([

           'client_id'      => $license->client_id,

           'license_id'     => $license->id,

            'computer_name'  => $device['computer_name'],

            'hardware_id'    => $device['hardware_id'],

            'os_name'        => $device['os_name'] ?? null,

            'os_version'     => $device['os_version'] ?? null,

            'app_version'    => $device['app_version'] ?? null,

            'last_ip'        => request()->ip(),

            'last_seen_at'   => now(),

            'status'         => 'active',

        ]);

        $license->increment('used_activations');

        return [
            'success' => true,
            'message' => 'Computer activated successfully.'
        ];
    }
}