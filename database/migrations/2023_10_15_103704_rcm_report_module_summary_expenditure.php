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
        Schema::create('rcm_report_module_summary', function (Blueprint $table) {
            $table->id();
            $table->string('Modules');
            $table->decimal('Total_Budget_Q1_to_Q9', 65, 30);
            $table->decimal('Total_Expenditure_Q1_to_Q9', 65, 30);
            $table->decimal('Total_Budget_Balance_Q1_to_Q9', 65, 30);
            $table->timestamps();
        });

        // Insert data
        \DB::table('rcm_report_module_summary')->insert([
            [
                'Modules' => 'Program management',
                'Total_Budget_Q1_to_Q9' => 1310.876,
                'Total_Expenditure_Q1_to_Q9' => 982.444,
                'Total_Budget_Balance_Q1_to_Q9' => 328.433,
            ],
            [
                'Modules' => 'RSSH: Removing Human Right & Gender Related Barrier',
                'Total_Budget_Q1_to_Q9' => 1102.193,
                'Total_Expenditure_Q1_to_Q9' => 685.089,
                'Total_Budget_Balance_Q1_to_Q9' => 417.104,
            ],
            [
                'Modules' => 'RSSH: Community systems strengthening',
                'Total_Budget_Q1_to_Q9' => 888.726,
                'Total_Expenditure_Q1_to_Q9' => 392.685,
                'Total_Budget_Balance_Q1_to_Q9' => 496.041,
            ],
            [
                'Modules' => 'RSSH: Health management information systems and M&E',
                'Total_Budget_Q1_to_Q9' => 1535.783,
                'Total_Expenditure_Q1_to_Q9' => 801.866,
                'Total_Budget_Balance_Q1_to_Q9' => 733.917,
            ],
            [
                'Modules' => 'RSSH: Health sector governance and planning',
                'Total_Budget_Q1_to_Q9' => 1411.912,
                'Total_Expenditure_Q1_to_Q9' => 1075.754,
                'Total_Budget_Balance_Q1_to_Q9' => 336.158,
            ],
            [
                'Modules' => 'TB care and prevention',
                'Total_Budget_Q1_to_Q9' => 1442.581,
                'Total_Expenditure_Q1_to_Q9' => 865.154,
                'Total_Budget_Balance_Q1_to_Q9' => 577.427,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rcm_report_module_summary');
    }
};
