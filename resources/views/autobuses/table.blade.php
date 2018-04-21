<table class="table table-responsive" id="dataTable">
    <thead>
        <tr>
            <th>Type</th>
        <th>Platenumber</th>
        <th>Seats</th>
        <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Type</th>
        <th>Platenumber</th>
        <th>Seats</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($autobuses as $autobuses)
        <tr>
            <td>{!! $autobuses->type !!}</td>
            <td>{!! $autobuses->plateNumber !!}</td>
            <td>{!! $autobuses->seats !!}</td>
            <td><i style="color: #{!! $autobuses->status ? "00DD00" : "FF0000" !!};" class="fa fa-{{ $autobuses->status ? "check" : "close" }}"></i></td>
            <td>
                {!! Form::open(['route' => ['autobuses.destroy', $autobuses->id], 'method' => 'delete']) !!}
                <div class='btn-group' style="float: left;">
                    <a href="{!! route('autobuses.show', [$autobuses->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('autobuses.edit', [$autobuses->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
                {!! Form::open(['route' => ['autobuses.status', $autobuses->id], 'method' => 'get']) !!}
                <div class='btn-group' style="float: left;">
                    <?php
                    $icon = !$autobuses->status ? "check" : "close";
                    ?>
                    {!! Form::button('<i class="fa fa-'.$icon.'"></i>', ['type' => 'submit', 'class' => 'btn btn-primary btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>