<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />

</head>

<body>
    @php
    $datetime1 = new \DateTime($date);
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
    <h3>{{$m}} - Management Perfomance Update </h3>
<hr>

<table style="height: 68px; width=100%;" >
    <tbody>
        <tr>
            <td style="width:10%; background-color: #0081C3; color:#fff;" align="center">
                <p><strong>Staff Name</strong></p>
            </td>
            <td style="width: 20%;">
                <p>{{$name}}</p>
            </td>
            <td style="width: 10%; background-color: #0081C3; color:#fff;" align="center">
                <p><strong>Job Title</strong></p>
            </td>
            <td style="width: 20%;">
                <p>{{$title}}</p>
            </td>
            <td style="width: 10%; background-color: #0081C3; color:#fff;" rowspan="2" align="center">
                <p><strong>Date of Update</strong></p>
            </td>
            <td style="width: 20%;" rowspan="2">
                <p>{{$date}}</p>
            </td>
        </tr>
        <tr>
            <td style="width: 10%; background-color: #0081C3; color:#fff;" align="center">
                <p><strong>Country/Department</strong></p>
            </td>
            <td style="width: 20%;">
                <p>{{$department}}</p>
            </td>
            <td style="width: 10%; background-color: #0081C3; color:#fff;" align="center">
                <p><strong>Line Manager</strong></p>
            </td>
            <td style="width: 20%;">
                <p>{{$manager}}</p>
            </td>
        </tr>
    </tbody>
