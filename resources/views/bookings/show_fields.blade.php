<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $booking->id !!}</p>
</div>

<!-- Route Ids Field -->
<div class="form-group">
    {!! Form::label('route_ids', 'Route Ids:') !!}
    <p>{!! $booking->route_ids !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $booking->status !!}</p>
</div>

<!-- Seats Field -->
<div class="form-group">
    {!! Form::label('seats', 'Seats:') !!}
    <p>{!! $booking->seats !!}</p>
</div>

<!-- Fare Field -->
<div class="form-group">
    {!! Form::label('fare', 'Fare:') !!}
    <p>{!! $booking->fare !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $booking->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $booking->updated_at !!}</p>
</div>

