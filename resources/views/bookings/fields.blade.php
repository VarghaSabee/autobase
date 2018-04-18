<!-- Route Ids Field -->
<div class="form-group col-sm-6">
    {!! Form::label('route_ids', 'Route Ids:') !!}
    {!! Form::text('route_ids', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', false) !!}
        {!! Form::checkbox('status', '1', null) !!} 1
    </label>
</div>

<!-- Seats Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seats', 'Seats:') !!}
    {!! Form::text('seats', null, ['class' => 'form-control']) !!}
</div>

<!-- Fare Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fare', 'Fare:') !!}
    {!! Form::text('fare', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('bookings.index') !!}" class="btn btn-default">Cancel</a>
</div>
