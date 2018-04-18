@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>
            Routes
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($routes, ['route' => ['routes.update', $routes->id], 'method' => 'patch']) !!}

                        @include('routes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection