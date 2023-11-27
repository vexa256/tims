<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\FormEngine;

class ActivitiesController extends Controller
{
    public function MgtActivities(Request $request)
    {

        $PID = $request->input('PID') ?? null;
        $MID = $request->input('MID') ?? null;

        // If PID is not provided, then select a project

        if (!$MID) {
            return view('scrn', [
                'Title' => 'Project Module Selection | Project activity Settings',
                'Desc' => 'Select module to attach activity to',
                'Page' => 'activities.SelectProjectAndModule',
                'Projects' => DB::table('projects')->get(),
                'Modules' => DB::table('project_modules')->get(),
            ]);
        }
        if (!$PID) {
            return view('scrn', [
                'Title' => 'Project Selection | Project activity Settings',
                'Desc' => 'Select project to attach module activities to',
                'Page' => 'activities.SelectProjectAndModule',
                'Projects' => DB::table('projects')->get(),
                'Modules' => DB::table('project_modules')->get(),
            ]);
        }

        // If PID is provided, manage modules for that project
        $project = DB::table('projects')->where('PID', $PID)->first();
        $modules = DB::table('project_modules')->where('MID', $MID)->first();


        // $project = DB::table('projects')->where('PID', $PID)->first();
        // $modules = DB::table('project_modules')->where('MID', $MID)->first();

        if (is_null($project) || is_null($modules)) {
            return redirect()->back()->with('error_a', "The search returned empty results, please try again");
        }
        $rem = ['created_at', 'updated_at', 'AID', 'Comments', 'FinancialQuater', 'FinancialYear', 'id', 'PID', 'IID', 'MID', 'BudgetAmountSpentAtPresent', 'ProgressStatus', 'BudgetAmountAvailable', ''];


        $Activities = DB::table('project_activities as pa')
            ->join('projects as p', 'pa.PID', '=', 'p.PID')
            ->where('p.PID', $PID)
            ->join('project_modules as m', function ($join) {
                $join->whereColumn([
                    ['pa.PID', 'm.PID'],
                    ['pa.MID', 'm.MID']
                ]);
            })
            ->where('m.MID', $MID)
            ->join('project_interventions as i', function ($join) {
                $join->whereColumn([
                    ['pa.PID', 'i.PID'],
                    ['pa.MID', 'i.MID'],
                    ['pa.IID', 'i.IID']
                ]);
            })
            ->select('pa.*', 'p.ProjectName', 'p.ProjectDescription', 'm.ProjectModuleName', 'i.InterventionName')
            ->get();



        $data = [
            'Title' => "{$modules->ProjectModuleName} | Manage activities attached to the selected module",
            'Desc' => 'Activity data settings',
            'Page' => 'activities.MgtActivities',
            'Activities' => $Activities,
            'Interventions' => DB::table('project_interventions')->where('MID', $MID)->get(),
            'rem' => $rem,

            'editor' => '$rem',
            'PID' => $PID,
            'MID' => $MID,
            'ProjectName' => $project->ProjectName,
            'Form' => (new FormEngine)->Form('project_activities'),
        ];

        return view('scrn', $data);
    }



    public function MgtActivityStatus(Request $request)
    {

        $PID = $request->input('PID') ?? null;
        $MID = $request->input('MID') ?? null;

        // If PID is not provided, then select a project

        if (!$MID) {
            return view('scrn', [
                'Title' => 'Project Module Selection | Project activity Progress',
                'Desc' => 'Select module whose activities are to be tracked',
                'Page' => 'activities.SelectModule',
                'Projects' => DB::table('projects')->get(),
                'Modules' => DB::table('project_modules')->get(),
            ]);
        }
        if (!$PID) {
            return view('scrn', [
                'Title' => 'Project Selection | Project activity Progress',
                'Desc' => 'Select project whose activities are to be tracked',
                'Page' => 'activities.SelectModule',
                'Projects' => DB::table('projects')->get(),
                'Modules' => DB::table('project_modules')->get(),
            ]);
        }

        // If PID is provided, manage modules for that project
        $project = DB::table('projects')->where('PID', $PID)->first();
        $modules = DB::table('project_modules')->where('MID', $MID)->first();


        // $project = DB::table('projects')->where('PID', $PID)->first();
        // $modules = DB::table('project_modules')->where('MID', $MID)->first();

        if (is_null($project) || is_null($modules)) {
            return redirect()->back()->with('error_a', "The search returned empty results, please try again");
        }
        $rem = ['created_at', 'updated_at', 'AID', 'Comments', 'FinancialQuater', 'FinancialYear', 'id', 'PID', 'IID', 'MID', 'BudgetAmountSpentAtPresent', 'ProgressStatus', 'BudgetAmountAvailable', ''];


        $Activities = DB::table('project_activities as pa')
            ->join('projects as p', 'pa.PID', '=', 'p.PID')
            ->where('p.PID', $PID)
            ->join('project_modules as m', function ($join) {
                $join->whereColumn([
                    ['pa.PID', 'm.PID'],
                    ['pa.MID', 'm.MID']
                ]);
            })
            ->where('m.MID', $MID)
            ->join('project_interventions as i', function ($join) {
                $join->whereColumn([
                    ['pa.PID', 'i.PID'],
                    ['pa.MID', 'i.MID'],
                    ['pa.IID', 'i.IID']
                ]);
            })
            ->select('pa.*', 'p.ProjectName', 'p.ProjectDescription', 'm.ProjectModuleName', 'i.InterventionName')
            ->get();



        $data = [
            'Title' => "{$modules->ProjectModuleName} | Manage activity progress",
            'Desc' => 'Activity Progress Tracking',
            'Page' => 'activities.MgtStatus',
            'Activities' => $Activities,
            'Interventions' => DB::table('project_interventions')->where('MID', $MID)->get(),
            'rem' => $rem,

            'editor' => '$rem',
            'PID' => $PID,
            'MID' => $MID,
            'ProjectName' => $project->ProjectName,
            'Form' => (new FormEngine)->Form('project_activities'),
        ];

        return view('scrn', $data);
    }
}
