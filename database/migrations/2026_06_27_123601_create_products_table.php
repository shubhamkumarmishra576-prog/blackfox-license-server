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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

$table->string('product_code')->unique();

$table->string('product_name');

$table->string('version')->default('1.0.0');

$table->string('build_number')->nullable();

$table->enum('license_type', [
    'subscription',
    'perpetual',
    'trial'
])->default('subscription');

$table->integer('max_activations')->default(1);

$table->string('download_url')->nullable();

$table->string('api_key')->nullable();

$table->text('description')->nullable();

$table->enum('status', [
    'active',
    'inactive'
])->default('active');

$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
