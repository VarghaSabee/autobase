<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<!-- Fare Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fare', 'Fare:') !!}
    {!! Form::number('fare', null, ['class' => 'form-control']) !!}
</div>
<!-- From Field -->
<div class="form-group col-sm-6">
    {!! Form::label('from', 'From:') !!}
    {!! Form::select('from',$buses, null, ['class' => 'form-control start_point']) !!}
</div>

<!-- To Field -->
<div class="form-group col-sm-6">
    {!! Form::label('to', 'To:') !!}
    {!! Form::select('to',$buses, null, ['class' => 'form-control end_point']) !!}
</div>

<!-- Starttime Field -->
<div class="form-group col-sm-6">
    {!! Form::label('startTime', 'Starttime:') !!}
    <div class="input-group date" id="datetimepicker1">
    {!! Form::text('startTime', null, ['class' => 'form-control']) !!}
    <span class="input-group-addon">
        <span class="glyphicon glyphicon-calendar"></span>
    </span>
</div>
</div>
<!-- Endtime Field -->
<div class="form-group col-sm-6">
    {!! Form::label('endTime', 'Endtime:') !!}
    <div class="input-group date" id="datetimepicker2">
        {!! Form::text('endTime', null, ['class' => 'form-control']) !!}
        <span class="input-group-addon">
        <span class="glyphicon glyphicon-calendar"></span>
    </span>
    </div>
</div>

<!-- Busid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('busID', 'Busid:') !!}
    {!! Form::select('busID', $buses, null, array('class' => 'form-control')) !!}
</div>



<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', false) !!}
        {!! Form::checkbox('status', '1', null) !!} &nbsp;
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('routes.index') !!}" class="btn btn-default">Cancel</a>
</div>
<script>

    document.addEventListener("DOMContentLoaded", function(event) {

        var Cities = {!! $cities !!};

        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });

        SetPoints();
        function SetPoints(selected) {
            $('.start_point').empty();
            $('.end_point').empty();
            $('.start_point').append('<option value=""></option>');
            $('.end_point').append('<option value=""></option>');

            for(var i =0; i < Cities.length; i++){
                if (Cities[i].id == selected){
                    $('.start_point').append('<option selected value="' + Cities[i].id + '">' + Cities[i].name + '</option>');

                }else{
                    $('.start_point').append('<option value="' + Cities[i].id + '">' + Cities[i].name + '</option>');
                    $('.end_point').append('<option value="' + Cities[i].id + '">' + Cities[i].name + '</option>');
                }
            }
        }
        $('.start_point').on('change',function (e) {
            e.preventDefault();
            SetPoints($(this).val());
        });
    });

</script>
