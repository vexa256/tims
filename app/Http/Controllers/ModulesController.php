<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    public function ManageProjectModules(Request $request)
    {

        $PID = $request->input('PID') ?? null;

        // If PID is not provided, then select a project
        if (!$PID) {
            return view('scrn', [
                'Title' => 'Project Selection | Project Module Settings',
                'Desc' => 'Select project to attach module to',
                'Page' => 'modules.SelectProject',
                'Projects' => DB::table('projects')->get(),
            ]);
        }

        // If PID is provided, manage modules for that project
        $project = DB::table('projects')->where('PID', $PID)->first();
        $rem = ['created_at', 'updated_at', 'id', 'PID', 'MID', 'BudgetAmountSpentAtPresent', 'BudgetAmountAvailable', ''];

        $data = [
            'Title' => "{$project->ProjectName}| Manage modules",
            'Desc' => 'Project module management and data settings',
            'Page' => 'modules.MgtModules',
            'Modules' => DB::table('project_modules')->where('PID', $PID)->get(),
            'rem' => $rem,
            'editor' => '$rem',
            'PID' => $PID,
            'ProjectName' => $project->ProjectName,
            'Form' => (new FormEngine)->Form('project_modules'),
        ];

        return view('scrn', $data);
    }
}
