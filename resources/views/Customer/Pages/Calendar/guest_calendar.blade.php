@extends('layouts.app_customer')
@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content pt-3" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10" id="external-events" >
                    <div class="card">
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div><!-- /.card-body -->
                    </div><!-- /.row -->
                </div>
                <div class="col-md-1"></div>
            </div>
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div>


<script type="text/javascript">
	$('#cal').addClass('c_active');
</script>

<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (https://fullcalendar.io/docs/event-object)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }
        $(this).data('eventObject', eventObject)

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
   //  var Draggable = FullCalendar.Draggable;
    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        start: '',
        center: 'title',
        end : 'prev,next'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: [
        @if (count($bookings) > 0)
            @foreach ($bookings as $booking)
              @php
                $book_title = '';
                $color = '';
                switch ($booking->book_from) {
                  case "hall":
                    $book_title = $booking->function_hall_description . " ( ";
                    $book_title .= $booking->book_start_date . " - ";
                    $book_title .= $booking->book_end_date . " ) ";
                    break;
                  case "room":
                    $book_title .= $booking->room_name. " ";
                    $book_title .= $booking->room_no. " ";
                    $book_title .= $booking->room_type . " ( ";
                    $book_title .= $booking->book_start_date . " - ";
                    $book_title .= $booking->book_end_date . " ) ";
                    break;
                }
                switch ($booking->status) {
                  case 1:
                      $color = '#c7dd0e';
                    break;
                  case 0:
                      $color = '#00a65a';
                    break;
                }
                $booking->book_start_date = explode('-',$booking->book_start_date);
                $booking->book_end_date = explode('-',$booking->book_end_date);
              @endphp
                {
                  title          : '{{ $book_title }}',
                  start          : new Date('{{ $booking->book_start_date["0"] }}', '{{ $booking->book_start_date["1"] - 1  }}', '{{ $booking->book_start_date["2"] }}'),
                  end            : new Date('{{ $booking->book_end_date["0"] }}', '{{ $booking->book_end_date["1"] - 1  }}', '{{ $booking->book_end_date["2"] + 1}}'),
                  backgroundColor: '{{ $color }}', //red
                  borderColor    : '{{ $color }}', //red
                  allDay         : true
                },
            @endforeach
        @endif
      ],
    });

    calendar.render();
  })
</script>
@endsection