<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('role')->nullable();
            $table->string('UserID')->nullable();
            $table->string('AccountDescription')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        $password = '$2y$10$oYX7o0ag8SDT12ixuKo5nelOA463NjwSPJ5pm1gdqyKdtguqQoUKu';
        $createdAt = '2023-09-30 10:19:57';
        $updatedAt = '2023-09-30 10:19:57';

        \DB::statement("INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
        (:id, :name, :email, :email_verified_at, :password, :remember_token, :created_at, :updated_at)", [
            'id' => 1,
            'name' => 'Ayebare Timothy',
            'email' => 'vexa256@gmail.com',
            'email_verified_at' => null,
            'password' => $password,
            'remember_token' => null,
            'created_at' => $createdAt,
            'updated_at' => $updatedAt
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
