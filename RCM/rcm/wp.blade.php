<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {!! Alert(
        $icon = 'fa-info',
        $class = 'alert-primary',
        $Title = 'Work Plan Analysis',
        $Msg = 'Detailed Work Plan   Report',
    ) !!}
</div>


<div class="row">
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        <table
            class="mytable table table-rounded table-bordered border gy-3 gs-3">
            <thead>
                <tr class="fw-bold text-gray-800 border-bottom border-gray-200">

                    <th class="bg-dark text-light fw-bolder">Module Name</th>
                    <th class="bg-dark text-light fw-bolder">Activity</th>
                    <th class="bg-dark text-light fw-bolder">Activity Details
                        Milestones Targets</th>
                    <th class="bg-dark text-light fw-bolder">Criterion For
                        Completion</th>

                    <th class="bg-dark text-light fw-bolder">Progress Status
                    </th>
                    <th class="bg-dark text-light fw-bolder">Score</th>
                    <th class="bg-dark text-light fw-bolder">PR Comments</th>

                </tr>
            </thead>
            <tbody>
                @isset($ProjectSummary)
                    @foreach ($ProjectSummary as $data)
                        <tr>


                            <td>{{ $data->ModuleName }}</td>
                            <td>{{ $data->Activity }}</td>
                            <td>{{ $data->ActivityDetailsMilestonesTargets }}</td>
                            <td>{{ $data->CriterionForCompletion }}</td>
                            <!-- Progress Status Column with conditional colors -->
                            <td
                                class="{{ trim($data->ProgressStatus) === 'Completed' ? 'bg-success text-light fw-bolder' : (trim($data->ProgressStatus) === 'Advancing' ? 'bg-dark text-light fw-bolder' : 'bg-danger text-white fw-bold') }}">
                                {{ $data->ProgressStatus }}
                            </td>

                            <!-- Score Column with conditional colors -->
                            <td
                                class="{{ trim($data->ProgressStatus) === 'Completed' ? 'bg-success text-light fw-bolder' : (trim($data->ProgressStatus) === 'Advancing' ? 'bg-dark text-light fw-bolder' : 'bg-danger text-white fw-bold') }}">
                                {{ $data->Score }}
                            </td>

                            <td>{{ $data->PRComments }}</td>

                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
    </div>
</div>
