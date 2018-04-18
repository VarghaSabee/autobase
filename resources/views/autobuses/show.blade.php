@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>
            Autobuses
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('autobuses.show_fields')
                    <a href="{!! route('autobuses.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
