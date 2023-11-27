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
        CREATE OR REPLACE VIEW ProjectExpenditure AS
        SELECT 
            p.id as ProjectId, 
            p.PID as ProjectPID,
            p.ProjectName,
            SUM(e.AmountSpentInUsd) as TotalAmountSpent
        FROM projects p
        JOIN project_expenditures e ON p.PID = e.PID
        GROUP BY p.id, p.PID, p.ProjectName
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ProjectExpenditure');
    }
};
