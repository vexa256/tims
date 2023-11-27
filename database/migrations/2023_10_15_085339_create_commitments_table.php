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
        Schema::create('commitments', function (Blueprint $table) {
            $table->id();
            $table->string('Commitment');
            $table->decimal('amount', 65, 30);
            $table->timestamps();
        });

        DB::table('commitments')->insert([
            [
                'Commitment' => 'CLM Capacity Building- Namibia',
                'amount' => 65166.67,
            ],
            [
                'Commitment' => 'TB Declaration in the Mining -3 Countries',
                'amount' => 60000.00,
            ],
            [
                'Commitment' => 'Salaries & LoE for the Month of OCT 2023',
                'amount' => 26910.00,
            ],
            [
                'Commitment' => 'ICR OCT 2023',
                'amount' => 14411.24,
            ],
            [
                'Commitment' => 'Consultants',
                'amount' => 106148.06,
            ],
            [
                'Commitment' => 'MHS SOP In-Country Meetings-6 Countries',
                'amount' => 30000.00,
            ],
            [
                'Commitment' => 'KP Organization-Human Right',
                'amount' => 82000.00,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commitments');
    }
};
