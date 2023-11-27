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
        Schema::create('payables', function (Blueprint $table) {
            $table->id();
            $table->string('Payable');
            $table->decimal('AmountInUsd', 65, 30);
            $table->timestamps();
        });

        DB::table('payables')->insert([
            [
                'Payable' => 'Salaries & ICR for SEPT 2023',
                'AmountInUsd' => 47361.96,
            ],
            [
                'Payable' => 'Suppliers',
                'AmountInUsd' => -9678.74,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payables');
    }
};
