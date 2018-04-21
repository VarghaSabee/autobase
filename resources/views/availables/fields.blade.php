<!-- Route Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('route_id', 'Route Id:') !!}
    {!! Form::number('route_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Route Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('route_name', 'Route Name:') !!}
    {!! Form::text('route_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Bus Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bus_id', 'Bus Id:') !!}
    {!! Form::number('bus_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Bus Plate Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bus_plate_number', 'Bus Plate Number:') !!}
    {!! Form::text('bus_plate_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Seats Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seats', 'Seats:') !!}
    {!! Form::number('seats', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('availables.index') !!}" class="btn btn-default">Cancel</a>
</div>
