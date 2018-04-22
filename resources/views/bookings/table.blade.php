<table class="table table-responsive" id="dataTable">
    <thead>
        <tr>
            <th>Route Ids</th>
        <th>User Id</th>
        <th>Status</th>
        <th>Seats</th>
        <th>Fare</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Route Ids</th>
        <th>User Id</th>
        <th>Status</th>
        <th>Seats</th>
        <th>Fare</th>
        <th>Action</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($bookings as $booking)
        <tr>
            <td>{!! $booking->route_ids !!}</td>
            <td>{!! $booking->user_id !!}</td>
            <td>{!! $booking->status !!}</td>
            <td><i style="font-size: 18px; color: {!! $booking->status ? "#00aa00" : "red" !!};" class="fa fa-credit-card"></i>
                {!!  !$booking->status ? "<i style='font-size: 18px; color: red;' class='fa fa-close'></i>" : "<i style='font-size: 18px; color: #00aa00;' class='fa fa-check'></i>" !!}
                {!! $booking->status ? "Paid" : "Unpaid" !!}
            </td>
            <td>{!! $booking->fare !!}</td>
            <td>
                {!! Form::open(['route' => ['bookings.destroy', $booking->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('bookings.show', [$booking->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>