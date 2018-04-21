@extends('layouts.app')

@section('content')
    <div class="row" style="background-color: transparent;">
        <div class="col-sm-12 col-md-12">
            <div class="panel lobidrag">

                <div class="panel-body" style="min-height: 50vh;">
                    @include('flash::message')
                    <div class="">
                        <table class="datatable2 table table-bordered ">
                            <thead>
                            <tr>
                                <th>SL No.</th>
                                <th>Route Name</th>
                                <th>Date</th>
                                <th>Total Seat</th>
                                <th>Price</th>
                                <th>Seat Number</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>SL No.</th>
                                <th>Route Name</th>
                                <th>Date</th>
                                <th>Total Seat</th>
                                <th>Price</th>
                                <th>Seat Number</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                @foreach($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->id }}</td>
                                        <td>{{ $booking->route_name }}</td>
                                        <td>{{ $booking->created_at }}</td>
                                        <td>{{ count(explode(',',$booking->seats)) }}</td>
                                        <td>{{ $booking->fare }}</td>
                                        <td>{{ $booking->seats }}</td>
                                        <td><i style="font-size: 18px; color: {!! $booking->status ? "#00aa00" : "red" !!};" class="fa fa-credit-card"></i>
                                            {!!  !$booking->status ? "<i style='font-size: 18px; color: red;' class='fa fa-close'></i>" : "<i style='font-size: 18px; color: #00aa00;' class='fa fa-check'></i>" !!}
                                            {!! $booking->status ? "Paid" : "Unpaid" !!}
                                        </td>
                                        <td>
                                            @if(!$booking->status)
                                            <div class='btn-group' style="float: left;">
                                            <a title="PayPal" style="margin-right: 15px;" href="{!! route('paypal', [$booking->id]) !!}" class='btn btn-primary btn-xs'><i style="font-size: 14px" class="glyphicon glyphicon-credit-card"></i></a>
                                            </div>
                                            {!! Form::open(['route' => ['bookings.destroy', $booking->id], 'method' => 'delete']) !!}
                                            <div class='btn-group'>
                                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                            </div>
                                            {!! Form::close() !!}
                                                @endif
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {

            $('.datatable2').DataTable({
                "pagingType": "full_numbers",
                responsive: true,
                dom: "<'row'<'col-sm-8'B><'col-sm-4'f>>tp",
                buttons: [
                    {extend: 'copy', className: 'btn-sm'},
                    {extend: 'csv', title: 'ExampleFile', className: 'btn-sm'},
                    {extend: 'excel', title: 'ExampleFile', className: 'btn-sm', title: 'exportTitle'},
                    {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
                    {extend: 'print', className: 'btn-sm'}
                ]
            });

        });
    </script>
@endsection
