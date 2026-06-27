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
        Schema::create('computers', function (Blueprint $table) {
            $table->id();

$table->foreignId('client_id')
      ->constrained()
      ->cascadeOnDelete();

$table->foreignId('license_id')
      ->constrained()
      ->cascadeOnDelete();

$table->string('computer_name');

$table->string('hardware_id')->unique();

$table->string('os_name')->nullable();

$table->string('os_version')->nullable();

$table->string('app_version')->nullable();

$table->ipAddress('last_ip')->nullable();

$table->timestamp('last_seen_at')->nullable();

$table->enum('status',[
    'active',
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
        Schema::dropIfExists('computers');
    }
};
