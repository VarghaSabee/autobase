@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>
            Autobuses
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($autobuses, ['route' => ['autobuses.update', $autobuses->id], 'method' => 'patch']) !!}

                        @include('autobuses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection