<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();

$table->foreignId('client_id')
      ->constrained()
      ->cascadeOnDelete();

$table->foreignId('product_id')
      ->constrained()
      ->cascadeOnDelete();

$table->string('license_key')->unique();

$table->enum('license_type', [
    'trial',
    'subscription',
    'perpetual'
]);

$table->integer('max_activations')->default(1);
$table->enum('activation_mode', [
    'single',
    'group'
])->default('single');

$table->integer('allowed_computers')->default(1);
$table->integer('used_activations')->default(0);

$table->timestamp('last_activation_at')->nullable();

$table->date('expires_at')->nullable();

$table->enum('status', [
    'active',
    'expired',
    'blocked'
])->default('active');

$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licenses');
    }
};
