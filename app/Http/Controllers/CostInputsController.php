<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\FormEngine;

class CostInputsController extends Controller
{
    public function MgtConstInputs()
    {
        $CostInputs = DB::table('project_cost_inputs')->get();

        $Form = new FormEngine;

        $rem = ['created_at', 'updated_at', 'id', 'CID', 'TotalAmountSpentOnCostInput'];

        $data = [
            'Title'              => 'Project Settings | Create and Manage Cost Inputs',
            'Desc'               => 'Cost Inputs Management',
            'Page'               => 'Costinputs.CostInputs',
            'CostInputs' => $CostInputs,
            'rem'                => $rem,
            'editor'             => 'editor',
            'Form'               => $Form->Form('project_cost_inputs'),

        ];

        return view('scrn', $data);
    }
}
