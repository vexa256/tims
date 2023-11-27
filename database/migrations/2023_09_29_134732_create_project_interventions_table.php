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
        Schema::create('project_interventions', function (Blueprint $table) {
            $table->id();
            $table->string('PID');
            $table->string('IID');
            $table->string('MID');
            $table->string('InterventionName');
            // $table->string('Description'); // commented out as in the original schema
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
        Schema::dropIfExists('project_interventions');
    }
};
