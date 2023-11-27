<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>




<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>

<script
    src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}">
</script>

<script
    src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}">
</script>


@isset($editor)
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>


    <script src="{{ asset('assets/ckeditor/adapters/jquery.js') }}"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"
        charset="utf-8"></script> --}}

    <script>
        $(document).ready(function() {
            $('textarea').ckeditor(function(textarea) {
                // Callback function code.
            });
        });
    </script>
@endisset



@isset($ChartResults)
    @include('scripts.chartnew')
    <script>
        window.addEventListener("load", (event) => {


            // Assuming you passed $ChartResults to the view as 'results'
            const results = @json($ChartResults);

            // Extracting Description and TotalSpent values
            const labels = results.map(item => item.CostInput);
            const data = results.map(item => item.TotalSpent);

            // Creating the chart
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Spent (from Q1 to Q9)',
                        data: data,
                        backgroundColor: 'purple',
                        borderColor: 'green',
                        borderWidth: 5
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>


    <script>
        window.addEventListener("load", (event) => {


            // Assuming you passed $ChartResults to the view as 'results'
            const results = @json($ChartResults);

            // Extracting Description and TotalSpent values
            const labels = results.map(item => item.CostInput);
            const data = results.map(item => item.TotalSpent);

            // Creating the chart
            const ctx = document.getElementById('myChart2').getContext(
                '2d');
            const myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Spent (Q1 TO Q9)',
                        data: data,
                        backgroundColor: 'red',
                        borderColor: 'blue',
                        borderWidth: 5
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

    {{-- @include('scripts.chartjs') --}}
@endisset

@isset($ModuleChart)
    @include('scripts.chartnew')

    <script>
        window.addEventListener("load", (event) => {
            // Assuming you passed $Module to the view as 'ChartResults'
            const moduleData = @json($ModuleChart);

            // Extracting values for the graph
            const moduleNames = moduleData.map(item => item.ModuleName);
            const q1ToQ8Absorption = moduleData.map(item => item
                .Q1_Q8_Absorption_Capacity);
            const q9Absorption = moduleData.map(item => item
                .Q9_Absorption_Capacity);
            const q1ToQ9Absorption = moduleData.map(item => item
                .Q1_Q9_Absorption_Capacity);

            // Creating the chart
            const ctx = document.getElementById('moduleAnalyticsChart')
                .getContext('2d');
            const moduleAnalyticsChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: moduleNames,
                    datasets: [{
                            label: 'Q1-Q8 Absorption Capacity',
                            data: q1ToQ8Absorption,
                            backgroundColor: 'Red',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1,
                            barThickness: 20,
                            categoryPercentage: 0.4,
                            barPercentage: 0.4
                        },
                        {
                            label: 'Q9 Absorption Capacity',
                            data: q9Absorption,
                            backgroundColor: 'Green',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1,
                            barThickness: 20,
                            categoryPercentage: 0.4,
                            barPercentage: 0.4
                        },
                        {
                            label: 'Q1-Q9 Absorption Capacity',
                            data: q1ToQ9Absorption,
                            backgroundColor: 'Purple',
                            borderColor: 'rgba(255, 206, 86, 1)',
                            borderWidth: 1,
                            barThickness: 20,
                            categoryPercentage: 0.4,
                            barPercentage: 0.4
                        }
                    ]
                },
                options: {
                    responsive: true,
                    indexAxis: 'y', // This will make the chart horizontal
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endisset


@isset($ModuleExpenditures)
    @include('scripts.chartnew')
    <script>
        window.addEventListener("load", (event) => {
            // Assuming you passed $ModuleExpenditures to the view as 'moduleData'
            const moduleData = @json($ModuleExpenditures);

            // Extract values
            const moduleNames = moduleData.map(item => item.Modules);
            const totalBudget = moduleData.map(item => item
                .Total_Budget_Q1_to_Q9);
            const totalExpenditure = moduleData.map(item => item
                .Total_Expenditure_Q1_to_Q9);
            const totalBudgetBalance = moduleData.map(item => item
                .Total_Budget_Balance_Q1_to_Q9);

            // Create the horizontal bar chart
            const ctx = document.getElementById('moduleExpenditureChart')
                .getContext('2d');
            const moduleExpenditureChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: moduleNames,
                    datasets: [{
                            label: 'Total Budget Q1-Q9 in USD',
                            data: totalBudget,
                            backgroundColor: 'red',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1,
                            barThickness: 20,
                            categoryPercentage: 0.4,
                            barPercentage: 0.4
                        },
                        {
                            label: 'Total Expenditure Q1-Q9 in USD',
                            data: totalExpenditure,
                            backgroundColor: 'blue',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1,
                            barThickness: 20,
                            categoryPercentage: 0.4,
                            barPercentage: 0.4
                        },
                        {
                            label: 'Total Budget Balance Q1-Q9 in USD',
                            data: totalBudgetBalance,
                            backgroundColor: 'purple',
                            borderColor: 'rgba(255, 206, 86, 1)',
                            borderWidth: 1,
                            barThickness: 20,
                            categoryPercentage: 0.4,
                            barPercentage: 0.4
                        }
                    ]
                },
                options: {
                    responsive: true,
                    indexAxis: 'y', // This will make the chart horizontal
                    scales: {
                        y: {
                            beginAtZero: true
                        },
                        x: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endisset



@include('not.not')
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>



@if (isset($rem))
    <script>
        $(function() {
            setInterval(function() {
                @foreach ($rem as $val)
                    // console.log(".x_{{ $val }}");
                    $(".x_{{ $val }}").remove();
                @endforeach
            }, 1000);



        });
    </script>
@endif


@isset($ProjectSummary)
    @include('scripts.chartnew')
    <script>
        window.addEventListener("load", (event) => {
            // Assuming you passed the ProjectSummary to the view as 'ProjectSummary'
            const summaryData = @json($ProjectSummary);

            // Extract values
            const totalGrant = summaryData.map(item => item.TotalGrant);
            const totalBudgetQ1Q9 = summaryData.map(item => item
                .TotalBudget_Q1_Q9);
            const fundDisbursementQ1Q9 = summaryData.map(item => item
                .FundDisbursement_Q1_Q9);
            const interestFromBankQ1Q9 = summaryData.map(item => item
                .InterestFromBank_ExchangeRateGain_Q1_Q9);
            const totalFundQ1Q9 = summaryData.map(item => item
                .TotalFund_Q1_Q9);
            const expenditureQ1Q9 = summaryData.map(item => item
                .Expenditure_Q1_Q9);
            const balanceOfFunds = summaryData.map(item => item
                .BalanceOfFunds);

            // Create the horizontal bar chart
            const ctx = document.getElementById('summaryExactChart')
                .getContext('2d');
            const summaryExactChart = new Chart(ctx, {
                type: 'bar', // Use 'bar' for both horizontal and vertical bars
                data: {
                    labels: ['Total Grant', 'Total Budget Q1-Q9',
                        'Fund Disbursement Q1-Q9',
                        'Interest From Bank Q1-Q9',
                        'Total Fund Q1-Q9', 'Expenditure Q1-Q9',
                        'Balance of Funds'
                    ],
                    datasets: [{
                        label: 'Amount in USD',
                        data: [
                            totalGrant.reduce((acc,
                                    val) => acc + val,
                                0),
                            totalBudgetQ1Q9.reduce((acc,
                                    val) => acc + val,
                                0),
                            fundDisbursementQ1Q9.reduce(
                                (acc, val) => acc + val,
                                0),
                            interestFromBankQ1Q9.reduce(
                                (acc, val) => acc + val,
                                0),
                            totalFundQ1Q9.reduce((acc,
                                    val) => acc + val,
                                0),
                            expenditureQ1Q9.reduce((acc,
                                    val) => acc + val,
                                0),
                            balanceOfFunds.reduce((acc,
                                    val) => acc + val,
                                0)
                        ],
                        backgroundColor: ['red', 'blue',
                            'green', 'purple', 'orange',
                            'pink', 'yellow'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 255, 0, 1)'
                        ],
                        borderWidth: 1,
                        borderWidth: 1,
                        barThickness: 20,
                        categoryPercentage: 0.3,
                        barPercentage: 0.3,


                    }]
                },
                options: {
                    responsive: true,
                    indexAxis: 'y', // This will make the bar chart horizontal
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });




        // window.addEventListener("load", (event) => {
        //     // Assuming you passed the ProjectSummary to the view as 'ProjectSummary'
        //     const summaryData = @json($ProjectSummary);

        //     // Extract values
        //     const totalGrant = summaryData.map(item => item.TotalGrant);
        //     const totalBudgetQ1Q9 = summaryData.map(item => item
        //         .TotalBudget_Q1_Q9);
        //     const fundDisbursementQ1Q9 = summaryData.map(item => item
        //         .FundDisbursement_Q1_Q9);
        //     const interestFromBankQ1Q9 = summaryData.map(item => item
        //         .InterestFromBank_ExchangeRateGain_Q1_Q9);
        //     const totalFundQ1Q9 = summaryData.map(item => item
        //         .TotalFund_Q1_Q9);
        //     const expenditureQ1Q9 = summaryData.map(item => item
        //         .Expenditure_Q1_Q9);
        //     const balanceOfFunds = summaryData.map(item => item
        //         .BalanceOfFunds);

        //     // Create the chart
        //     const ctx = document.getElementById('summaryExactChart2')
        //         .getContext('2d');
        //     const summaryExactChart = new Chart(ctx, {
        //         type: 'line',
        //         data: {
        //             labels: ['Total Grant', 'Total Budget Q1-Q9',
        //                 'Fund Disbursement Q1-Q9',
        //                 'Interest From Bank Q1-Q9',
        //                 'Total Fund Q1-Q9', 'Expenditure Q1-Q9',
        //                 'Balance of Funds'
        //             ],
        //             datasets: [{
        //                 label: 'Amount in USD',
        //                 data: [
        //                     totalGrant.reduce((acc,
        //                             val) => acc + val,
        //                         0),
        //                     totalBudgetQ1Q9.reduce((acc,
        //                             val) => acc + val,
        //                         0),
        //                     fundDisbursementQ1Q9.reduce(
        //                         (acc, val) => acc + val,
        //                         0),
        //                     interestFromBankQ1Q9.reduce(
        //                         (acc, val) => acc + val,
        //                         0),
        //                     totalFundQ1Q9.reduce((acc,
        //                             val) => acc + val,
        //                         0),
        //                     expenditureQ1Q9.reduce((acc,
        //                             val) => acc + val,
        //                         0),
        //                     balanceOfFunds.reduce((acc,
        //                             val) => acc + val,
        //                         0)
        //                 ],
        //                 backgroundColor: ['red', 'blue',
        //                     'green', 'purple', 'orange',
        //                     'pink', 'yellow'
        //                 ],
        //                 borderColor: [
        //                     'rgba(255, 99, 132, 1)',
        //                     'rgba(75, 192, 192, 1)',
        //                     'rgba(255, 206, 86, 1)',
        //                     'rgba(153, 102, 255, 1)',
        //                     'rgba(255, 159, 64, 1)',
        //                     'rgba(54, 162, 235, 1)',
        //                     'rgba(255, 255, 0, 1)'
        //                 ],
        //                 borderWidth: 1
        //             }]
        //         },
        //         options: {
        //             responsive: true,
        //             scales: {
        //                 x: {
        //                     beginAtZero: true
        //                 }
        //             }
        //         }
        //     });
        // });
    </script>
@endisset

</body>


</html>
