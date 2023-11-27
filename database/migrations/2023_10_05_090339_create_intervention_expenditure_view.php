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
            CREATE OR REPLACE VIEW InterventionExpenditure AS
            SELECT 
                p.PID as ProjectPID,
                p.ProjectName,
                i.IID as InterventionID,
                i.InterventionName,
                SUM(e.AmountSpentInUsd) as TotalAmountSpentByIntervention
            FROM projects p
            JOIN project_interventions i ON p.PID = i.PID
            JOIN project_expenditures e ON i.IID = e.IID
            GROUP BY p.PID, i.IID, p.ProjectName, i.InterventionName
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('InterventionExpenditure');
    }
};
