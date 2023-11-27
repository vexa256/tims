<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {!! Alert(
        $icon = 'fa-info',
        $class = 'alert-primary',
        $Title = 'Expenditure',
        $Msg = 'Expenditure by cost input report',
    ) !!}
</div>



<div class="row">

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

</div>

<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {{-- {{ HeaderBtn($Toggle = 'New', $Class = 'btn-danger', $Label = 'New Cost Input', $Icon = 'fa-plus') }} --}}
    <table class="mytable table table-rounded table-bordered border gy-3 gs-3">
        <thead>
            <tr class="fw-bold text-gray-800 border-bottom border-gray-200">
                <th>Cost Group</th>
                <th class="bg-dark text-light">Total Spent</th>

            </tr>
        </thead>
        <tbody>
            @isset($CostInputs)
                @foreach ($CostInputs as $data)
                    <tr>
                        <td>{{ $data->CostInput }}</td>
                        <td>{{ number_format($data->TotalSpent, 3) }}
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
