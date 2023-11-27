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
        Schema::create('rcm_summary_expenditure_by_module', function (Blueprint $table) {
            $table->id();
            $table->string('Description');
            $table->decimal('Previous_Period_Budget_Q1_To_Q8', 65, 30);
            $table->decimal('Q9_Planned_Budget', 65, 30);
            $table->decimal('Total_Budget_Q1_to_Q9', 65, 30);
            $table->decimal('Previous_Period_Expenditure_Q1_To_Q9', 65, 30);
            $table->decimal('Current_Period_Expenditure_Q9', 65, 30);
            $table->decimal('Total_Expenditure_Q1_to_Q9', 65, 30);
            $table->decimal('Previous_Period_Budget_Balance_Q1_To_Q8', 65, 30);
            $table->decimal('Current_Period_Budget_Balance_Q9', 65, 30);
            $table->decimal('Total_Budget_Balance_Q1_to_Q9', 65, 30);
            $table->decimal('Q1_Q8_Absorption_Capacity', 65, 30);
            $table->decimal('Q9_Absorption_Capacity', 65, 30);
            $table->decimal('Q1_Q9_Absorption_Capacity', 65, 30);
            $table->text('Explanation_of_Variances');

            $table->timestamps();
        });

        $data = [
            [
                'Description' => 'Program management',
                'Previous_Period_Budget_Q1_To_Q8' => 1034.354,
                'Q9_Planned_Budget' => 276.522,
                'Total_Budget_Q1_to_Q9' => 1310.876,
                'Previous_Period_Expenditure_Q1_To_Q9' => 846.228,
                'Current_Period_Expenditure_Q9' => 136.215,
                'Total_Expenditure_Q1_to_Q9' => 982.444,
                'Previous_Period_Budget_Balance_Q1_To_Q8' => 188.126,
                'Current_Period_Budget_Balance_Q9' => 140.307,
                'Total_Budget_Balance_Q1_to_Q9' => 328.433,
                'Q1_Q8_Absorption_Capacity' => 82.0,
                'Q9_Absorption_Capacity' => 49.0,
                'Q1_Q9_Absorption_Capacity' => 75.0,
                'Explanation_of_Variances' => 'Refer to the detailed Expenditure by module',
            ],
            [
                'Description' => 'RSSH: Removing Human Right & Gender Related Barrier',
                'Previous_Period_Budget_Q1_To_Q8' => 907.477,
                'Q9_Planned_Budget' => 194.716,
                'Total_Budget_Q1_to_Q9' => 1102.193,
                'Previous_Period_Expenditure_Q1_To_Q9' => 626.809,
                'Current_Period_Expenditure_Q9' => 58.280,
                'Total_Expenditure_Q1_to_Q9' => 685.089,
                'Previous_Period_Budget_Balance_Q1_To_Q8' => 280.668,
                'Current_Period_Budget_Balance_Q9' => 136.436,
                'Total_Budget_Balance_Q1_to_Q9' => 417.104,
                'Q1_Q8_Absorption_Capacity' => 69.0,
                'Q9_Absorption_Capacity' => 30.0,
                'Q1_Q9_Absorption_Capacity' => 62.0,
                'Explanation_of_Variances' => 'Refer to the detailed Expenditure by module',
            ],
            [
                'Description' => 'RSSH: Community systems strengthening',
                'Previous_Period_Budget_Q1_To_Q8' => 494.122,
                'Q9_Planned_Budget' => 394.604,
                'Total_Budget_Q1_to_Q9' => 888.726,
                'Previous_Period_Expenditure_Q1_To_Q9' => 372.903,
                'Current_Period_Expenditure_Q9' => 19.782,
                'Total_Expenditure_Q1_to_Q9' => 392.685,
                'Previous_Period_Budget_Balance_Q1_To_Q8' => 121.219,
                'Current_Period_Budget_Balance_Q9' => 374.822,
                'Total_Budget_Balance_Q1_to_Q9' => 496.041,
                'Q1_Q8_Absorption_Capacity' => 75.0,
                'Q9_Absorption_Capacity' => 5.0,
                'Q1_Q9_Absorption_Capacity' => 44.0,
                'Explanation_of_Variances' => 'Refer to the detailed Expenditure by module',
            ],
            [
                'Description' => 'RSSH: Health management information systems and M&E',
                'Previous_Period_Budget_Q1_To_Q8' => 1303.891,
                'Q9_Planned_Budget' => 231.892,
                'Total_Budget_Q1_to_Q9' => 1535.783,
                'Previous_Period_Expenditure_Q1_To_Q9' => 619.014,
                'Current_Period_Expenditure_Q9' => 182.852,
                'Total_Expenditure_Q1_to_Q9' => 801.866,
                'Previous_Period_Budget_Balance_Q1_To_Q8' => 684.876,
                'Current_Period_Budget_Balance_Q9' => 49.040,
                'Total_Budget_Balance_Q1_to_Q9' => 733.917,
                'Q1_Q8_Absorption_Capacity' => 47.0,
                'Q9_Absorption_Capacity' => 79.0,
                'Q1_Q9_Absorption_Capacity' => 52.0,
                'Explanation_of_Variances' => 'Refer to the detailed Expenditure by module',
            ],
            [
                'Description' => 'RSSH: Health sector governance and planning',
                'Previous_Period_Budget_Q1_To_Q8' => 1247.611,
                'Q9_Planned_Budget' => 164.302,
                'Total_Budget_Q1_to_Q9' => 1411.912,
                'Previous_Period_Expenditure_Q1_To_Q9' => 765.510,
                'Current_Period_Expenditure_Q9' => 310.244,
                'Total_Expenditure_Q1_to_Q9' => 1075.754,
                'Previous_Period_Budget_Balance_Q1_To_Q8' => 482.101,
                'Current_Period_Budget_Balance_Q9' => -145.943,
                'Total_Budget_Balance_Q1_to_Q9' => 336.158,
                'Q1_Q8_Absorption_Capacity' => 61.0,
                'Q9_Absorption_Capacity' => 189.0,
                'Q1_Q9_Absorption_Capacity' => 76.0,
                'Explanation_of_Variances' => 'Refer to the detailed Expenditure by module',
            ],
            [
                'Description' => 'TB care and prevention',
                'Previous_Period_Budget_Q1_To_Q8' => 1115.024,
                'Q9_Planned_Budget' => 327.556,
                'Total_Budget_Q1_to_Q9' => 1442.581,
                'Previous_Period_Expenditure_Q1_To_Q9' => 510.387,
                'Current_Period_Expenditure_Q9' => 354.766,
                'Total_Expenditure_Q1_to_Q9' => 865.154,
                'Previous_Period_Budget_Balance_Q1_To_Q8' => 604.637,
                'Current_Period_Budget_Balance_Q9' => -27.210,
                'Total_Budget_Balance_Q1_to_Q9' => 577.427,
                'Q1_Q8_Absorption_Capacity' => 46.0,
                'Q9_Absorption_Capacity' => 108.0,
                'Q1_Q9_Absorption_Capacity' => 60.0,
                'Explanation_of_Variances' => 'Refer to the detailed Expenditure by module',
            ],
        ];

        foreach ($data as $item) {
            \DB::table('rcm_summary_expenditure_by_module')->insert($item);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rcm_summary_expenditure_by_module');
    }
};
