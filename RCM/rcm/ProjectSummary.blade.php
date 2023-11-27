<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {!! Alert(
        $icon = 'fa-info',
        $class = 'alert-primary',
        $Title = 'Project Summary',
        $Msg = 'Project Analytics',
    ) !!}
</div>



<div class="row">

    <div class="col-12">
        <div class="card-body pt-3 bg-light shadow-lg table-responsive">
            <div style="width:100%;">
                <canvas height="100" id="summaryExactChart"></canvas>
            </div>

        </div>
    </div>


    {{-- <div class="col-6">
        <div class="card-body pt-3 bg-light shadow-lg table-responsive">
            <div style="width:100%;">
                <canvas height="500" id="summaryExactChart2"></canvas>
            </div>
        </div>
    </div> --}}

</div>

<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {{-- Your header button could go here if needed --}}
    <table class="mytable table table-rounded table-bordered border gy-3 gs-3">
        <thead>
            <tr class="fw-bold text-gray-800 border-bottom border-gray-200">
                <th class="bg-dark text-light fw-bolder">Total Grant (USD)</th>
                <th class="bg-dark text-light">Total Budget Q1-Q9 (USD)</th>
                <th class="bg-dark text-light">Fund Disbursement Q1-Q9 (USD)
                </th>
                <th class="bg-dark text-light">Interest From Bank/Exchange Rate
                    Gain Q1-Q9 (USD)</th>
                <th class="bg-dark text-light">Total Fund Q1-Q9 (USD)</th>
                <th class="bg-dark text-light">Total Expenditure Q1-Q9 (USD)
                </th>
                <th class="bg-dark text-light">Balance of Funds (USD)</th>
            </tr>
        </thead>
        <tbody>
            @isset($ProjectSummary)
                <!-- Assuming the variable is passed to the view as 'ProjectSummary' -->
                @foreach ($ProjectSummary as $data)
                    <tr>
                        <td class="bg-dark text-light fw-bolder">
                            {{ number_format($data->TotalGrant, 0) }} USD</td>
                        <td class="bg-dark text-light fw-bolder">
                            {{ number_format($data->TotalBudget_Q1_Q9, 0) }} USD
                        </td>
                        <td class="bg-dark text-light fw-bolder">
                            {{ number_format($data->FundDisbursement_Q1_Q9, 0) }}
                            USD</td>
                        <td class="bg-dark text-light fw-bolder">
                            {{ number_format($data->InterestFromBank_ExchangeRateGain_Q1_Q9, 0) }}
                            USD</td>
                        <td class="bg-dark text-light fw-bolder">
                            {{ number_format($data->TotalFund_Q1_Q9, 0) }} USD</td>
                        <td class="bg-dark text-light fw-bolder">
                            {{ number_format($data->Expenditure_Q1_Q9, 0) }} USD
                        </td>
                        <td class="bg-dark text-light fw-bolder">
                            {{ number_format($data->BalanceOfFunds, 0) }} USD</td>
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
