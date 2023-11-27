<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {!! Alert(
        $icon = 'fa-info',
        $class = 'alert-primary',
        $Title = 'Module expenditure report for all quarters',
        $Msg = 'Expenditure by quarters',
    ) !!}
</div>



<div class="row">

    <div class="col-12">
        <div class="card-body pt-3 bg-light shadow-lg table-responsive">
            <div style="width:100%;">
                <canvas height="100" id="moduleExpenditureChart"></canvas>
            </div>

        </div>
    </div>




</div>

<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {{-- {{ HeaderBtn($Toggle = 'New', $Class = 'btn-danger', $Label = 'New Cost Input', $Icon = 'fa-plus') }} --}}
    <table class="mytable table table-rounded table-bordered border gy-3 gs-3">
        <thead>
            <tr class="fw-bold text-gray-800 border-bottom border-gray-200">
                <th class="bg-dark text-light fw-bolder">Module Name</th>
                <th class="bg-dark text-light">Total Expenditure Q1-Q9 (USD)
                </th>
                <th class="bg-dark text-light">Total Budget Q1-Q9 (USD)</th>
                <th class="bg-dark text-light">Total Budget Balance Q1-Q9 (USD)
                </th>
            </tr>
        </thead>
        <tbody>
            @isset($ModuleExpenditures)
                <!-- Assuming the variable is passed to the view as 'results' -->
                @foreach ($ModuleExpenditures as $data)
                    <tr>
                        <td class="bg-dark text-light fw-bolder">
                            {{ $data->Modules }}</td>
                        <td class="bg-dark text-light fw-bolder">
                            {{ number_format($data->Total_Expenditure_Q1_to_Q9, 0) }}
                            USD</td>
                        <td class="bg-dark text-light fw-bolder">
                            {{ number_format($data->Total_Budget_Q1_to_Q9, 0) }} USD
                        </td>
                        <td class="bg-dark text-light fw-bolder">
                            {{ number_format($data->Total_Budget_Balance_Q1_to_Q9, 0) }}
                            USD</td>
                    </tr>
                @endforeach
            @endisset
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
