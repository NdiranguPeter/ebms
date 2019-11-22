<hr>
<h5><b>Sector Impact Target</b></h5>
<br>
<div class="form-group">

    <table id="dynamicTable">
        <tr>
            <td style="width:40%;">
                {{Form::label('global_goal', 'Global Goal')}}
                <select name="g[0][global_goal]" class="form-control">
                    <option value="Reducing the humanitarian impact on conflicts and natural disasters">
                        Reducing the humanitarian impact on conflicts and natural
                        disasters
                    </option>
                    <option value="Empowering community to emerge from poverty and vulnerability">
                        Empowering community to emerge from poverty and vulnerability</option>

                </select>
            </td>
            <td>
                <label for="split" class="col-md-4 col-form-label text-md-right">{{ __('% Split') }}</label>
                <input type="text" class="form-control" name="s[0][globalgoal_split]" value="">
            </td>
            <td style="vertical-align: bottom;"><button type="button" name="add" id="add"
                    class="btn btn-success">+</button></td>
        </tr>
    </table>

</div>
<div class="form-group">

    <table id="dynamicTable2">

        <tr>
            <td style="width:40%;" class="sectors">
                {{Form::label('sector', 'Project Sector')}}
                <select name="c[0][sector]" class="form-control">
                    @foreach ($sectors as $sector)
                    <option value={{$sector->name}}>{{$sector->name}}</option>
                    @endforeach
                </select>

            </td>
            <td class="splits">
                <label for="split" class="col-md-4 col-form-label text-md-right">{{ __('% Split') }}</label>
                <input id="split" type="text" class="form-control @error('split') is-invalid @enderror"
                    name="p[0][sector_split]" value="">
            </td>

            <td style="vertical-align: bottom;"><button type="button" name="add2" id="add2"
                    class="btn btn-success">+</button></td>


        </tr>


    </table>

</div>


<div class="form-group">

    <table id="dynamicTable3">
        <tr>
            <td style="width:40%;">
                {{Form::label('sdg', 'Target SDGs')}}
                <select name="d[0][sdg]" id="sdg" class="form-control @error('sdg') is-invalid @enderror">
                    <option value="No Poverty">No Poverty</option>
                    <option value="Zero Hunger">Zero Hunger</option>
                    <option value="Good Health and Well-being">Good Health and Well-being
                    </option>
                    <option value="Quality Education">Quality Education</option>
                    <option value="Gender Equality">Gender Equality</option>
                    <option value="Clean Water and Sanitation">Clean Water and Sanitation
                    </option>
                    <option value="Affordable and Clean Energy">Affordable and Clean Energy
                    </option>
                    <option value="Decent Work and Economic Growth">Decent Work and Economic
                        Growth
                    </option>
                    <option value="Industry, Innovation and Infrastructure"> Industry,
                        Innovation and Infrastructure</option>
                    <option value="Reduced Inequality">Reduced Inequality
                    </option>
                    <option value="Sustainable Cities and Communities">Sustainable Cities and
                        Communities</option>
                    <option value="Responsible Consumption and Production"> Responsible
                        Consumption and Production</option>
                    <option value="Climate Action">Climate Action</option>
                    <option value="Life Below Water">Life Below Water
                    </option>
                    <option value="Life on Land">Life on Land</option>
                    <option value="Peace and Justice Strong Institutions">Peace and Justice
                        Strong Institutions</option>
                    <option value="Partnerships to achieve the Goal">Partnerships to achieve the
                        Goal
                    </option>

                </select>
            </td>
            <td>
                <label for="split" class="col-md-4 col-form-label text-md-right">{{ __('% Split') }}</label>
                <input id="split" type="text" class="form-control @error('split') is-invalid @enderror"
                    name="r[0][sdg_split]" value="">

            </td>
            <td style="vertical-align: bottom;"><button type="button" name="add3" id="add3"
                    class="btn btn-success">+</button>
            </td>
        </tr>
    </table>


</div>
<hr>