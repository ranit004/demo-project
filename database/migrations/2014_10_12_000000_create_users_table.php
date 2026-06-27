<?php

/*
|--------------------------------------------------------------------------
| Migration: create_users_table
|--------------------------------------------------------------------------
| Default Laravel users table with an added `role` ENUM column
| ('admin' | 'user') that defaults to 'user'.
*/

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            // Role-based access: only 'admin' or 'user', defaults to 'user'.
            $table->enum('role', ['admin', 'user'])->default('user');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
