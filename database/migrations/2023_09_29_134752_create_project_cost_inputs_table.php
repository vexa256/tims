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
        Schema::create('project_cost_inputs', function (Blueprint $table) {
            $table->id();
            $table->string('CID');
            $table->string('CostInput');
            $table->decimal('TotalAmountSpentOnCostInput', 65, 30)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_cost_inputs');
    }
};
