<table class="table table-responsive" id="drivers-table">
    <thead>
        <tr>
            <th>Firstname</th>
        <th>Lastname</th>
        <th>Busid</th>
        <th>Telephone</th>
        <th>Email</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($drivers as $drivers)
        <tr>
            <td>{!! $drivers->firstName !!}</td>
            <td>{!! $drivers->lastName !!}</td>
            <td>{!! $drivers->busID !!}</td>
            <td>{!! $drivers->telephone !!}</td>
            <td>{!! $drivers->email !!}</td>
            <td>
                {!! Form::open(['route' => ['drivers.destroy', $drivers->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('drivers.show', [$drivers->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('drivers.edit', [$drivers->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>