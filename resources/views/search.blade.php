@extends('layouts.app')

@section('content')
    <!-- load custom page -->
    <div class="clearfix"></div>

    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="tools-ber">
                        <div class="row form-block">
                            <form action="{{ route('routes.find') }}" method="POST">
                                @csrf
                                <div class="col-xs-12 col-sm-3 col-md-2">
                                    <div class="form-group custom-select">
                                        <select name="start_point" class="select2 form-control start_point" id="" data-placeholder="Start Point">
                                            <option value="" selected="selected"></option>
                                        </select>

                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-2">
                                    <div class="form-group custom-select">
                                        <select name="end_point" class="select2 form-control end_point" id="" data-placeholder="End Point">
                                            <option value="" selected="selected"></option>
                                        </select>

                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-2">
                                    <div class="form-group">
                                        <input type='text' name="date" class='form-control datepicker-here'
                                               data-language='en' placeholder="Date" value="{{ $search->date }}">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-2">
                                    <div class="form-group custom-select">
                                        <select name="fleet_type" class="select2 form-control"
                                                data-placeholder="Fleet Type">
                                            <option value="1" selected="selected">Bus</option>
                                        </select>
                                        <i class="fa fa-car"></i>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-4">
                                    <button type="submit" class="btn btn-block">Find now!</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="tour-inner">
        <div class="container">
            <div class="row m_l_r tour-content">
                <div class="col-sm-12 col-md-12 p_l_r">
                    <div class="search-list-header">
                        <div class="row ">
                            <div class="col-xs-12 col-sm-2 col-md-3">
                                <div class="header-title">Operator</div>
                            </div>
                            <div class="col-xs-12 col-sm-2 col-md-2">
                                <div class="header-title">Departure</div>
                            </div>
                            <div class="col-xs-12 col-sm-2 col-md-1">
                                <div class="header-title">Duration</div>
                            </div>

                            <div class="col-xs-12 col-sm-2 col-md-2">
                                <div class="header-title">Arrival</div>
                            </div>
                            <div class="col-xs-12 col-sm-2 col-md-1">
                                <div class="header-title">Fare</div>
                            </div>
                            <div class="col-xs-12 col-sm-2 col-md-2">
                                <div class="header-title">Operator</div>
                            </div>
                        </div>
                    </div>

                    <div class="search-list">
                        @foreach($routes as $route)
                            <?php
                            $start = new DateTime($route->startTime);
                            $end = new DateTime($route->endTime);
                            $diff = $start->diff($end);
                            ?>
                            <div class="row">
                                <div class="col-xs-12 col-sm-2 col-md-3">
                                    <div class="operator-type">
                                        <h4 class="operator-name">{!! $route->name !!}</h4>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-2 col-md-2">
                                    <div class="dep-time-counter">
                                        <div class="dep-time">{!!date_format(date_create($route->startTime),'H:i') !!}</div>
                                        <div class="dep-counter">{!! $city[$route->from]->name !!}</div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-2 col-md-1">
                                    <div class="duration-inner">
                                        <div class="duration">{!! $diff->format("%h:%I") !!} Hours</div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-2 col-md-2">
                                    <div class="arr-time-counter">
                                        <div class="arr-time">{!!date_format(date_create($route->endTime),'H:i') !!}</div>
                                        <div class="arr-counter">{!! $city[$route->to]->name !!}</div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-2 col-md-1">
                                    <div class="starting-price">
                                        <div class="price">{!! $route->fare !!}</div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-2 col-md-2">
                                    <div class="seat-view">

                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                                data-target="#myModal"
                                                data-trip-route-id="{!! $route->id !!}"
                                                data-trip-id-no="{!! $route->id !!}"
                                                data-fleet-registration-id="{!! $route->id !!}"
                                                data-fleet-type-id="1"
                                                data-from="{!! $city[$route->from]->name !!}"
                                                data-from_id="{!! $route->from !!}"
                                                data-to="{!! $city[$route->to]->name !!}"
                                                data-to_id="{!! $route->to !!}"
                                                data-booking-date="{{ date('Y-m-d H:i:s') }}"
                                        >Book
                                        </button>

                                        <div class="reating">
                                            <i class="fa fa-star"></i>
                                        </div>

                                        <div class="seat-number">
                                            {!! $seats[$route->id]->seats !!} Seats Available
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- ----------------------------------------------------------------
    ----------------------------------------------------------------------
    ---------------------------------------------------------------------- -->


    <!--Start modal-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>

                    <div id="outputPreview" class="alert hide modal-title" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-5 col-xs-12">
                            <div class="price-details">
                                <div class="seatsList"></div>
                            </div>

                            <div class="seat-details">
                                <div class="seat-details-content col-xs-4">
                                    <div class="seat selected">
                                        <div class="seat-body">
                                            <span class="seat-handle-left"></span>
                                            <span class="seat-handle-right"></span>
                                            <span class="seat-bottom"></span>
                                        </div>
                                    </div>
                                    <span>Selected Seat</span>
                                </div>
                                <div class="seat-details-content col-xs-4">
                                    <div class="seat occupied">
                                        <div class="seat-body">
                                            <span class="seat-handle-left"></span>
                                            <span class="seat-handle-right"></span>
                                            <span class="seat-bottom"></span>
                                        </div>
                                    </div>
                                    <span>Available Seat</span>
                                </div>
                                <div class="seat-details-content col-xs-4">
                                    <div class="seat ladies">
                                        <div class="seat-body">
                                            <span class="seat-handle-left"></span>
                                            <span class="seat-handle-right"></span>
                                            <span class="seat-bottom"></span>
                                        </div>
                                    </div>
                                    <span>Booked Seat</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-7 col-xs-12">
                            <form action="{{ route('bookings.register') }}"
                                  class="price-details" id="bookingFrm" method="post" accept-charset="utf-8">
                                @csrf
                                <div class="form-group">
                                    <label for="pickup_location">Pickup Location</label>
                                    <select name="pickup_location" id="pickup_location" class="select2 location"
                                            style="width:100%"></select>
                                </div>
                                <div class="form-group">
                                    <label for="drop_location">Drop Location</label>
                                    <select name="drop_location" id="drop_location" class="select2 location"
                                            style="width:100%"></select>
                                </div>

                                <div class="form-group">
                                    <label for="facilities">Request Facilities</label>
                                    <div id="facilities"></div>
                                </div>
                                <div class="table-responsive ">
                                    <table class="table table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <td class="text-right" style="width: 30%;">Seat(s)</td>
                                            <th id="seatPreview">---</th>
                                        </tr>
                                        <tr>
                                            <td class="text-right">Price</td>
                                            <th id="pricePreview">0</th>
                                        </tr>
                                        <tr>
                                            <td class="text-right">Total</td>
                                            <th id="totalPreview">0</th>
                                        </tr>
                                        <tr>
                                            <td class="text-right">Discount</td>
                                            <th id="discountPreview">0</th>
                                        </tr>
                                        <tr>
                                            <td class="text-right"><b>Grand Total</b></td>
                                            <th id="grandTotalPreview">0</th>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <input type="hidden" name="trip_route_id"/>
                                    <input type="hidden" name="fleet_registration_id"/>
                                    <input type="hidden" name="trip_id_no"/>
                                    <input type="hidden" name="fleet_type_id"/>
                                    <input type="hidden" name="total_seat"/>
                                    <input type="hidden" name="seat_number"/>
                                    <input type="hidden" name="price"/>
                                    <input type="hidden" name="offer_code"/>
                                    <input type="hidden" name="discount"/>
                                    <input type="hidden" name="booking_date"/>

                                </div>
                                <button class="btn btn-block">Continue</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->



    <script type="text/javascript">
        $(document).ready(function () {
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });


            /*
            *------------------------------------------------------
            * Modal on show event
            * @function: findBookingInformation()
            * @return  : location, facilities, seatsList
            *------------------------------------------------------
            */
            var TOTAL = 0;
               var trip_id_no = $('input[name=trip_id_no]');
               var trip_route_id = $('input[name=trip_route_id]');
               var fleet_registration_id = $('input[name=fleet_registration_id]');
               var fleet_type_id = $('input[name=fleet_type_id]');
               var total_seat = $('input[name=total_seat]');
               var seat_number = $('input[name=seat_number]');
               var price = $('input[name=price]');
               var offer_code = $('input[name=offer_code]');
               var discount = $('input[name=discount]');
               var booking_date = $('input[name=booking_date]');
               var seatPreview = $('#seatPreview');
               var pricePreview = $('#pricePreview');
               var totalPreview = $('#totalPreview');
               var discountPreview = $('#discountPreview');
               var grandTotalPreview = $('#grandTotalPreview');
               var outputPreview = $('#outputPreview');
               //reset trip information with modal hidden
               $("#myModal").on('hidden.bs.modal', function (event) {
                   trip_id_no.val('');
                   trip_route_id.val('');
                   fleet_registration_id.val('');
                   fleet_type_id.val('');
                   total_seat.val('');
                   seat_number.val('');
                   price.val('');
                   offer_code.val('');
                   discount.val('');
                   booking_date.val('');
                   seatPreview.html('---');
                   pricePreview.html('0');
                   totalPreview.html('0');
                   discountPreview.html('0');
                   grandTotalPreview.html('0');
                   outputPreview.addClass('hide').removeClass('alert-success').removeClass('alert-danger').html('');
                   history.go(0);
               });


               /*
               *------------------------------------------------------
               * New Booking
               * @function: findOfferByCode
               * @return: discount
               *------------------------------------------------------
               */

