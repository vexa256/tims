{{-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion ">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas fa-project-diagram fs-3" aria-hidden="true"></i>
        </span>
        <span class="menu-title">Manage Project Data</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">

        <?php
        
        // MenuItem($link = null, $label = 'Projects');
        
        MenuItem($link = route('MgtProjects'), $label = 'Projects');
        
        MenuItem($link = route('ManageProjectModules'), $label = 'Project Modules');
        
        MenuItem($link = route('MgtInterventions'), $label = 'Project Interventions');
        
        MenuItem($link = route('MgtActivities'), $label = 'Project Activities');
        
        MenuItem($link = route('MgtActivityStatus'), $label = 'Activity Progress Status');
        
        MenuItem($link = route('MgtConstInputs'), $label = 'Cost Inputs');
        
        MenuItem($link = route('MgtExpenditure'), $label = 'Project Expenditure');
        
        ?>


    </div>
</div>

<div data-kt-menu-trigger="click" class="menu-item menu-accordion ">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas fa-chart-area fs-3" aria-hidden="true"></i>
        </span>
        <span class="menu-title">Analytics</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">

        <?php
        
        MenuItem($link = route('ProjectReport'), $label = 'Project Analytics');
        MenuItem($link = route('ModuleReport'), $label = 'Module Analytics');
        MenuItem($link = route('InterventionsReport'), $label = 'Intervention Analytics');
        MenuItem($link = route('ActivitiesReport'), $label = 'Activity Analytics');
        MenuItem($link = route('CostInputReport'), $label = 'Cost Input Analytics');
        // MenuItem($link = route('MgtExpenditure'), $label = 'Activity Progress');
        ?>


    </div>
</div> --}}


<div data-kt-menu-trigger="click" class="menu-item menu-accordion  show">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas fa-project-diagram fs-3" aria-hidden="true"></i>
        </span>
        <span class="menu-title">Advanced Analytics</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">

        <?php
        
        MenuItem($link = route('ProjectSummary'), $label = 'Project Summary');
        
        MenuItem($link = route('Reconciliation'), $label = 'Fund Reconciliation');
        
        MenuItem($link = route('SelectModuleWp'), $label = 'Work Plan Tracking');
        
        MenuItem($link = route('ModuleAnalytics'), $label = 'Module Absorption');
        
        MenuItem($link = route('SelectModuleExp'), $label = 'Module Expenditure');
        
        MenuItem($link = route('CostInputsDashboard'), $label = 'Cost Inputs');
        
        MenuItem($link = route('ActivityAnalysisSelectMod'), $label = 'Detailed Activity Analysis');
        
        MenuItem($link = route('BlAnalysis'), $label = 'Budget Line Analysis');
        
        // MenuItem($link = route('MgtInterventions'), $label = 'Project Interventions');
        
        // MenuItem($link = route('MgtActivities'), $label = 'Project Activities');
        
        // MenuItem($link = route('MgtActivityStatus'), $label = 'Activity Progress Status');
        
        // MenuItem($link = route('MgtConstInputs'), $label = 'Cost Inputs');
        
        // MenuItem($link = route('MgtExpenditure'), $label = 'Project Expenditure');
        
        ?>


    </div>
</div>
