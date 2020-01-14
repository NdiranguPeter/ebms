@php
$datetime1 = new \DateTime($data['date']);
$month = $datetime1->format('m');
if ($month == 1) {
$m = "January";
}
if ($month == 2) {
$m = "February";
}
if ($month == 3) {
$m = "March";
}
if ($month == 4) {
$m = "April";
}
if ($month == 5) {
$m = "May";
}
if ($month == 6) {
$m = "June";
}
if ($month == 7) {
$m = "July";
}
if ($month == 8) {
$m = "August";
}
if ($month == 9) {
$m = "September";
}
if ($month == 10) {
$m = "October";
}
if ($month == 11) {
$m = "November";
}
if ($month == 12) {
$m = "December";
}
@endphp
<h3>Monthly Management Update: {{$m}}</h3>

<table>
    <tbody>
        <tr>
            <td width="236">
                <p><strong>Staff Name</strong></p>
            </td>
            <td width="236">
                <p>{{$data['name']}}</p>
            </td>
            <td width="236">
                <p><strong>Job Title</strong></p>
            </td>
            <td width="236">
                <p>{{$data['title']}}</p>
            </td>
            <td rowspan="2" width="236">
                <p><strong>Date of Update</strong></p>
            </td>
            <td rowspan="2" width="236">
                <p>{{$data['date']}}</p>
            </td>
        </tr>
        <tr>
            <td width="236">
                <p><strong>Country/Department</strong></p>
            </td>
            <td width="236">
                <p>{{$data['department']}}</p>
            </td>
            <td width="236">
                <p><strong>Line Manager</strong></p>
            </td>
            <td width="236">
                <p>{{$data['manager']}}</p>
            </td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<table>
    <tbody>
        <tr>
            <td width="1411">
                <p><strong>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>Key Achievements/Tasks
                        Completed</strong></p>
                <p><em>Endeavour to discuss your achievements and completed tasks in the context of your
                        performance/development objectives and/or the organisational strategy. </em></p>
            </td>
        </tr>
        <tr>
            <td width="1411">
                <p>{{$data['name']}}</p>
            </td>
        </tr>
        <tr>
            <td width="1411">
                <p><strong>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>Key Challenges and Proposed
                        Solutions/Need for Support</strong></p>
            </td>
        </tr>
        <tr>
            <td width="1411">
                <p>{{$data['challenges']}}</p>
            </td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<table>
    <tbody>
        <tr>
            <td colspan="3" width="1411">
                <p><strong>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>Monthly Deliverables</strong></p>
                <p><em>If not submitted, please state reasons below and expected submission date</em></p>
                <p><em>For regional level, state the number of submissions and the number of non-submissions, state
                        reasons for non-submissions and expected submission dates</em></p>
            </td>
        </tr>
        <tr>
            <td width="365">
                <p><strong>Deliverables</strong></p>
            </td>
            <td width="227">
                <p><strong>Submitted (Yes/No)</strong></p>
            </td>
            <td width="819">
                <p><strong>Reason for non-submission and expected submission date</strong></p>
            </td>
        </tr>
        <tr>
            <td width="365">
                <p>Employee Screening Update</p>
            </td>
            <td width="227">
                <p>{{$data['screening']}}</p>
            </td>
            <td width="819">
                <p>{{$data['screening_reason']}}</p>
            </td>
        </tr>
        <tr>
            <td width="365">
                <p>Income Targets</p>
            </td>
            <td width="227">
                <p>{{$data['target']}}</p>
            </td>
            <td width="819">
                <p>{{$data['target_reason']}}</p>
            </td>
        </tr>
        <tr>
            <td width="365">
                <p>Project Monitoring Template</p>
            </td>
            <td width="227">
                <p>{{$data['mornitoring']}}</p>
            </td>
            <td width="819">
                <p>{{$data['mornitoring_reason']}}</p>
            </td>
        </tr>
        <tr>
            <td width="365">
                <p>Audit/M&amp;E Plans (if applicable)</p>
            </td>
            <td width="227">
                <p>{{$data['me']}}</p>
            </td>
            <td width="819">
                <p>{{$data['me_reason']}}</p>
            </td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<table>
    <tbody>
        <tr>
            <td colspan="7" width="1417">
                <p><strong>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>Income Targets</strong></p>
                <p><em>Income should only consider the cash / in-kind that will be received by the respective Field
                        Offices during the
                        year&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </em></p>
            </td>
        </tr>
        <tr>
            <td rowspan="2" width="272">
                <p><strong><em>Country(ies)</em></strong></p>
            </td>
            <td colspan="2" width="382">
                <p><strong><em>Income Target (Current Year) - </em></strong><em>GBP</em></p>
            </td>
            <td colspan="2" width="382">
                <p><strong><em>Actual Income Received (YTD) - </em></strong><em>GBP</em></p>
            </td>
            <td colspan="2" width="382">
                <p><strong><em>Forecast Income (YTD -&gt; End of Year) - </em></strong><em>GBP</em></p>
            </td>
        </tr>
        <tr>
            <td width="191">
                <p><strong><em>Inc. IFDD and IR UK</em></strong></p>
            </td>
            <td width="191">
                <p><strong><em>Exc. IFDD and IR UK</em></strong></p>
            </td>
            <td width="191">
                <p><strong><em>Inc. IFDD and IR UK</em></strong></p>
            </td>
            <td width="191">
                <p><strong><em>Exc. IFDD and IR UK</em></strong></p>
            </td>
            <td width="191">
                <p><strong><em>Inc. IFDD and IR UK</em></strong></p>
            </td>
            <td width="191">
                <p><strong><em>Exc. IFDD and IR UK</em></strong></p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>{{$data['country']}}</p>
            </td>
            <td width="191">
                <p>{{$data['I_T_Inc_IFDD']}}</p>
            </td>
            <td width="191">
                <p>{{$data['I_T_Enc_IFDD']}}</p>
            </td>
            <td width="191">
                <p>{{$data['A_I_Inc_IFDD']}}</p>
            </td>
            <td width="191">
                <p>{{$data['A_I_Enc_IFDD']}}</p>
            </td>
            <td width="191">
                <p>{{$data['F_I_Inc_IFDD']}}</p>
            </td>
            <td width="191">
                <p>{{$data['F_I_Enc_IFDD']}}</p>
            </td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<table>
    <tbody>
        <tr>
            <td width="1414">
                <p><strong>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>External Audits/M&amp;E Visits Due in
                        Next 3 Months</strong></p>
                <p><em>Include details of body conducting the external audit, reason(s) for external audit/M&amp;E visit
                        and expected date of visit(s)</em></p>
            </td>
        </tr>
        <tr>
            <td width="1414">
                <p>{{$data['external_audit_next_3months']}}</p>
            </td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<table>
    <tbody>
        <tr>
            <td width="1414">
                <p><strong>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>External Audits/M&amp;E Visits
                        Completed Last Month</strong></p>
                <p><em>Include details of the body that conducted the external audit, reason(s) for external
                        audit/M&amp;E visit, the date the external audit/M&amp;E visit took place and
                        outcome/recommended actions. Share the action plans with the audit/M&amp;E team and line manager
                        or provide a date you expect the action plan to be prepared by</em></p>
            </td>
        </tr>
        <tr>
            <td width="1414">
                <p>{{$data['external_audit_last_month']}}</p>
            </td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<table width="1419">
    <tbody>
        <tr>
            <td colspan="4" width="1419">
                <p><strong>7.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>Cases of Misconduct (Fraud,
                        Complaints, Harassment, Child Protection Policy Violation or Abuse)</strong></p>
            </td>
        </tr>
        <tr>
            <td width="339">
                <p><strong><em>Incident Type</em></strong></p>
            </td>
            <td width="339">
                <p><strong><em>Date of Occurrence</em></strong></p>
            </td>
            <td width="371">
                <p><strong><em>Actions (to be) Taken and Deadline</em></strong></p>
            </td>
            <td width="371">
                <p><strong><em>Informed IRW? (Yes/No, if yes, who?)</em></strong></p>
            </td>
        </tr>
        <tr>
            <td width="339">
                <p>{{$data['case_type']}}</p>
            </td>
            <td width="339">
                <p>{{$data['case_occurrence_date']}}</p>
            </td>
            <td width="371">
                <p>{{$data['case_actions']}}</p>
            </td>
            <td width="371">
                <p>{{$data['case_informed_irw']}}</p>
            </td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<table width="1419">
    <tbody>
        <tr>
            <td colspan="4" width="1419">
                <p><strong>8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>Accidents and Deaths</strong></p>
            </td>
        </tr>
        <tr>
            <td width="339">
                <p><strong><em>Incident Type</em></strong></p>
            </td>
            <td width="339">
                <p><strong><em>Date of Occurrence</em></strong></p>
            </td>
            <td width="371">
                <p><strong><em>Actions (to be) Taken and Deadline</em></strong></p>
            </td>
            <td width="371">
                <p><strong><em>Informed IRW? (Yes/No, if yes, who?)</em></strong></p>
            </td>
        </tr>
        <tr>
            <td width="339">
                <p>{{$data['accident_type']}}</p>
            </td>
            <td width="339">
                <p>{{$data['accident_date']}}</p>
            </td>
            <td width="371">
                <p>{{$data['accident_actions']}}</p>
            </td>
            <td width="371">
                <p>{{$data['accident_informed_irw']}}</p>
            </td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<table width="1422">
    <tbody>
        <tr>
            <td width="1422">
                <p><strong>9.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>Any other discussions points
                        (optional)</strong></p>
            </td>
        </tr>
        <tr>
            <td width="1422">
                <p>{{$data['aob']}}</p>
            </td>
        </tr>
    </tbody>
</table>