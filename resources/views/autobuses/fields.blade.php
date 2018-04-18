<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Platenumber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('plateNumber', 'Platenumber:') !!}
    {!! Form::text('plateNumber', null, ['class' => 'form-control']) !!}
</div>

<!-- Seats Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seats', 'Seats:') !!}
    {!! Form::text('seats', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', false) !!}
        {!! Form::checkbox('status', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('autobuses.index') !!}" class="btn btn-default">Cancel</a>
</div>
