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
        Schema::create('project_activities', function (Blueprint $table) {
            $table->id();
            $table->string('ActivityName')->nullable();
            // $table->string('ActivityDescription')->nullable();
            $table->text('OutPuts')->nullable();
            // $table->string('AID');
            $table->string('PID');
            $table->string('IID');
            $table->string('MID');
            $table->string('AID');
            $table->string('FinancialQuater');
            $table->decimal('FinancialYear', 65, 30);
            $table->string('BudgetLine')->nullable();
            $table->date('StartDate')->nullable();
            $table->date('EndDate')->nullable();
            $table->string('ProgressStatus')->default('pending');
            $table->string('Comments')->default('NA');
            $table->decimal('ActivityBudgetInUsd', 65, 30)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_activities');
    }
};
