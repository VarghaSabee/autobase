@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Available
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($available, ['route' => ['availables.update', $available->id], 'method' => 'patch']) !!}

                        @include('availables.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection