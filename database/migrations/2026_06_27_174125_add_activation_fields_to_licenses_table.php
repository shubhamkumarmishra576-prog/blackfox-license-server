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
        Schema::table('licenses', function (Blueprint $table) {

            $table->enum('activation_mode', ['single', 'group'])
                  ->default('single')
                  ->after('max_activations');

            $table->integer('allowed_computers')
                  ->default(1)
                  ->after('activation_mode');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('licenses', function (Blueprint $table) {

            $table->dropColumn([
                'activation_mode',
                'allowed_computers',
            ]);

        });
    }
};