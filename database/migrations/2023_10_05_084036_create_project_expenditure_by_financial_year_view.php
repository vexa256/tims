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
        \DB::statement("
            CREATE OR REPLACE VIEW ProjectExpenditureByFinancialYear AS
            SELECT 
                p.PID as ProjectPID,
                p.ProjectName,
                e.FinancialYear,
                SUM(e.AmountSpentInUsd) as TotalAmountSpentByFinancialYear
            FROM projects p
            JOIN project_expenditures e ON p.PID = e.PID
            GROUP BY p.PID, e.FinancialYear, p.ProjectName
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ProjectExpenditureByFinancialYear');
    }
};
