<style>
    .cdcc td {
        height: 75px;
    }

    .cdcc>tbody>tr>td,
    .cdcc>tbody>tr>th,
    .cdcc>tfoot>tr>td,
    .cdcc>tfoot>tr>th,
    .cdcc>thead>tr>td,
    .cdcc>thead>tr>th {
        padding: 0px;
        line-height: 1.42857143;
        vertical-align: top;
        border-top: 1px solid #bfdeec
    }
</style>
<table class="table table-bordered">
    <tr>
        <td>Project name: </td>
        <td colspan="3"> {{$project->name}} </td>
    </tr>
    @php
    $total = 0;
    $target_total = 0;
    @endphp
    @foreach ($indicatorsafter as $indicatorafter)
    @php
    if($month == 'January'){
    $total = $indicatorafter->jan;
    }
    if($month == 'February'){
    $total = $indicatorafter->jan + $indicatorafter->feb;
    }
    if($month == 'March'){
    $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar;
    }
    if($month == 'April'){
    $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr;
    }
    if($month == 'May'){
    $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
    $indicatorafter->may;
    }
    if($month == 'June'){
    $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
    $indicatorafter->may + $indicatorafter->jun;
    }if($month == 'July'){
    $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
    $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul;
    }if($month == 'August'){
    $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
    $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug;
    }if($month == 'September'){
    $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
    $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug +
    $indicatorafter->sep;
    }if($month == 'October'){
    $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
    $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep
    + $indicatorafter->oct;
    }if($month == 'November'){
    $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
    $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep
    +
    $indicatorafter->oct + $indicatorafter->nov;
    }
    if($month == 'December'){
    $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
    $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug + $indicatorafter->sep
    +
    $indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec;
    }
    @endphp
    @endforeach
    <tr>
        <td>Total Budget </td>
        <td>{{$project->budget}}</td>
        <td>Total female reached</td>
        <td>{{$total}}</td>
    </tr>
    <tr>
        <td>Reporting month</td>
        <td> {{$month}} </td>
        <td>Total male reached</td>

        <td> {{$total}} </td>
    </tr>
    <tr>
        <td>Expenditure for this month</td>
        <td>
            @php
            $exp = 0;
            @endphp
            @foreach ($indicatorsafter as $indicatorafter)
            @php
            $exp = $exp++;
            @endphp
            @endforeach

            {{$exp}}
        </td>
        <td>Total beneficiaries served</td>
        <td>{{$total}}</td>
    </tr>
    <tr>
        <td colspan="4">
            <b>Overall perfomance</b>
            @foreach ($outputindicators as $outputindicator)
            @php
            $target_total = $target_total + $outputindicator->project_target;
            @endphp
            @endforeach
            @foreach ($outputs as $output)
            @foreach ($outputindicators as $outputindicator)
            @if ($output->id == $outputindicator->output_id)
            @foreach ($indicatorsafter as $indicatorafter)
            @if ($outputindicator->id == $indicatorafter->indicator_id)
            @php
            if($month == 'January'){
            $total = $indicatorafter->jan;
            }
            if($month == 'February'){
            $total = $indicatorafter->jan + $indicatorafter->feb;
            }
            if($month == 'March'){
            $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar;
            }
            if($month == 'April'){
            $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr;
            }
            if($month == 'May'){
            $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
            $indicatorafter->may;
            }
            if($month == 'June'){
            $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
            $indicatorafter->may + $indicatorafter->jun;
            }if($month == 'July'){
            $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
            $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul;
            }if($month == 'August'){
            $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
            $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug;
            }if($month == 'September'){
            $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
            $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug +
            $indicatorafter->sep;
            }if($month == 'October'){
            $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
            $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug +
            $indicatorafter->sep
            + $indicatorafter->oct;
            }if($month == 'November'){
            $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
            $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug +
            $indicatorafter->sep
            +
            $indicatorafter->oct + $indicatorafter->nov;
            }
            if($month == 'December'){
            $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
            $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug +
            $indicatorafter->sep
            +
            $indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec;
            }
            $perc=$total/$target_total;
            if ($perc <25) { $color='red' ; } if ($perc> 24 && $perc <50) { $color='yellow' ; } if ($perc> 49 && $perc
                    <75) { $color='blue' ; } if ($perc> 74) {
                        $color = 'green';
                        }
                        @endphp

                        @endif
                        @endforeach
                        @endif
                        @endforeach
                        @endforeach

                        <div
                            style="font-weight: bold; font-size: xx-large; border:1px solid #fff; color:#fff; padding:0px 0px 0px 10px; background-color:{{$color}}">
                            {{sprintf('%0.4f', $perc)}}%
                        </div>
        </td>
    </tr>
