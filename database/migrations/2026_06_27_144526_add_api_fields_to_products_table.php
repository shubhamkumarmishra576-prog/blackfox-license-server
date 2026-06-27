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
    Schema::table('products', function (Blueprint $table) {

        $table->string('api_key')->unique()->after('version');

        $table->text('description')->nullable()->after('api_key');

        $table->enum('status', [
            'active',
            'inactive'
        ])->default('active')->after('description');

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('products', function (Blueprint $table) {

        $table->dropColumn([
            'api_key',
            'description',
            'status'
        ]);

    });
}