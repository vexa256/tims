<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {!! Alert(
        $icon = 'fa-info',
        $class = 'alert-primary',
        $Title = 'Fund Reconciliation',
        $Msg = 'Reconciliation Detailed Report',
    ) !!}
</div>



<div class="row">
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        <table
            class="mytable table table-rounded table-bordered border gy-3 gs-3">
            <thead>
                <tr class="fw-bold text-gray-800 border-bottom border-gray-200">
                    <th colspan="4" class="bg-info text-light text-center">
                        QPA-T-TIMS Cash Reconciliation - 30 SEPT 2023</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-dark text-light fw-bolder">
                    <td>Particulars</td>
                    <td>Amount in USD</td>
                    <td>Description</td>
                    <td>Total</td>
                </tr>
                <tr>
                    <td>Fund balance as per summary report</td>
                    <td>982,624</td>
                    <td colspan="2"></td>
                </tr>
                <tr class="bg-primary text-light fw-bolder" colspan="4">
                    <td colspan="4">Less: Receivable</td>
                </tr>
                <!-- Receivables -->
                <tr>
                    <td>VAT claimable</td>
                    <td>42,295</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td>Imprest accountable</td>
                    <td>251,511</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td>Sub total</td>
                    <td>(293,806)</td>
                    <td colspan="2"></td>
                </tr>
                <!-- Payables -->
                <tr class="bg-primary text-light fw-bolder" colspan="4">
                    <td colspan="4">Add: Payables</td>
                </tr>
                <tr>
                    <td>Creditors</td>
                    <td>(2,381)</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td>ECSA HC</td>
                    <td>47,727</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td>Sub total</td>
                    <td>45,346</td>
                    <td colspan="2"></td>
                </tr>
                <!-- Cash and Cash Equivalent -->
                <tr>
                    <td>Cash and cash equivalent</td>
                    <td>734,163</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td>USD account</td>
                    <td>719,292</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td>TZS account</td>
                    <td>14,872</td>
                    <td colspan="2"></td>
                </tr>
                <tr class="bg-warning text-dark fw-bolder" colspan="2">
                    <td colspan="2">TOTAL CASH</td>
                    <td colspan="2">734,163</td>
                </tr>
                <!-- Payables (extended section) -->
                <tr class="bg-primary text-light fw-bolder">
                    <td colspan="4">PAYABLES</td>
                </tr>
                <tr>
                    <td>Salaries & ICR for SEPT 2023</td>
                    <td>47,361.96</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td>Suppliers</td>
                    <td>(2,381.09)</td>
                    <td colspan="2"></td>
                </tr>
                <tr class="bg-primary text-light fw-bolder">
                    <td colspan="2">Grand Total</td>
                    <td colspan="2">44,980.87</td>
                </tr>
                <!-- Commitments/Obligations -->
                <tr class="bg-primary text-light fw-bolder">
                    <td colspan="4">COMMITMENTS/ OBLIGATIONS</td>
                </tr>
                <tr>
                    <td>CLM Capacity Building- Namibia</td>
                    <td>65,166.67</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td>TB Declaration in the Mining -3 Countries</td>
                    <td>60,000.00</td>
                    <td colspan="2"></td>
                </tr>
                <!-- Other Commitments/Obligations -->
                <tr>
                    <td>Salaries & LoE for the Month of OCT 2023</td>
                    <td>26,910.00</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td>ICR OCT 2023</td>
                    <td>14,411.24</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td>Consultants</td>
                    <td>106,148.06</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td>MHS SOP In-Country Meetings-6 Countries</td>
                    <td>30,000.00</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td>KP Organization-Human Right</td>
                    <td>82,000.00</td>
                    <td colspan="2"></td>
                </tr>

                <tr class="bg-primary text-light fw-bolder">
                    <td colspan="2">Grand Total</td>
                    <td colspan="2">384,635.96</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
