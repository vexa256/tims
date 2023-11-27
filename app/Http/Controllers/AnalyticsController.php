<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{

    public function ProjectReport()
    {
        $BVA = DB::table('ProjectExpenditure AS E')
            ->join('projects AS P', 'E.ProjectPID', 'P.PID')
            ->select('P.TotalGrantInUsd',  'P.FundDisbursementAtPresentInUsd', 'P.ProjectName', 'E.*')
            ->get();

        $BYear = DB::table('ProjectExpenditureByFinancialYear AS E')
            ->join('projects AS P', 'E.ProjectPID', 'P.PID')
            ->select('P.TotalGrantInUsd', 'P.FundDisbursementAtPresentInUsd', 'P.ProjectName', 'E.*')
            ->get();


        $BQuarter = DB::table('ProjectExpenditureByQuarter AS E')
            ->join('projects AS P', 'E.ProjectPID', 'P.PID')
            ->select('*')
            ->orderBy('E.FinancialYear', 'desc')  // Add this line to order by FinancialQuarter in descending order
            ->get();


        $data = [
            'Title'              => 'Project Dashboard',
            'Desc'               => 'Project Analytics Dashboard',
            'Page'               => 'reports.ViewDashboard',
            'BVA'                  => $BVA,
            'BYear'                => $BYear,
            'BQuarter'             => $BQuarter,


        ];

        return view('scrn', $data);
    }


    public function ModuleReport()
    {
        $BVA = DB::table('ModuleExpenditure AS E')
            ->join('project_modules AS P', 'E.ModuleID', 'P.MID')
            ->select('*')
            ->get();

        $BYear = DB::table('ModuleExpenditureByYear AS E')
            ->join('project_modules AS P', 'E.ModuleID', 'P.MID')
            ->orderBy('E.FinancialYear', 'desc')
            ->select('*')
            ->get();

        $BQuarter = DB::table('ModuleExpenditureByQuarter AS E')
            ->join('project_modules AS P', 'E.ModuleID', 'P.MID')
            ->select('*')
            ->orderBy('E.FinancialYear', 'desc')  // Add this line to order by FinancialQuarter in descending order
            ->get();


        $data = [
            'Title'              => 'Project Module Dashboard',
            'Desc'               => 'Project Module Analytics Reports',
            'Page'               => 'reports.ModuleReport',
            'BVA'                  => $BVA,
            'BYear'                => $BYear,
            'BQuarter'             => $BQuarter,


        ];

        return view('scrn', $data);
    }


    public function InterventionsReport()
    {
        $BVA = DB::table('InterventionExpenditure AS E')
            ->join('project_interventions AS P', 'E.InterventionID', 'P.IID')
            ->select('*')
            ->get();

        $BYear = DB::table('InterventionExpenditureByFinacialYear AS E')
            ->join('project_interventions AS P', 'E.InterventionID', 'P.IID')
            ->orderBy('E.FinancialYear', 'desc')
            ->select('*')
            ->get();

        $BQuarter = DB::table('InterventionExpenditureByQuarter AS E')
            ->join('project_interventions AS P', 'E.InterventionID', 'P.IID')
            ->select('*')
            ->orderBy('E.FinancialYear', 'desc')  // Add this line to order by FinancialQuarter in descending order
            ->get();


        $data = [
            'Title'              => 'Project Module Dashboard',
            'Desc'               => 'Project Module Analytics Reports',
            'Page'               => 'reports.InterventionReport',
            'BVA'                  => $BVA,
            'BYear'                => $BYear,
            'BQuarter'             => $BQuarter,


        ];

        return view('scrn', $data);
    }

    public function CostInputReport()
    {
        $CostInput = DB::table('CostInputExpenditure')->get();




        $data = [
            'Title'              => 'Project Cost Input Expenditure Dashboard',
            'Desc'               => 'Cost input expenditure tracking',
            'Page'               => 'reports.CostInputs',
            'CostInput'                  => $CostInput,



        ];

        return view('scrn', $data);
    }

    public function ActivitiesReport()
    {
        $Completed = DB::table('project_activities AS A')
            ->join('project_modules AS M', 'A.MID', 'M.MID')
            ->join('project_interventions AS I', 'I.IID', 'A.IID')
            ->where('A.ProgressStatus', 'Completed')
            ->select('A.*', 'M.ProjectModuleName', 'I.InterventionName')
            ->get();

        $Pending = DB::table('project_activities AS A')
            ->join('project_modules AS M', 'A.MID', 'M.MID')
            ->join('project_interventions AS I', 'I.IID', 'A.IID')
            ->where('A.ProgressStatus', 'Pending')
            ->select('A.*', 'M.ProjectModuleName', 'I.InterventionName')
            ->get();


        $Ongoing = DB::table('project_activities AS A')
            ->join('project_modules AS M', 'A.MID', 'M.MID')
            ->join('project_interventions AS I', 'I.IID', 'A.IID')
            ->where('A.ProgressStatus', 'Ongoing')
            ->select('A.*', 'M.ProjectModuleName', 'I.InterventionName')
            ->get();

        $Terminated = DB::table('project_activities AS A')
            ->join('project_modules AS M', 'A.MID', 'M.MID')
            ->join('project_interventions AS I', 'I.IID', 'A.IID')
            ->where('A.ProgressStatus', 'Terminated')
            ->select('A.*', 'M.ProjectModuleName', 'I.InterventionName')
            ->get();




        $data = [
            'Title'              => 'Project Activity Progress Dashboard',
            'Desc'               => 'Activity Implementation Tracking',
            'Page'               => 'reports.ActivityReports',
            'Terminated'                  => $Terminated,
            'Pending'                  => $Pending,
            'Ongoing'                  => $Ongoing,
            'Completed'                  => $Completed,




        ];

        return view('scrn', $data);
    }
}
