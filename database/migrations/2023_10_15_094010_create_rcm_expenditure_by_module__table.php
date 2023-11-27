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
        Schema::create('rcm_expenditure_by_module_', function (Blueprint $table) {
            $table->id();
            $table->string('ModuleName')->nullable();
            $table->decimal('Q1-4Budget', 65, 30)->nullable();
            $table->decimal('Q5-Q8Budget', 65, 30)->nullable();
            $table->decimal('TotalAvailableBudgetQ1-Q8', 65, 30)->nullable();
            $table->decimal('ActualExpenditureQ1-Q8', 65, 30)->nullable();
            $table->decimal('Q9Budget', 65, 30)->nullable();
            $table->decimal('ActualExpenditure Q9', 65, 30)->nullable();
            $table->decimal('BudgetVsActualVariances Q1-Q8', 65, 30)->nullable();
            $table->decimal('BudgetVsActualVariancesQ9', 65, 30)->nullable();
            $table->decimal('AbsorptionCapacityQ1-Q8', 65, 30)->nullable();
            $table->decimal('AbsorptionCapacityQ9', 65, 30)->nullable();
            $table->string('ExplanationOfVariances')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rcm_expenditure_by_module_');
    }
};
