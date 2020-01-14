@extends('layouts.default')
@section('content')
<div class="container-fluid main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="list-inline">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="/home">Home</a>
                </li>
                /
                <li class="active">Monthly Management Peformance Report</li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    Monthly Peformance Report
                </h1>
                <p style="float:right;">Date of update: @php
                    $mytime = new DateTime();
                    echo $mytime->format('Y-m-d');
                    @endphp

                </p>
            </div><!-- /.page-header -->

            <!-- PAGE CONTENT BEGINS -->
            <div class="container-fluid">

                <div class="col-sm-12">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <div class="col-sm-12" style="border: 1px solid #bfdeec;">
                        <form method="post" action="{{url('sendemail/send')}}">

                            {{ csrf_field() }}
                            <input type="hidden" name="date" value={{$mytime->format('Y-m-d')}}>
                            <div class="form-group col-sm-6">
                                <label>Staff Name</label>
                                <input type="text" name="name" class="form-control" value="" />
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Job Title</label>
                                <input type="text" name="title" class="form-control" value="" />
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Country/Department</label>
                                <input type="text" name="department" class="form-control" value="" />
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Line Manager</label>
                                <input type="text" name="manager" class="form-control" value="" />
                            </div>

                            <div class="form-group col-sm-12">
                                <label><b>1. Key Achievements/Tasks Completed</b> <i>(Endeavour to discuss your
                                        achievements and
                                        completed tasks in the context of your performance/development objectives
                                        and/or the organisational strategy.)</i></label>
                                <textarea name="achievements" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-sm-12">
                                <label><b>2. Key Challenges and Proposed Solutions/Need for Support</b> </label>
                                <textarea name="challenges" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-sm-12">
                                <label><b>3. Monthly Deliverables</b>
                                    <i> If not submitted, please state reasons below and expected submission date
                                        For regional level, state the number of submissions and the number of
                                        non-submissions, state reasons for
                                        non-submissions
                                        and expected submission dates</i> </label>

                                <table class="">
                                    <tr>
                                        <td style="min-width: 300px;
    padding: 10px;">Employee Screening Update</td>
                                        <td colspan="2" style="min-width: 200px;
    padding: 10px;">
                                            <select name="screening" id="">
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </td>
                                        <td style="min-width: 300px;
    padding: 10px;">
                                            <textarea name="screening_reason" class="form-control"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Income Targets</td>
                                        <td colspan="2" style="min-width: 200px;
    padding: 10px;">
                                            <select name="targets" id="">
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </td>
                                        <td style="min-width: 300px;
    padding: 10px;">
                                            <textarea name="target_reason" class="form-control"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Project Monitoring Template</td>
                                        <td colspan="2" style="min-width: 200px;
    padding: 10px;">
                                            <select name="monitoring" id="">
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </td>
                                        <td style="min-width: 300px;
    padding: 10px;">
                                            <textarea name="mornitoring_reason" class="form-control"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Audit/M&E Plans (if applicable)</td>
                                        <td colspan="2" style="min-width: 200px;
    padding: 10px;">
                                            <select name="me" id="">
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </td>
                                        <td style="min-width: 300px;
    padding: 10px;">
                                            <textarea name="me_reason" class="form-control"></textarea>
                                        </td>
                                    </tr>

                                </table>
                            </div>

                            <div class="form-group col-sm-12">
                                <label><b>4. Income Targets</b>
                                    <i> Income should only consider the cash / in-kind that will be received by the
                                        respective Field Offices during the year</i> </label>

                                <table class="col-sm-12" style="table-layout:fixed;">
                                    <tr>
                                        <th rowspan="2" style="border:1px solid #ddd;">Country(ies)</th>
                                        <th colspan="2" style="border:1px solid #ddd;">Income Target (Current Year) -
                                            GBP</th>
                                        <th colspan="2" style="border:1px solid #ddd;">Actual Income Received (YTD) -
                                            GBP</th>
                                        <th colspan="2" style="border:1px solid #ddd;">Forecast Income (YTD -> End of
                                            Year) - GBP</th>
                                    </tr>
                                    <tr>
                                        <th style="border:1px solid #ddd;">Inc. IFDD and IR UK</th>
                                        <th style="border:1px solid #ddd;">Exc. IFDD and IR UK</th>
                                        <th style="border:1px solid #ddd;">Inc. IFDD and IR UK</th>
                                        <th style="border:1px solid #ddd;">Exc. IFDD and IR UK</th>
                                        <th style="border:1px solid #ddd;">Inc. IFDD and IR UK</th>
                                        <th style="border:1px solid #ddd;">Exc. IFDD and IR UK</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select name="country">
                                                <option value="Kenya">Kenya</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="SouthSudan">SouthSudan</option>
                                            </select>
                                        </td>
                                        <td><input name="I_T_Inc_IFDD" type="text" value=""></td>
                                        <td><input name="I_T_Enc_IFDD" type="text" value=""></td>
                                        <td><input name="A_I_Inc_IFDD" type="text" value=""></td>
                                        <td><input name="A_I_Enc_IFDD" type="text" value=""></td>
                                        <td><input name="F_I_Inc_IFDD" type="text" value=""></td>
                                        <td><input name="F_I_Enc_IFDD" type="text" value=""></td>
                                    </tr>

                                </table>

                            </div>
                            <div class="form-group col-sm-12">
                                <label><b>5. External Audits/M&E Visits Due in Next 3 Months</b>
                                    <i>Include details of body conducting the external audit, reason(s) for external
                                        audit/M&E visit and expected date of
                                        visit(s)</i></label>
                                <textarea name="external_audit_next_3months" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-sm-12">
                                <label><b>6. External Audits/M&E Visits Completed Last Month</b>
                                    <i>Include details of the body that conducted the external audit, reason(s) for
                                        external audit/M&E visit, the date the
                                        external audit/M&E visit took place and outcome/recommended actions. Share the
                                        action plans with the audit/M&E team and
                                        line manager or provide a date you expect the action plan to be prepared by
                                    </i></label>
                                <textarea name="external_audit_last_month" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-sm-12">
                                <label><b>7. Cases of Misconduct (Fraud, Complaints, Harassment, Child Protection Policy
                                        Violation or Abuse)</b></label>
                                <table>
                                    <tr>
                                        <th style="border:1px solid #ddd;">Incident Type</th>
                                        <th style="border:1px solid #ddd;">Date of Occurrence</th>
                                        <th style="border:1px solid #ddd;">Actions (to be) Taken and Deadline</th>
                                        <th style="border:1px solid #ddd;">Informed IRW? (Yes/No, if yes, who?)</th>
                                    </tr>
                                    <tr>
                                        <td><input name="case_type" type="text" value=""></td>
                                        <td><input name="case_occurrence_date" type="text" value=""></td>
                                        <td><input name="case_actions" type="text" value=""></td>
                                        <td><input name="case_informed_irw" type="text" value=""></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group col-sm-12">
                                <label><b>8. Accidents and Deaths</b></label>
                                <table>
                                    <tr>
                                        <th style="border:1px solid #ddd;">Incident Type</th>
                                        <th style="border:1px solid #ddd;">Date of Occurrence</th>
                                        <th style="border:1px solid #ddd;">Actions (to be) Taken and Deadline</th>
                                        <th style="border:1px solid #ddd;">Informed IRW? (Yes/No, if yes, who?)</th>
                                    </tr>
                                    <tr>
                                        <td><input name="accident_type" type="text" value=""></td>
                                        <td><input name="accident_date" type="text" value=""></td>
                                        <td><input name="accident_actions" type="text" value=""></td>
                                        <td><input name="accident_informed_irw" type="text" value=""></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group col-sm-12">
                                <label><b>9. Any other discussions points (optional)</b></label>
                                <textarea name="aob" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="send" class="btn btn-info" value="Submit Report"
                                    style="float:right" />
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>



@endsection