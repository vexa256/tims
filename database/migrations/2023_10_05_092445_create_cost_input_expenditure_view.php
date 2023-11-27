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
        //     \DB::statement("
        //     CREATE OR REPLACE VIEW CostInputExpenditure AS
        //     SELECT 
        //         p.PID as ProjectPID,
        //         p.ProjectName,
        //         c.id as CostInputID,
        //         c.CostInputName,
        //         SUM(e.AmountSpentInUsd) as TotalAmountSpent
        //     FROM projects p
        //     JOIN project_expenditures e ON p.PID = e.PID
        //     JOIN project_cost_inputs c ON e.CostInputID = c.id
        //     GROUP BY p.PID, c.id, p.ProjectName, c.CostInputName
        // ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CostInputExpenditure');
    }
};
