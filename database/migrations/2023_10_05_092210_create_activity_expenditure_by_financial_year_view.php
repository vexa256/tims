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
        CREATE OR REPLACE VIEW ActivityExpenditureByFinancialYear AS
        SELECT
            p.PID as ProjectPID,
            p.ProjectName,
            a.id as ActivityID,
            a.ActivityName,
            e.FinancialYear,
            SUM(e.AmountSpentInUsd) as TotalAmountSpentByYear
        FROM projects p
        JOIN project_activities a ON p.PID = a.PID
        JOIN project_expenditures e ON a.AID = e.AID
        GROUP BY p.PID, a.id, p.ProjectName, a.ActivityName, e.FinancialYear
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ActivityExpenditureByFinancialYear');
    }
};
