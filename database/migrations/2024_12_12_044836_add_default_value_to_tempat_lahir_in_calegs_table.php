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
        Schema::table('calegs', function (Blueprint $table) {
            $table->string('tempat_lahir')->default('Unknown')->change();
        });
    }
    /** * Reverse the migrations. */ public function down(): void
    {
        Schema::table('calegs', function (Blueprint $table) {
            $table->string('tempat_lahir')->default(null)->change();
        });
    }
};
