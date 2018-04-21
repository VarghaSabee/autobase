<table class="table table-responsive" id="availables-table">
    <thead>
        <tr>
            <th>Route Id</th>
        <th>Route Name</th>
        <th>Bus Id</th>
        <th>Bus Plate Number</th>
        <th>Seats</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($availables as $available)
        <tr>
            <td>{!! $available->route_id !!}</td>
            <td>{!! $available->route_name !!}</td>
            <td>{!! $available->bus_id !!}</td>
            <td>{!! $available->bus_plate_number !!}</td>
            <td>{!! $available->seats !!}</td>
            <td>
                {!! Form::open(['route' => ['availables.destroy', $available->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('availables.show', [$available->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('availables.edit', [$available->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>