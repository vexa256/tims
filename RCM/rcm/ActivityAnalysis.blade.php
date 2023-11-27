<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {!! Alert(
        $icon = 'fa-info',
        $class = 'alert-primary',
        $Title = 'Activity  Analysis For The  Module ' . $SModuleName,
        $Msg = 'Detailed Activity  Report',
    ) !!}
</div>



<div class="row">
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        <table
            class="mytable table table-rounded table-bordered border gy-3 gs-3">
            <thead>
                <tr class="fw-bold text-gray-800 border-bottom border-gray-200">
                    {{-- <th class="bg-dark text-light  fw-bolder fw-bolder">Module
                    </th> --}}
                    <th class="bg-dark text-light  fw-bolder">Budget Line</th>
                    <th class="bg-dark text-light  fw-bolder">Activity</th>
                    <th class="bg-dark text-light  fw-bolder">Q1-4 Budget</th>
                    <th class="bg-dark text-light  fw-bolder">Q5-8 Budget</th>
                    <th class="bg-dark text-light  fw-bolder">Total Budget Q1-8
                    </th>
                    <th class="bg-dark text-light  fw-bolder">Actual Exp Q1-8
                    </th>
                    <th class="bg-dark text-light  fw-bolder">Q9 Budget</th>
                    <th class="bg-dark text-light  fw-bolder">Actual Exp Q9</th>
                    <th class="bg-dark text-light  fw-bolder">Variances Q1-8
                    </th>
                    <th class="bg-dark text-light  fw-bolder">Variances Q9</th>
                    <th class="bg-dark text-light  fw-bolder">Q1-8 Absorb (%)
                    </th>
                    <th class="bg-dark text-light  fw-bolder">Q9 Absorb (%)</th>
                </tr>
            </thead>
            <tbody>
                @isset($ProjectSummary)
                    @foreach ($ProjectSummary as $data)
                        <tr>
                            {{-- <td>
                                {{ $data->Module }}</td> --}}
                            <td>
                                {{ $data->LineNo }}</td>
                            <td>
                                {{ $data->Activity }}</td>
                            <td>
                                {{ number_format($data->Q1_4_Budget, 3) }}</td>
                            <td>
                                {{ number_format($data->Q5_8_Budget, 3) }}</td>
                            <td>
                                {{ number_format($data->Total_Budget_Q1_8, 3) }}
                            </td>
                            <td>
                                {{ number_format($data->Actual_Exp_Q1_8, 3) }}</td>
                            <td>
                                {{ number_format($data->Q9_Budget, 3) }}</td>
                            <td>
                                {{ number_format($data->Actual_Exp_Q9, 3) }}</td>
                            <td>
                                {{ number_format($data->Variances_Q1_8, 3) }}</td>
                            <td>
                                {{ number_format($data->Variances_Q9, 3) }}</td>
                            <td>
                                {{ number_format($data->Absorb_Q1_8, 3) }}%</td>
                            <td>
                                {{ number_format($data->Absorb_Q9, 3) }}%</td>
                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
    </div>
</div>
