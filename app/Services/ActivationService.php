<?php

namespace App\Services;

use App\Models\Computer;
use App\Models\License;

class ActivationService
{
    public function activate(License $license, array $device): array
    {
        $existing = Computer::where('hardware_id', $device['hardware_id'])
            ->where('license_id', $license->id)
            ->first();

        if ($existing) {

            $existing->update([
                'last_seen_at' => now(),
                'last_ip' => request()->ip(),
            ]);

            return [
                'success' => true,
                'message' => 'Computer already activated.'
            ];
        }

        if ($license->used_activations >= $license->allowed_computers) {

            return [
                'success' => false,
                'message' => 'Activation limit reached.'
            ];
        }

        Computer::create([

            'client_id'      => $license->client_id,
            'license_id'     => $license->id,
            'computer_name'  => $device['computer_name'],
            'hardware_id'    => $device['hardware_id'],
            'platform'       => $device['platform'] ?? null,
            'app_version'    => $device['app_version'] ?? null,
            'status'         => 'active',
            'activated_at'   => now(),
            'last_seen_at'   => now(),
            'last_ip'        => request()->ip(),

        ]);

        $license->increment('used_activations');

        return [
            'success' => true,
            'message' => 'Computer activated successfully.'
        ];
    }
}