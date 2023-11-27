<?php

namespace App\Http\Controllers;

use DB;
use App\Charts\SystemCharts;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\FormEngine;



class RcmController extends Controller
{

    public function SelectCostInput()
    {

        $Modules  = DB::table('rcm_summary_ependiture_costinput')->get();

        $data = [
            'Title'      => 'Select Project Cost input to Attach  Analysis to',
            'Desc'       => ' Project Cost input Analysis ',
            'Page'       => 'rcm.ModExpSelectMod',
            'Modules'     => $Modules,

        ];

        return view('scrn', $data);
    }


    public function CostInputsDashboard()
    {
        $CostInputs = DB::table('rcm_summary_ependiture_costinput')->get();
        $Form = new FormEngine;
        $rem = ['created_at', 'updated_at', 'id', 'CID', 'TotalAmountSpentOnCostInput'];

        $results = DB::table('rcm_summary_ependiture_costinput')
            ->select('Description as CostInput', DB::raw('SUM(TotalExpenditureQ1ToQ9) as TotalSpent'))
            ->groupBy('Description')
            ->get();


        $data = [
            'Title'      => 'Cost Input Analytics',
            'Desc'       => 'Expenditure by Cost Inputs',
            'Page'       => 'rcm.CostInputs',
            'CostInputs' => $results,
            'rem'        => $rem,
            'editor'     => 'editor',
            'Form'       => $Form->Form('rcm_summary_ependiture_costinput'),
            'ChartResults'     => $results,
        ];

        return view('scrn', $data);
    }


    public function ModuleAnalytics()
    {

        $Module = DB::table('rcm_summary_expenditure_by_module')->select('Description as ModuleName', 'Q1_Q8_Absorption_Capacity', 'Q9_Absorption_Capacity', 'Q1_Q9_Absorption_Capacity')->get();

        $data = [
            'Title'      => 'Module Reporting',
            'Desc'       => 'Project Module Insights',
            'Page'       => 'rcm.Modules',
            // 'CostInputs' => $results,
            // 'rem'        => $rem,
            'editor'     => 'editor',
            'ModuleChart'     => $Module,
        ];

        return view('scrn', $data);
    }



    public function SelectModuleExp()
    {


        $Modules  = DB::table('summary_module_expenditure')->get();

        $data = [
            'Title'      => 'Select Module to Attach Expenditure Analysis to',
            'Desc'       => 'Module Expenditure Analysis | Module Selection',
            'Page'       => 'rcm.ModExpSelectMod',
            'Modules'     => $Modules,

        ];

        return view('scrn', $data);
    }

    public function ModuleExpenditure(Request $request)
    {
        $results = DB::table('summary_module_expenditure')
            ->where('Modules', $request->Modules)
            ->select('Modules', 'Total_Budget_Q1_to_Q9', 'Total_Expenditure_Q1_to_Q9', 'Total_Budget_Balance_Q1_to_Q9')
            ->groupBy('Modules', 'Total_Budget_Q1_to_Q9', 'Total_Expenditure_Q1_to_Q9', 'Total_Budget_Balance_Q1_to_Q9')
            ->get();

        $data = [
            'Title'      => 'Module Expenditure Analysis',
            'Desc'       => 'Module Expenditure Report',
            'Page'       => 'rcm.ModuleExpenditure',

            'editor'     => 'editor',
            'ModuleExpenditures'     => $results,
        ];

        return view('scrn', $data);
    }



    public function ProjectSummary()
    {
        $results = DB::table('project_summary_exact')
            ->select(
                'TotalGrant',
                'TotalBudget_Q1_Q9',
                'FundDisbursement_Q1_Q9',
                'InterestFromBank_ExchangeRateGain_Q1_Q9',
                'TotalFund_Q1_Q9',
                'Expenditure_Q1_Q9',
                'BalanceOfFunds'
            )
            ->get();

        $data = [
            'Title'      => 'Project Summary Analytics',
            'Desc'       => 'Project Summary Report',
            'Page'       => 'rcm.ProjectSummary',

            'editor'     => 'editor',
            'ProjectSummary'     => $results,
        ];

        return view('scrn', $data);
    }



