@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>
            Drivers
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($drivers, ['route' => ['drivers.update', $drivers->id], 'method' => 'patch']) !!}

                        @include('drivers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection