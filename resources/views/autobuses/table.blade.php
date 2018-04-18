<table class="table table-responsive" id="autobuses-table">
    <thead>
        <tr>
            <th>Type</th>
        <th>Platenumber</th>
        <th>Seats</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($autobuses as $autobuses)
        <tr>
            <td>{!! $autobuses->type !!}</td>
            <td>{!! $autobuses->plateNumber !!}</td>
            <td>{!! $autobuses->seats !!}</td>
            <td>{!! $autobuses->status !!}</td>
            <td>
                {!! Form::open(['route' => ['autobuses.destroy', $autobuses->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('autobuses.show', [$autobuses->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('autobuses.edit', [$autobuses->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>