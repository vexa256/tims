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
            CREATE OR REPLACE VIEW ModuleExpenditureByQuarter AS
            SELECT
                p.PID as ProjectPID,
                p.ProjectName,
                m.MID as ModuleID,
                m.ProjectModuleName,
                e.FinancialQuarter,
                e.FinancialYear,
                SUM(e.AmountSpentInUsd) as TotalAmountSpentByModuleByQuarter
            FROM projects p
            JOIN project_modules m ON p.PID = m.PID
            JOIN project_expenditures e ON m.MID = e.MID
            GROUP BY p.PID, m.MID, p.ProjectName, m.ProjectModuleName, e.FinancialQuarter, e.FinancialYear
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ModuleExpenditureByQuarter');
    }
};
