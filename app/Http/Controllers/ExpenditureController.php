<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ExpenditureController extends Controller
{


    // public function __construct()
    // {
    //     $PID = 'bedfcc3e7f19f5c043d40de97f71bab0';

    //     // Predefined realistic project modules
    //     $projectModules = [
    //         'Exploratory Research' => 'Initial research on mining locations for Tuberculosis control',
    //         'Data Collection' => 'Collecting environmental and health data in mining areas',
    //         'Community Outreach' => 'Education and awareness campaigns for miners',
    //         'Equipment Procurement' => 'Procurement of safety gear and medical supplies',
    //         'Medical Facilities Upgrade' => 'Upgrading medical facilities in mining regions',
    //         'Training Programs' => 'Training medical staff and safety officers',
    //         'Monitoring and Evaluation' => 'Ongoing monitoring and effectiveness evaluation',
    //         'Regulatory Compliance' => 'Ensuring all mining activities are in compliance with health standards',
    //         'Technical Support' => 'Providing technical support to medical and safety teams',
    //         'Final Reporting' => 'Compilation and dissemination of the project’s achievements and challenges'
    //     ];

    //     foreach ($projectModules as $ProjectModuleName => $OutPuts) {
    //         // Generate a unique MID for each record
    //         $MID = Str::uuid()->toString();

    //         DB::table('project_modules')->insert([
    //             'MID' => $MID,
    //             'PID' => $PID,
    //             'ProjectModuleName' => $ProjectModuleName,
    //             'OutPuts' => $OutPuts,
    //             // Leaving other fields as NULL or default
    //         ]);
    //     }
    // }


    public function MgtExpenditure(Request $request)
    {
        $PID = $request->input('PID') ?? null;
        $MID = $request->input('MID') ?? null;

        if (!$MID) {
            return view('scrn', [
                'Title' => 'Project Module Selection | Project expenditure Settings',
                'Desc' => 'Select module to attach activity to',
                'Page' => 'expenditure.SelectProjectAndModule',
                'Projects' => DB::table('projects')->get(),
                'Modules' => DB::table('project_modules')->get(),
            ]);
        }

        if (!$PID) {
            return view('scrn', [
                'Title' => 'Project Selection | Project expenditure Settings',
                'Desc' => 'Select project to attach module activities to',
                'Page' => 'expenditure.SelectProjectAndModule',
                'Projects' => DB::table('projects')->get(),
                'Modules' => DB::table('project_modules')->get(),
            ]);
        }

        $project = DB::table('projects')->where('PID', $PID)->first();
        $modules = DB::table('project_modules')->where('MID', $MID)->first();

        if (is_null($project) || is_null($modules)) {
            return redirect()->back()->with('error_a', "The search returned empty results, please try again");
        }

        $Expenditure = DB::table('project_activities as pa')
            ->join('projects as p', 'pa.PID', '=', 'p.PID')
            ->join('project_modules as m', function ($join) {
                $join->whereColumn([
                    ['pa.PID', 'm.PID'],
                    ['pa.MID', 'm.MID']
                ]);
            })
            ->join('project_interventions as i', function ($join) {
                $join->whereColumn([
                    ['pa.PID', 'i.PID'],
                    ['pa.MID', 'i.MID'],
                    ['pa.IID', 'i.IID']
                ]);
            })
            ->join('project_expenditures as pe', function ($join) {
                $join->whereColumn([
                    ['pa.PID', 'pe.PID'],
                    ['pa.MID', 'pe.MID'],
                    ['pa.IID', 'pe.IID']
                ]);
            })->join('project_cost_inputs as ci', function ($join) {
                $join->whereColumn([
                    ['pe.CID', 'ci.CID']

                ]);
            })
            ->select('pa.ActivityName', 'pa.AID', 'ci.CostInput', 'pe.id as pe_id', 'pe.ProgressStatus', 'pe.*', 'p.ProjectName', 'm.ProjectModuleName', 'i.InterventionName')
            ->where('p.PID', $PID)
            ->where('m.MID', $MID)
            ->get();

        $rem = ['created_at', 'updated_at', 'AID', 'CID', 'EID', 'CostInput', 'BudgetLine', 'Comments', 'FinancialQuarter', 'FinancialYear', 'id', 'PID', 'IID', 'MID', 'BudgetAmountSpentAtPresent', 'ProgressStatus', 'BudgetAmountAvailable', ''];


        // dd(DB::table('project_cost_inputs')->get());


        $data = [
            'Title' => "{$modules->ProjectModuleName} | Manage activities attached to the selected module",
            'Desc' => 'Activity data settings',
            'Page' => 'expenditure.MgtExpenditure',
            'Expenditure' => $Expenditure,
            'Interventions' => DB::table('project_interventions')->where('MID', $MID)->get(),
            'Activities' => DB::table('project_activities')->where('MID', $MID)->get(),
            'CostGroups' => DB::table('project_cost_inputs')->get(),
            // 'Activities' => DB::table('project_activities')->where('MID', $MID)->get(),
            'rem' => $rem,
            'editor' => '$rem',
            'PID' => $PID,
            'MID' => $MID,
            'ModuleName' => $modules->ProjectModuleName,
            'ProjectName' => $project->ProjectName,
            'Form' => (new FormEngine)->Form('project_expenditures'),
        ];

        return view('scrn', $data);
    }
}
