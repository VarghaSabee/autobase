<table class="table table-responsive" id="dataTable">
    <thead>
        <tr>
            <th>Name</th>
        <th>Email</th>
        <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($admins as $admins)
        <tr>
            <td>{!! $admins->name !!}</td>
            <td>{!! $admins->email !!}</td>
            <td>{!! $admins->image !!}</td>
            <td>
                {!! Form::open(['route' => ['admins.destroy', $admins->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admins.show', [$admins->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admins.edit', [$admins->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>