    public function ActivityAnalysisSelectMod()
    {

        $Modules  = DB::table('BudgetData')->get()->unique('ModuleName');

        $data = [
            'Title'      => 'Select Module to Attach Activity Analysis to',
            'Desc'       => 'Module Activity Analysis | Module Selection',
            'Page'       => 'rcm.ModSelectActAnalysis',
            'Modules'     => $Modules,

        ];

        return view('scrn', $data);
    }

    public function ActivityAnalysis(Request $request)
    {
        $results  = DB::table('BudgetData')->where('ModuleName', $request->ModuleName)
            ->select([
                'ModuleName as Module',
                'BudgetLineNo as LineNo',
                'ActivityDescription as Activity',
                'Q1_4Budget as Q1_4_Budget',
                'Q5_Q8Budget as Q5_8_Budget',
                'TotalAvailableBudget_Q1_Q8 as Total_Budget_Q1_8',
                'ActualExpenditure_Q1_Q8 as Actual_Exp_Q1_8',
                'Q9Budget as Q9_Budget',
                'ActualExpenditure_Q9 as Actual_Exp_Q9',
                'BudgetVsActualVariances as Variances_Q1_8',
                'BudgetVsActualVariances_Q9 as Variances_Q9',
                'AbsorptionCapacity_Q1_Q8 as Absorb_Q1_8',
                'AbsorptionCapacity_Q9 as Absorb_Q9'
            ])
            ->get();



        $data = [
            'Title'       => 'Project Activity Expenditure Analytics',
            'Desc'        => 'Detailed Activity and Budget Line Report',
            'Page'        => 'rcm.ActivityAnalysis',
            'SModuleName'  => $request->ModuleName,

            'editor'     => 'editor',
            'ProjectSummary'     => $results,
        ];

        return view('scrn', $data);
    }


    public function BlAnalysis()
    {
        $results  = DB::table('BudgetData')
            ->select([
                'ModuleName as Module',
                'BudgetLineNo as LineNo',
                'ActivityDescription as Activity',
                'Q1_4Budget as Q1_4_Budget',
                'Q5_Q8Budget as Q5_8_Budget',
                'TotalAvailableBudget_Q1_Q8 as Total_Budget_Q1_8',
                'ActualExpenditure_Q1_Q8 as Actual_Exp_Q1_8',
                'Q9Budget as Q9_Budget',
                'ActualExpenditure_Q9 as Actual_Exp_Q9',
                'BudgetVsActualVariances as Variances_Q1_8',
                'BudgetVsActualVariances_Q9 as Variances_Q9',
                'AbsorptionCapacity_Q1_Q8 as Absorb_Q1_8',
                'AbsorptionCapacity_Q9 as Absorb_Q9'
            ])
            ->get();



        $data = [
            'Title'      => 'Project BudgetLine Expenditure Analytics',
            'Desc'       => 'Detailed  Budget Line Report',
            'Page'       => 'rcm.Bl',

            'editor'     => 'editor',
            'ProjectSummary'     => $results,
        ];

        return view('scrn', $data);
    }

    public function Reconciliation()
    {

        $results  = DB::table('ProjectProgress')->get();
        $data = [
            'Title'      => 'Fund/Cash Reconciliation',
            'Desc'       => 'Reconciliation Report',
            'Page'       => 'rcm.Rec',

        ];

        return view('scrn', $data);
    }


    public function SelectModuleWp()
    {
        $Modules  = DB::table('ProjectProgress')->get()->unique('ModuleName');

        $data = [
            'Title'      => 'Select Module to Attach Work Plan Analysis to',
            'Desc'       => 'Work Plan Analysis | Module Selection',
            'Page'       => 'rcm.SelectModuleWp',
            'Modules'     => $Modules,

        ];

        return view('scrn', $data);
    }



    public function WpTracking(Request $request)
    {



        $moduleName = $request->input('ModuleName');




        $results  = DB::table('ProjectProgress')
            ->where('ModuleName', $moduleName)
            ->get();

        // dd($results);



        // dd($results);

        $data = [
            'Title'      => 'Work Plan Tracking',
            'Desc'       => 'Work plans report',
            'Page'       => 'rcm.wp',

            // 'editor'     => 'editor',
            'ProjectSummary'     => $results,
        ];

        return view('scrn', $data);
    }
}
