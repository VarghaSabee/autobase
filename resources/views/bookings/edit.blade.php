@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>
            Booking
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($booking, ['route' => ['bookings.update', $booking->id], 'method' => 'patch']) !!}

                        @include('bookings.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection