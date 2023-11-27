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
        Schema::create('rcm_expenditure_by_costinput_', function (Blueprint $table) {
            $table->id();
            $table->string('CostInput');
            $table->integer('BudgetLineNo');
            $table->string('ActivityDescription');
            $table->decimal('Q1_4Budget', 65, 30)->nullable();
            $table->decimal('Q5_Q8Budget', 65, 30)->nullable();
            $table->decimal('TotalAvailableBudget', 65, 30)->nullable();
            $table->decimal('Q9Budget', 65, 30)->nullable();
            $table->decimal('ActualExpenditure_Q1_Q8', 65, 30)->nullable();
            $table->decimal('ActualExpenditure_Q9', 65, 30)->nullable();
            $table->decimal('BudgetVsActualVariances_Q1_Q8', 65, 30)->nullable();
            $table->decimal('BudgetVsActualVariances_Q9', 65, 30)->nullable();
            $table->decimal('AbsorptionCapacity_Q1_Q8', 65, 30)->nullable();
            $table->decimal('AbsorptionCapacity_Q9', 65, 30)->nullable();
            $table->text('ExplanationOfVariances')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rcm_expenditure_by_costinput_');
    }
};
