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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('PID');
            $table->string('ProjectName');
            $table->string('ProjectDescription');
            $table->string('ApplicantOrCountry');
            $table->string('PrincipalRecipient');
            $table->string('GrantNumber');
            $table->string('GrantName');
            $table->decimal('TotalBudgetInUsd', 65, 30)->nullable();
            $table->decimal('TotalGrantInUsd', 65, 30)->nullable();
            $table->decimal('FundDisbursementAtPresentInUsd', 65, 30)->nullable();
            $table->decimal('ProjectExpenditureAtPresentInUsd', 65, 30)->nullable();
            $table->decimal('AvailableFundInUsd', 65, 30)->nullable();
            $table->longText('ProjectDetails')->nullable();
            $table->decimal('VarianceInUsdAtPresent', 65, 30)->nullable();
            $table->decimal('FundsAvailableAtPresentInUsd', 65, 30)->nullable();
            $table->date('ImplementationStartDate');
            $table->date('ImplementationEndDate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
