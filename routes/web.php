<?php

// use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RcmController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ModulesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\CostInputsController;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\InterventionsController;

Route::middleware(['auth'])->group(function () {
  // CostInputsController Routes
  Route::get('/SelectModuleWp', [RcmController::class, 'SelectModuleWp'])->name('SelectModuleWp');

  Route::get('/WpTracking', [RcmController::class, 'WpTracking'])->name('WpTracking');

  Route::get('/Reconciliation', [RcmController::class, 'Reconciliation'])->name('Reconciliation');

  Route::get('/BlAnalysis', [RcmController::class, 'BlAnalysis'])->name('BlAnalysis');


  Route::any('/ActivityAnalysisSelectMod', [RcmController::class, 'ActivityAnalysisSelectMod'])->name('ActivityAnalysisSelectMod');


  Route::any('/ActivityAnalysis', [RcmController::class, 'ActivityAnalysis'])->name('ActivityAnalysis');

  Route::get('/dashboard', [RcmController::class, 'ProjectSummary']);
  Route::get('/', [RcmController::class, 'ProjectSummary']);

  Route::get('ProjectSummary', [RcmController::class, 'ProjectSummary'])->name('ProjectSummary');

  Route::any('ModuleExpenditure', [RcmController::class, 'ModuleExpenditure'])->name('ModuleExpenditure');



  Route::get('SelectModuleExp', [RcmController::class, 'SelectModuleExp'])->name('SelectModuleExp');


  Route::get('ModuleAnalytics', [RcmController::class, 'ModuleAnalytics'])->name('ModuleAnalytics');

  Route::get('CostInputsDashboard', [RcmController::class, 'CostInputsDashboard'])->name('CostInputsDashboard');

  Route::get('ActivitiesReport', [AnalyticsController::class, 'ActivitiesReport'])->name('ActivitiesReport');

  Route::get('CostInputReport', [AnalyticsController::class, 'CostInputReport'])->name('CostInputReport');

  Route::get('InterventionsReport', [AnalyticsController::class, 'InterventionsReport'])->name('InterventionsReport');

  Route::get('ModuleReport', [AnalyticsController::class, 'ModuleReport'])->name('ModuleReport');

  // Route::get('/', [AnalyticsController::class, 'ProjectReport'])->name('ProjectReport');

  Route::get('ProjectReport', [AnalyticsController::class, 'ProjectReport'])->name('ProjectReport');

  Route::get('MgtExpenditure', [ExpenditureController::class, 'MgtExpenditure'])->name('MgtExpenditure');

  Route::get('MgtActivityStatus', [ActivitiesController::class, 'MgtActivityStatus'])->name('MgtActivityStatus');

  Route::get('MgtActivities', [ActivitiesController::class, 'MgtActivities'])->name('MgtActivities');

  Route::get('MgtConstInputs', [CostInputsController::class, 'MgtConstInputs'])->name('MgtConstInputs');

  // InterventionsController Routes
  Route::get('MgtInterventions', [InterventionsController::class, 'MgtInterventions'])->name('MgtInterventions');

  // ModulesController Routes
  Route::any('ManageProjectModules', [ModulesController::class, 'ManageProjectModules'])->name('ManageProjectModules');

  // ProjectsController Routes
  Route::get('MgtProjects', [ProjectsController::class, 'MgtProjects'])->name('MgtProjects');

  // MainController Routes
  Route::any('VirtualOffice', [MainController::class, 'VirtualOffice'])->name('VirtualOffice');
  Route::any('/home', [MainController::class, 'VirtualOffice'])->name('home');
  // Route::any('/', [MainController::class, 'VirtualOffice']);

  // CrudController Routes
  Route::get('DeleteData/{id}/{TableName}', [CrudController::class, 'DeleteData'])->name('DeleteData');
  Route::post('MassUpdate', [CrudController::class, 'MassUpdate'])->name('MassUpdate');
  Route::post('MassInsert', [CrudController::class, 'MassInsert'])->name('MassInsert');
});

// // Dashboard Route
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
