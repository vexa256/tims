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
            CREATE OR REPLACE VIEW ProjectExpenditureByQuarter AS
            SELECT
                p.PID as ProjectPID,
                p.ProjectName,
                e.FinancialQuarter,
                e.FinancialYear,
                SUM(e.AmountSpentInUsd) as TotalAmountSpentByQuarter
            FROM projects p
            JOIN project_expenditures e ON p.PID = e.PID
            GROUP BY p.PID, e.FinancialQuarter, p.ProjectName,  e.FinancialYear
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ProjectExpenditureByQuarter');
    }
};