//               var frm = $("#bookingFrm");
//               frm.on('submit', function (e) {
//                   e.preventDefault();
//                   $.ajax({
//                       url: $(this).attr('action'),
//                       method: $(this).attr('method'),
//                       dataType: 'json',
//                       data: frm.serialize(),
//                       success: function (data) {
//                           if (data.status == true) {
//                               // outputPreview.empty().html(data.message).addClass('alert-success').removeClass('alert-danger').removeClass('hide');
//                               $('.modal-body').html(data.payment);
//                           } else {
//                               outputPreview.empty().html(data.exception).addClass('alert-danger').removeClass('alert-success').removeClass('hide');
//                           }
//                       },
//                       error: function (xhr) {
//                           alert('test!');
//                       }
//                   });
//               });

               //show trip information with modal shown
               $('#myModal').on('shown.bs.modal', function (event) {
                   var button = $(event.relatedTarget);
                   var modal = $(this);

                   $.ajax({
                       url: '{!! route('bookings.ajax') !!}',
                       method: 'post',
                       dataType: 'json',
                       data: {
                           'csrf_test_name': 'b951c319f3cbce0a11e979a4da0895f4',
                           'trip_route_id': button.data('trip-route-id'),
                           'trip_id_no': button.data('trip-id-no'),
                           'fleet_registration_id': button.data('fleet-registration-id'),
                           'fleet_type_id': button.data('fleet-type-id'),
                           'from': button.data('from'),
                           'from_id': button.data('from_id'),
                           'to': button.data('to'),
                           'to_id': button.data('to_id'),
                           'booking_date': button.data('booking-date')
                       },
                       success: function (data) {
                           modal.find('.modal-body input[name=trip_id_no]').val(data.trip_id_no);
                           modal.find('.modal-body input[name=trip_route_id]').val(data.trip_route_id);
                           modal.find('.modal-body input[name=fleet_registration_id]').val(data.fleet_registration_id);
                           modal.find('.modal-body input[name=fleet_type_id]').val(data.fleet_type_id);
                           modal.find('.modal-body input[name=booking_date]').val(data.booking_date);
                           //modal.find('.modal-body .location').html(data.location);
                           modal.find('.modal-body #pickup_location').html(data.pickup);
                           modal.find('.modal-body #drop_location').html(data.drop);
                           modal.find('.modal-body #facilities').html(data.facilities);
                           modal.find('.modal-body .seatsList').html(data.seats);
                       },
                       error: function (xhr) {
                           alert('failed!');
                       }
                   });

               });


               /*
               *------------------------------------------------------
               * Choose seat(s)
               * @function: findPriceBySeat
               * @return : selected seat(s), price and group price
               *------------------------------------------------------
               */

               $('body').on('click', '.ChooseSeat', function () {
                   var seat = $(this);

                   if (seat.attr('data-item') != "selected") {
                       seat.removeClass('occupied').addClass('selected').attr('data-item', 'selected');
                   } else if (seat.attr('data-item') == "selected") {
                       seat.removeClass('selected').addClass('occupied').attr('data-item', '');
                   }

                   //reset seat serial for each click
                   var seatSerial = "";
                   var countSeats = 0;

                   $("div[data-item=selected]").each(function (i, x) {
                       countSeats = i + 1;
                       seatSerial += $(this).text().trim() + ", ";
                   });


                   total_seat.val(countSeats);
                   seat_number.val(seatSerial);
                   seatPreview.html(seatSerial);

                   //#---------price selection --------------

                   $.ajax({
                       url: '{!! route('bookings.seat.info') !!}',
                       method: 'post',
                       dataType: 'json',
                       data:
                           {
                               'csrf_test_name': 'b951c319f3cbce0a11e979a4da0895f4',
                               'trip_route_id': trip_route_id.val(),
                               'fleet_type_id': fleet_type_id.val(),
                               'total_seat': countSeats
                           },
                       success: function (data) {
                           if (data.status == true) {
                               TOTAL += data.price;
                               price.val(data.total);
                               pricePreview.html(data.price);
                               totalPreview.html(TOTAL);
                               grandTotalPreview.html(TOTAL);
                               outputPreview.addClass("hide").html('');
                           } else {
                               price.val('0');
                               totalPreview.html('0');
                               grandTotalPreview.html('0');
                               //outputPreview.removeClass("hide").addClass('alert-danger').html(data.exception);
                           }
                       },
                       error: function (xhr) {
                           alert('failed!');
                       }
                   });
               });



        });
    </script>


    <!-- load messages -->
    <div id="output" class="hide col-sm-12 alert"></div>
@endsection
