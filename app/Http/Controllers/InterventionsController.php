<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\FormEngine;

class InterventionsController extends Controller
{
    //
    public function MgtInterventions(Request $request)
    {

        $PID = $request->input('PID') ?? null;
        $MID = $request->input('MID') ?? null;

        // If PID is not provided, then select a project

        if (!$MID) {
            return view('scrn', [
                'Title' => 'Project Module Selection | Project intervention Settings',
                'Desc' => 'Select module to attach intervention to',
                'Page' => 'interventions.SelectProjectAndModule',
                'Projects' => DB::table('projects')->get(),
                'Modules' => DB::table('project_modules')->get(),
            ]);
        }
        if (!$PID) {
            return view('scrn', [
                'Title' => 'Project Selection | Project intervention Settings',
                'Desc' => 'Select project to attach module to',
                'Page' => 'interventions.SelectProjectAndModule',
                'Projects' => DB::table('projects')->get(),
                'Modules' => DB::table('project_modules')->get(),
            ]);
        }

        // If PID is provided, manage modules for that project
        $project = DB::table('projects')->where('PID', $PID)->first();
        $modules = DB::table('project_modules')->where('MID', $MID)->first();


        $project = DB::table('projects')->where('PID', $PID)->first();
        $modules = DB::table('project_modules')->where('MID', $MID)->first();

        if (is_null($project) || is_null($modules)) {
            return redirect()->back()->with('error_a', "The search returned empty results, please try again");
        }
        $rem = ['created_at', 'updated_at', 'id', 'PID', 'IID', 'MID', 'BudgetAmountSpentAtPresent', 'BudgetAmountAvailable', ''];

        $data = [
            'Title' => "{$modules->ProjectModuleName} | Manage Interventions attached to the selected module",
            'Desc' => 'Intervention data settings',
            'Page' => 'interventions.MgtInterventions',
            'Interventions' => DB::table('project_interventions')->where('MID', $MID)->get(),
            'rem' => $rem,

            'editor' => '$rem',
            'PID' => $PID,
            'MID' => $MID,
            'ProjectName' => $project->ProjectName,
            'Form' => (new FormEngine)->Form('project_interventions'),
        ];

        return view('scrn', $data);
    }
}