</table>

<h2>SECTION 1. TECHNICAL ACCOMPLISHMENT AGAINST PLAN DURING THE MONTH</h2>
<table class="cdcc table table-bordered">
    <tr style="background: #349ba7 !important;color: #fff;">
        <th style="max-width:200px;">Outputs</th>
        <th style="max-width:600px;">Indicator description</th>
        <th>Value at start</th>
        <th>Total targeted for the month</th>
        <th>Achievement for the month of {{$month}}</th>
        <th>RYBG</th>
    </tr>
    @php
    $i = 1;
    @endphp
    @foreach ($outputs as $output)

    <tr style="font-size: smaller;">
        <td style="max-width:200px;">output {{$i}} - {!!$output->name!!} </td>

        <td style="max-width:600px;">
            <table class="table">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outputindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{!!$outputindicator->name!!}</td>
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
            </table>
        </td>
        <td>
            <table class="table" id="liss">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outputindicator->id == $indicatorafter->indicator_id)
                <tr>
                    <td>{{$outputindicator->baseline_target}}</td>
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
            </table>
        </td>
        <td>
            <table class="table" id="liss">
                @foreach ($outputindicators as $outputindicator)
                @if ($output->id == $outputindicator->output_id)
                @foreach ($indicatorsafter as $indicatorafter)
                @if ($outputindicator->id == $indicatorafter->indicator_id)
                @php
                if($month == 'January'){
                $total = $indicatorafter->jan;
                $tmt = $outputindicator->project_target/12;
                }
                if($month == 'February'){
                $total = $indicatorafter->jan + $indicatorafter->feb;
                $tmt = $outputindicator->project_target*2/12;
                }
                if($month == 'March'){
                $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar;
                $tmt = $outputindicator->project_target*3/12;
                }
                if($month == 'April'){
                $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr;
                $tmt = $outputindicator->project_target*4/12;
                }
                if($month == 'May'){
                $tmt = $outputindicator->project_target*5/12;
                $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
                $indicatorafter->may;
                }
                if($month == 'June'){
                $tmt = $outputindicator->project_target*6/12;
                $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
                $indicatorafter->may + $indicatorafter->jun;
                }if($month == 'July'){
                $tmt = $outputindicator->project_target*7/12;
                $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
                $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul;
                }if($month == 'August'){
                $tmt = $outputindicator->project_target*8/12;
                $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
                $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug;
                }if($month == 'September'){
                $tmt = $outputindicator->project_target*9/12;
                $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
                $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug +
                $indicatorafter->sep;
                }if($month == 'October'){
                $tmt = $outputindicator->project_target*10/12;
                $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
                $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug +
                $indicatorafter->sep
                + $indicatorafter->oct;
                }if($month == 'November'){
                $tmt = $outputindicator->project_target*11/12;
                $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
                $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug +
                $indicatorafter->sep
                +
                $indicatorafter->oct + $indicatorafter->nov;
                }
                if($month == 'December'){
                $tmt = $outputindicator->project_target;
                $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
                $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug +
                $indicatorafter->sep
                +
                $indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec;
                }

                if($tmt < 1){ $tmt=1; } @endphp <tr>
        <td>{{sprintf('%0.0f', $tmt)}}</td>
    </tr>

    @endif
    @endforeach
    @endif
    @endforeach
</table>
</td>
<td>
    <table class="cdcc table" id="liss">
        @foreach ($outputindicators as $outputindicator)
        @if ($output->id == $outputindicator->output_id)
        @foreach ($indicatorsafter as $indicatorafter)
        @if ($outputindicator->id == $indicatorafter->indicator_id)
        @php
        if($month == 'January'){
        $total = $indicatorafter->jan;
        }
        if($month == 'February'){
        $total = $indicatorafter->jan + $indicatorafter->feb;
        }
        if($month == 'March'){
        $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar;
        }
        if($month == 'April'){
        $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr;
        }
        if($month == 'May'){
        $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may;
        }
        if($month == 'June'){
        $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may + $indicatorafter->jun;
        }if($month == 'July'){
        $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul;
        }if($month == 'August'){
        $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug;
        }if($month == 'September'){
        $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug +
        $indicatorafter->sep;
        }if($month == 'October'){
        $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug +
        $indicatorafter->sep
        + $indicatorafter->oct;
        }if($month == 'November'){
        $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug +
        $indicatorafter->sep
        +
        $indicatorafter->oct + $indicatorafter->nov;
        }
        if($month == 'December'){
        $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug +
        $indicatorafter->sep
        +
        $indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec;
        }
        @endphp
        <tr>
            <td>
                {{$total}}
            </td>
        </tr>
        @endif
        @endforeach
        @endif
        @endforeach
    </table>