</table>
   
    <hr>

    <table style="width=100%;">
        <tbody>
            <tr>
                <td style="width:100%; background-color: #0081C3; color:#fff;">
                    <p><strong>1. Key Achievements/Tasks
                            Completed</strong></p>

                </td>
            </tr>
            <tr>
                <td style="width:100%;">
                    <p>{{$achievements}}</p>
                </td>
            </tr>
            <tr>
                <td style="width:100%; background-color: #0081C3; color:#fff;">
                    <p><strong>2. Key Challenges and Proposed
                            Solutions/Need for Support</strong></p>
                </td>
            </tr>
            <tr>
                <td style="width:100%;">
                    <p>{{$challenges}}</p>
                </td>
            </tr>
        </tbody>
    </table>

    <table style="width=100%;">
        <tbody>
            <tr style="width:100%;">
                <td style="background-color: #0081C3; color:#fff;" colspan="3">
                    <p><strong>3. Monthly Deliverables</strong></p>

                </td>
            </tr>
            <tr style="background-color: #ddd;" >
                <td style="width: 33%;">
                    <p><strong>Deliverables</strong></p>
                </td>
                <td style="width: 33%;">
                    <p><strong>Submitted (Yes/No)</strong></p>
                </td>
                <td style="width: 33%;">
                    <p><strong>Reason for non-submission and expected submission date</strong></p>
                </td>
            </tr>
            <tr>
                <td style="width: 33%;">
                    <p>Employee Screening Update</p>
                </td>
                <td style="width: 33%;">
                    <p>{{$screening}}</p>
                </td>
                <td style="width: 33%;">
                    <p>{{$screening_reason}}</p>
                </td>
            </tr>
            <tr>
                <td style="width: 33%;">
                    <p>Income Targets</p>
                </td>
                <td style="width: 33%;">
                    <p>{{$targets}}</p>
                </td>
                <td style="width: 33%;">
                    <p>{{$target_reason}}</p>
                </td>
            </tr>
            <tr>
                <td style="width: 33%;">
                    <p>Project Monitoring Template</p>
                </td>
                <td style="width: 33%;">
                    <p>{{$monitoring}}</p>
                </td>
                <td style="width: 33%;">
                    <p>{{$mornitoring_reason}}</p>
                </td>
            </tr>
            <tr>
                <td style="width: 33%;">
                    <p>Audit/M&amp;E Plans (if applicable)</p>
                </td>
                <td style="width: 33%;">
                    <p>{{$me}}</p>
                </td>
                <td style="width: 33%;">
                    <p>{{$me_reason}}</p>
                </td>
            </tr>
        </tbody>
    </table>
   

    <table style="width=100%;">
        <tbody>
            <tr>
                <td colspan="7" style="background-color: #0081C3; color:#fff;" >
                    <p><strong>4.Income Targets</strong></p>

                </td>
            </tr>
            <tr style="background-color: #ddd;">
                <td rowspan="2" >
                    <p><strong><em>Country</em></strong></p>
                </td>
                <td colspan="2">
                    <p><strong><em>Income Target (Current Year) - </em></strong><em>GBP</em></p>
                </td>
                <td colspan="2" >
                    <p><strong><em>Actual Income Received (YTD) - </em></strong><em>GBP</em></p>
                </td>
                <td colspan="2">
                    <p><strong><em>Forecast Income (YTD -&gt; End of Year) - </em></strong><em>GBP</em></p>
                </td>
            </tr>
            <tr style="background-color: #ddd;">
                <td>
                    <p><strong><em>Inc. IFDD and IR UK</em></strong></p>
                </td>
                <td >
                    <p><strong><em>Exc. IFDD and IR UK</em></strong></p>
                </td>
                <td >
                    <p><strong><em>Inc. IFDD and IR UK</em></strong></p>
                </td>
                <td >
                    <p><strong><em>Exc. IFDD and IR UK</em></strong></p>
                </td>
                <td >
                    <p><strong><em>Inc. IFDD and IR UK</em></strong></p>
                </td>
                <td >
                    <p><strong><em>Exc. IFDD and IR UK</em></strong></p>
                </td>
            </tr>
            <tr>
                <td >
                    <p>{{$country}}</p>
                </td>
                <td >
                    <p>{{$I_T_Inc_IFDD}}</p>
                </td>
                <td >
                    <p>{{$I_T_Enc_IFDD}}</p>
                </td>
                <td >
                    <p>{{$A_I_Inc_IFDD}}</p>
                </td>
                <td >
                    <p>{{$A_I_Enc_IFDD}}</p>
                </td>
                <td >
                    <p>{{$F_I_Inc_IFDD}}</p>
                </td>
                <td >
                    <p>{{$F_I_Enc_IFDD}}</p>
                </td>
            </tr>
        </tbody>
    </table>
    

    <table style="width=100%;">
        <tbody>
            <tr>
                <td style="background-color: #0081C3; color:#fff;" >
                    <p><strong>5. External Audits/M&amp;E Visits
                            Due in
                            Next 3 Months</strong></p>

                </td>
            </tr>
            <tr>
                <td>
                    <p>{{$external_audit_next_3months}}</p>
                </td>
            </tr>
        </tbody>
    </table>
  
    <table style="width=100%;">
        <tbody>
            <tr>
                <td style="background-color: #0081C3; color:#fff;">
                    <p><strong>6. External Audits/M&amp;E Visits
                            Completed Last Month</strong></p>

                </td>
            </tr>
            <tr>
                <td>
                    <p>{{$external_audit_last_month}}</p>
                </td>
            </tr>
        </tbody>
    </table>
    
    <table style="width=100%;">
        <tbody>
            <tr>
                <td colspan="4" style="background-color: #0081C3; color:#fff;">
                    <p><strong>7. Cases of Misconduct (Fraud,
                            Complaints, Harassment, Child Protection Policy Violation or Abuse)</strong></p>
                </td>
            </tr>
            <tr style="background-color: #ddd;">
                <td >
                    <p><strong><em>Incident Type</em></strong></p>
                </td>
                <td >
                    <p><strong><em>Date of Occurrence</em></strong></p>
                </td>
                <td >
                    <p><strong><em>Actions (to be) Taken and Deadline</em></strong></p>
                </td>
                <td>
                    <p><strong><em>Informed IRW? (Yes/No, if yes, who?)</em></strong></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>{{$case_type}}</p>
                </td>
                <td>
                    <p>{{$case_occurrence_date}}</p>
                </td>
                <td>
                    <p>{{$case_actions}}</p>
                </td>
                <td>
                    <p>{{$case_informed_irw}}</p>
                </td>
            </tr>
        </tbody>
    </table>

    <table style="width=100%;">
        <tbody>
            <tr>
                <td colspan="4" style="background-color: #0081C3; color:#fff;">
                    <p><strong>8. Accidents and Deaths</strong></p>
                </td>
            </tr>
            <tr style="background-color: #ddd;">
                <td >
                    <p><strong><em>Incident Type</em></strong></p>
                </td>
                <td>
                    <p><strong><em>Date of Occurrence</em></strong></p>
                </td>
                <td>
                    <p><strong><em>Actions (to be) Taken and Deadline</em></strong></p>
                </td>
                <td >
                    <p><strong><em>Informed IRW? (Yes/No, if yes, who?)</em></strong></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>{{$accident_type}}</p>
                </td>
                <td>
                    <p>{{$accident_date}}</p>
                </td>
                <td>
                    <p>{{$accident_actions}}</p>
                </td>
                <td>
                    <p>{{$accident_informed_irw}}</p>
                </td>
            </tr>
        </tbody>
    </table>
    
    <table style="width: 100%;">
        <tbody>
            <tr>
                <td style="background-color: #0081C3; color:#fff;">
                    <p><strong>9. Any other discussions points
                            (optional)</strong></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>{{$aob}}</p>
                </td>
            </tr>
        </tbody>
    </table>

</body>

</html>