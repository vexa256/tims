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
        Schema::create('rcm_summary_ependiture_costinput', function (Blueprint $table) {
            $table->id();
            $table->string('Description')->nullable();
            $table->decimal('PreviousPeriodBudgetQ1ToQ8', 65, 30)->nullable();
            $table->decimal('Q9PlannedBudget', 65, 30)->nullable();
            $table->decimal('TotalBudgetQ1ToQ9', 65, 30)->nullable();
            $table->decimal('PreviousPeriodExpenditureQ1ToQ8', 65, 30)->nullable();
            $table->decimal('CurrentPeriodExpenditureQ9', 65, 30)->nullable();
            $table->decimal('TotalExpenditureQ1ToQ9', 65, 30)->nullable();
            $table->decimal('PreviousPeriodBudgetBalanceQ1ToQ8', 65, 30)->nullable();
            $table->decimal('CurrentPeriodBudgetBalanceQ1ToQ9', 65, 30)->nullable();
            $table->decimal('TotalBudgetBalanceQ1ToQ9', 65, 30)->nullable();
            $table->decimal('Q1ToQ8AbsorptionCapacity', 65, 30)->nullable();
            $table->decimal('Q9AbsorptionCapacity', 65, 30)->nullable();
            $table->decimal('Q1ToQ9AbsorptionCapacity', 65, 30)->nullable();
            $table->text('ExplanationOfVariances')->nullable();
            $table->timestamps();
        });

        \DB::table('rcm_summary_ependiture_costinput')->insert([
            [
                'Description' => '1.0 Human Resources (HR)',
                'PreviousPeriodBudgetQ1ToQ8' => 785585,
                'Q9PlannedBudget' => 137191,
                'TotalBudgetQ1ToQ9' => 922776,
                'PreviousPeriodExpenditureQ1ToQ8' => 709281,
                'CurrentPeriodExpenditureQ9' => 81408,
                'TotalExpenditureQ1ToQ9' => 790689,
                'PreviousPeriodBudgetBalanceQ1ToQ8' => 76304,
                'CurrentPeriodBudgetBalanceQ1ToQ9' => 55783,
                'TotalBudgetBalanceQ1ToQ9' => 132087,
            ],
            [
                'Description' => '2.0 Travel related costs (TRC)',
                'PreviousPeriodBudgetQ1ToQ8' => 4185173,
                'Q9PlannedBudget' => 1155244,
                'TotalBudgetQ1ToQ9' => 5340417,
                'PreviousPeriodExpenditureQ1ToQ8' => 2546935,
                'CurrentPeriodExpenditureQ9' => 841984,
                'TotalExpenditureQ1ToQ9' => 3388919,
                'PreviousPeriodBudgetBalanceQ1ToQ8' => 1638238,
                'CurrentPeriodBudgetBalanceQ1ToQ9' => 313260,
                'TotalBudgetBalanceQ1ToQ9' => 1951498,
            ],
            [
                'Description' => '3.0 External Professional services (EPS)',
                'PreviousPeriodBudgetQ1ToQ8' => 771606,
                'Q9PlannedBudget' => 135582,
                'TotalBudgetQ1ToQ9' => 907188,
                'PreviousPeriodExpenditureQ1ToQ8' => 266496,
                'CurrentPeriodExpenditureQ9' => 88170,
                'TotalExpenditureQ1ToQ9' => 354666,
                'PreviousPeriodBudgetBalanceQ1ToQ8' => 505110,
                'CurrentPeriodBudgetBalanceQ1ToQ9' => 47412,
                'TotalBudgetBalanceQ1ToQ9' => 552522,
            ],
            [
                'Description' => '9.0 Non-health equipment (NHP)',
                'PreviousPeriodBudgetQ1ToQ8' => 32000,
                'Q9PlannedBudget' => null, // Replace with actual value if available
                'TotalBudgetQ1ToQ9' => 32000,
                'PreviousPeriodExpenditureQ1ToQ8' => 17077,
                'CurrentPeriodExpenditureQ9' => null, // Replace with actual value if available
                'TotalExpenditureQ1ToQ9' => 17077,
                'PreviousPeriodBudgetBalanceQ1ToQ8' => 14923,
                'CurrentPeriodBudgetBalanceQ1ToQ9' => null, // Replace with actual value if available
                'TotalBudgetBalanceQ1ToQ9' => 14923,
            ],
            [
                'Description' => '10.0 Communication Material and Publications (CMP)',
                'PreviousPeriodBudgetQ1ToQ8' => 12422,
                'Q9PlannedBudget' => null, // Replace with actual value if available
                'TotalBudgetQ1ToQ9' => 12422,
                'PreviousPeriodExpenditureQ1ToQ8' => 5422,
                'CurrentPeriodExpenditureQ9' => null, // Replace with actual value if available
                'TotalExpenditureQ1ToQ9' => 5422,
                'PreviousPeriodBudgetBalanceQ1ToQ8' => 7000,
                'CurrentPeriodBudgetBalanceQ1ToQ9' => null, // Replace with actual value if available
                'TotalBudgetBalanceQ1ToQ9' => 7000,
            ],
            [
                'Description' => '11.0 Indirect and Overhead Costs',
                'PreviousPeriodBudgetQ1ToQ8' => 315692,
                'Q9PlannedBudget' => 75651,
                'TotalBudgetQ1ToQ9' => 391343,
                'PreviousPeriodExpenditureQ1ToQ8' => 195641,
                'CurrentPeriodExpenditureQ9' => 50578,
                'TotalExpenditureQ1ToQ9' => 246219,
                'PreviousPeriodBudgetBalanceQ1ToQ8' => 120051,
                'CurrentPeriodBudgetBalanceQ1ToQ9' => 25073,
                'TotalBudgetBalanceQ1ToQ9' => 145123,
            ],
            [
                'Description' => '13.20 Activity Based Contracts',
                'PreviousPeriodBudgetQ1ToQ8' => null, // Replace with actual value if available
                'Q9PlannedBudget' => 85926,
                'TotalBudgetQ1ToQ9' => 85926,
                'PreviousPeriodExpenditureQ1ToQ8' => null, // Replace with actual value if available
                'CurrentPeriodExpenditureQ9' => null, // Replace with actual value if available
                'TotalExpenditureQ1ToQ9' => null, // Replace with actual value if available
                'PreviousPeriodBudgetBalanceQ1ToQ8' => null, // Replace with actual value if available
                'CurrentPeriodBudgetBalanceQ1ToQ9' => 85926,
                'TotalBudgetBalanceQ1ToQ9' => 85926,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rcm_summary_ependiture_costinput');
    }
};