</td>
<td>
    <table class="table cdcc" style="border-collapse: separate;
    border-spacing: 0 1px;">

        @foreach ($outputindicators as $outputindicator)
        @if ($output->id == $outputindicator->output_id)
        @foreach ($indicatorsafter as $indicatorafter)
        @if ($outputindicator->id == $indicatorafter->indicator_id)
        @php
        if($month == 'January'){
        $total = $indicatorafter->jan;
        $tmt = $outputindicator->project_target/12;
        }
        if($month == 'February'){
        $total = $indicatorafter->jan + $indicatorafter->feb;
        $tmt = $outputindicator->project_target*2/12;
        }
        if($month == 'March'){
        $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar;
        $tmt = $outputindicator->project_target*3/12;
        }
        if($month == 'April'){
        $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr;
        $tmt = $outputindicator->project_target*4/12;
        }
        if($month == 'May'){
        $tmt = $outputindicator->project_target*5/12;
        $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may;
        }
        if($month == 'June'){
        $tmt = $outputindicator->project_target*6/12;
        $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may + $indicatorafter->jun;
        }if($month == 'July'){
        $tmt = $outputindicator->project_target*7/12;
        $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul;
        }if($month == 'August'){
        $tmt = $outputindicator->project_target*8/12;
        $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug;
        }if($month == 'September'){
        $tmt = $outputindicator->project_target*9/12;
        $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug +
        $indicatorafter->sep;
        }if($month == 'October'){
        $tmt = $outputindicator->project_target*10/12;
        $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug +
        $indicatorafter->sep
        + $indicatorafter->oct;
        }if($month == 'November'){
        $tmt = $outputindicator->project_target*11/12;
        $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug +
        $indicatorafter->sep
        +
        $indicatorafter->oct + $indicatorafter->nov;
        }
        if($month == 'December'){
        $tmt = $outputindicator->project_target;
        $total = $indicatorafter->jan + $indicatorafter->feb + $indicatorafter->mar + $indicatorafter->apr +
        $indicatorafter->may + $indicatorafter->jun + $indicatorafter->jul + $indicatorafter->aug +
        $indicatorafter->sep
        +
        $indicatorafter->oct + $indicatorafter->nov + $indicatorafter->dec;
        }

        if($tmt < 1){ $tmt=1; } $perc=($total/$tmt)*100; if ($perc <25) { $color='red' ; } if ($perc> 24 && $perc
            <50) { $color='yellow' ; } if ($perc> 49 && $perc
                <75) { $color='blue' ; } if ($perc> 74) {
                    $color = 'green';
                    }
                    @endphp
                    <tr>
                        <td style="background-color:{{$color}}; vertical-align: middle; color: white;">
                            <span style="font-weight:bold; ">{{sprintf('%0.2f', $perc)}}%</span>
                        </td>
                    </tr>

                    @endif
                    @endforeach
                    @endif
                    @endforeach
    </table>
</td>
</tr>
@php
$i++;
@endphp
@endforeach

</table>
<hr>
<h2>Section 2: Major challenges and solutions</h2>
<hr>
<table class="table table-bordered">
    <thead>
        <tr style="background: #349ba7 !important;color: #fff;">
            <th>Challenge</th>
            <th>Solution</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($challenges as $challenge)
        <tr>
            <td>{{$challenge->challenge}}</td>
            <td>{{$challenge->solution}}</td>
        </tr>
        @endforeach

    </tbody>
</table>
<hr>
<h2>Section 3: Plan for next month</h2>
<hr>
<table class="table table-bordered">
    <thead>
        <tr style="background: #349ba7 !important;color: #fff;">
            <th>#</th>
            <th>Output code</th>
            <th>Indicator</th>
            <th>Unit</th>
            <th>Target at Baseline</th>
            <th>Target for next month</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>