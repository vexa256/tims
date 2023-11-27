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
        Schema::create('rcm_budget_tims', function (Blueprint $table) {
            $table->id();
            // $table->id();
            $table->decimal('Year1TotalBudget', 65, 30);
            $table->decimal('Year2TotalBudget', 65, 30);
            $table->decimal('Q9Budget', 65, 30);
            $table->decimal('Q10Budget', 65, 30);
            $table->decimal('Q11Budget', 65, 30);
            $table->decimal('Q12Budget', 65, 30);
            $table->decimal('Year3TotalBudget', 65, 30);
            $table->decimal('Y1Y3TotalBudget', 65, 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rcm_budget_tims');
    }
};
