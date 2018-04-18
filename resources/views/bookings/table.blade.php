<table class="table table-responsive" id="bookings-table">
    <thead>
        <tr>
            <th>Route Ids</th>
        <th>Status</th>
        <th>Seats</th>
        <th>Fare</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($bookings as $booking)
        <tr>
            <td>{!! $booking->route_ids !!}</td>
            <td>{!! $booking->status !!}</td>
            <td>{!! $booking->seats !!}</td>
            <td>{!! $booking->fare !!}</td>
            <td>
                {!! Form::open(['route' => ['bookings.destroy', $booking->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('bookings.show', [$booking->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('bookings.edit', [$booking->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>