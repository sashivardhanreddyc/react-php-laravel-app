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
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstname')->after('id');
            $table->string('lastname')->nullable()->after('firstname');
            $table->string('username')->unique()->after('lastname');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Remove the unique constraint
            $table->dropUnique(['username']);

            // Remove the columns
            $table->dropColumn([
                'firstname',
                'lastname',
                'username',
            ]);
        });
    }
};
