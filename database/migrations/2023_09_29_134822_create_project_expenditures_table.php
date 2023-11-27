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
        Schema::create('project_expenditures', function (Blueprint $table) {
            $table->id();
            $table->string('ProgressStatus')->default('pending');
            $table->string('Narrative')->default('NA');
            $table->string('OutPuts')->nullable();
            $table->date('StartDate');
            $table->date('EndStart');
            $table->string('EID');
            $table->string('AID');
            $table->string('PID');
            $table->string('IID');
            $table->string('MID');
            $table->string('CID');
            // $table->string('AID');
            $table->string('FinancialQuarter');
            $table->decimal('FinancialYear', 65, 30);
            $table->string('BudgetLine')->nullable();
            // $table->string('ProgressStatus')->default('pending');
            // $table->string('Narrative')->default('NA');
            $table->decimal('AmountSpentInUsd', 65, 30)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_expenditures');
    }
};
