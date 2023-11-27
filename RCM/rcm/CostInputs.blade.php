<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {!! Alert(
        $icon = 'fa-info',
        $class = 'alert-primary',
        $Title = 'Cost input report',
        $Msg = ' cost input analytics',
    ) !!}
</div>



{{-- <div class="row">

    <div class="col-6">
        <div class="card-body pt-3 bg-light shadow-lg table-responsive">
            <div style="width:100%;">
                <canvas height="400" id="myChart"></canvas>
            </div>
        </div>
    </div>


    <div class="col-6">
        <div class="card-body pt-3 bg-light shadow-lg table-responsive">
            <div style="width:100%;">
                <canvas height="400" id="myChart2"></canvas>
            </div>
        </div>
    </div>

</div> --}}

<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <table
        class="mytable table table-hover table-rounded table-bordered border gy-3 gs-3">
        <thead class="table-dark">
            <tr class="fw-bold text-gray-200">
                <th>Description</th>
                <th>Total Budget Q1-Q9</th>
                <th>Total Expenditure Q1-Q9</th>
                <th>Total Budget Balance Q1-Q9</th>
                <th>Q1-Q9 Absorption Capacity</th>
            </tr>
        </thead>
        <tbody>
            <!-- Human Resources (HR) -->
            <tr>
                <td>Human Resources (HR)</td>
                <td class="table-success">$922,776</td>
                <td class="table-warning">$790,689</td>
                <td class="table-info">$132,087</td>
                <td class="table-primary">86%</td>
            </tr>
            <!-- Travel related costs (TRC) -->
            <tr>
                <td>Travel related costs (TRC)</td>
                <td class="table-success">$5,340,417</td>
                <td class="table-warning">$3,388,919</td>
                <td class="table-info">$1,951,498</td>
                <td class="table-primary">63%</td>
            </tr>
            <!-- External Professional services (EPS) -->
            <tr>
                <td>External Professional services (EPS)</td>
                <td class="table-success">$907,188</td>
                <td class="table-warning">$354,666</td>
                <td class="table-info">$552,522</td>
                <td class="table-primary">39%</td>
            </tr>
            <!-- Non-health equipment (NHP) -->
            <tr>
                <td>Non-health equipment (NHP)</td>
                <td class="table-success">$32,000</td>
                <td class="table-warning">$17,077</td>
                <td class="table-info">$14,923</td>
                <td class="table-primary">53%</td>
            </tr>
            <!-- Communication Material and Publications (CMP) -->
            <tr>
                <td>Communication Material and Publications (CMP)</td>
                <td class="table-success">$12,422</td>
                <td class="table-warning">$5,422</td>
                <td class="table-info">$7,000</td>
                <td class="table-primary">44%</td>
            </tr>
            <!-- Indirect and Overhead Costs -->
            <tr>
                <td>Indirect and Overhead Costs</td>
                <td class="table-success">$391,343</td>
                <td class="table-warning">$246,219</td>
                <td class="table-info">$145,123</td>
                <td class="table-primary">63%</td>
            </tr>
            <!-- Activity Based Contracts -->
            <tr>
                <td>Activity Based Contracts</td>
                <td class="table-success">$85,926</td>
                <td class="table-danger">$0</td>
                <td class="table-info">$85,926</td>
                <td class="table-secondary">0%</td>
            </tr>
        </tbody>
    </table>
</div>







{{-- @isset($CostInputs)
    @foreach ($CostInputs as $up)
        {{ UpdateModalHeader($Title = 'Update the selected  record', $ModalID = $up->id) }}
        <form action="{{ route('MassUpdate') }}" class="" method="POST">
            @csrf

            <div class="row">

                <input type="hidden" name="id" value="{{ $up->id }}">

                <input type="hidden" name="TableName" value="project_cost_inputs">

                {{ RunUpdateModalFinal($ModalID = $up->id, $Extra = '', $csrf = null, $Title = null, $RecordID = $up->id, $col = '12', $te = '12', $TableName = 'project_cost_inputs') }}
            </div>


            {{ _UpdateModalFooter() }}

        </form>
    @endforeach
@endisset


@include('Costinputs.NewCostInput') --}}
