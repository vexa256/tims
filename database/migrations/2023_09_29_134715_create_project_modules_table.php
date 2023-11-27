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
        Schema::create('project_modules', function (Blueprint $table) {
            //   Schema::create('your_table_name_here', function (Blueprint $table) {
            $table->id();
            $table->string('PID');
            $table->string('MID');
            $table->string('ProjectModuleName');
            // $table->string('Description'); // commented out as in original
            $table->longText('OutPuts');
            $table->decimal('TotalBudgetInUsd', 65, 30)->nullable();
            $table->decimal('BudgetAmountSpentAtPresent', 65, 30)->nullable();
            $table->decimal('BudgetAmountAvailable', 65, 30)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_modules');
    }
};
