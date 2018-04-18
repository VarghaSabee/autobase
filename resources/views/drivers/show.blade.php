@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>
            Drivers
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('drivers.show_fields')
                    <a href="{!! route('drivers.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
