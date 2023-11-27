<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\FormEngine;

class ProjectsController extends Controller
{

    public function MgtProjects()
    {

        $Form = new FormEngine;
        $rem  = ['created_at', 'updated_at', 'id', 'VarianceInUsdAtPresent', 'FundsAvailableAtPresentInUsd', 'AvailableFundInUsd', 'TotalBudgetInUsd', 'ProjectExpenditureAtPresentInUsd', 'PID'];

        $Projects = DB::table('projects')->get();

        $data = [
            'Title'    => 'ECSA-HC Project Management System',
            'Desc'     => 'Virtual Office Dashboard',
            'Page'     => 'projects.MgtProjects',
            'Projects' => $Projects,
            'rem'      => $rem,
            'editor'   => 'editor',
            'Form'     => $Form->Form('projects'),

        ];

        return view('scrn', $data);
    }
}
