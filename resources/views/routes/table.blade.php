<table class="table table-responsive" id="routes-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>From</th>
        <th>To</th>
        <th>Starttime</th>
        <th>Endtime</th>
        <th>Busid</th>
        <th>Fare</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($routes as $routes)
        <tr>
            <td>{!! $routes->name !!}</td>
            <td>{!! $routes->from !!}</td>
            <td>{!! $routes->to !!}</td>
            <td>{!! $routes->startTime !!}</td>
            <td>{!! $routes->endTime !!}</td>
            <td>{!! $routes->busID !!}</td>
            <td>{!! $routes->fare !!}</td>
            <td>{!! $routes->status !!}</td>
            <td>
                {!! Form::open(['route' => ['routes.destroy', $routes->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('routes.show', [$routes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('routes.edit', [$routes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>