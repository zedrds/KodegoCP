<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" />
    <script src="{{asset('frontend/assets/script/date-picker.js')}}"></script>
    <script src="{{asset('frontend/assets/script/Animation.js')}}"></script>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/unit.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/carousel.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/animation.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/card.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/date-picker.css')}}" />
    <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <title>Unwind</title>
    <script src="./script/Animation.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.transitions.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  </head>

  <body>
    
     @include('client.body.header')
    
    @yield('client')

  @include('client.body.footer')
 


  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $("#testimonial-slider").owlCarousel({
          items:1,
          itemsDesktop:[1000,1],
          itemsDesktopSmall:[979,1],
          itemsTablet:[769,1],
          pagination:true,
          transitionStyle:"goDown",
          autoplay:true
      });
  });
  
    // const currentDate = new Date();
    // const check_in = document.getElementById('check_in');
    // check_in.valueAsDate = currentDate;

    // const nextDay = new Date(currentDate);
    // nextDay.setDate(currentDate.getDate() + 1);

    // const check_out = document.getElementById('check_out');
    // check_out.valueAsDate = nextDay;
  
    // check_in.addEventListener('change', function() {
    //     const selectedDate = new Date(check_in.value);
    //     const minDate = new Date(selectedDate.getTime() + 86400000); 
    //     check_out.min = minDate.toISOString().split('T')[0]; 
    // });
    // check_out.addEventListener('change', function() {
    //         const selectedDate = new Date(check_out.value);
    //         const minDate = new Date(check_in.valueAsNumber + 86400000); 
    //         if (selectedDate.getTime() < minDate.getTime()) {
    //             check_out.value = ''; 
    //         }
    // });

    // function getDates() {
    //     fetch(`/admin/reservation/get-dates/`)
    //         .then(response => response.json())
    //         .then(data => {
                
    //         })
    //         .catch(error => console.error(error));
    // }


    const currentDate = new Date();
const nextDay = new Date(currentDate);
nextDay.setDate(currentDate.getDate() + 1);
// const disabledDates = ['2023-05-05', '2023-05-10', '2023-05-15'].map(dateString => new Date(dateString));

const checkIn = flatpickr('#check_in', {
    dateFormat: 'F j, Y', 
    defaultDate: currentDate, 
    onChange: function(selectedDates, dateStr, instance) {

        const minDate = new Date(selectedDates[0].getTime() + 86400000);
        checkOut.set('minDate', minDate);

      
        const maxDate = checkOut.selectedDates[0];
        if (maxDate) {
            const disabled = disabledDates.filter(date => date >= minDate && date <= maxDate);
            checkIn.set('disable', disabled);
        }
    }
});

const checkOut = flatpickr('#check_out', {
    dateFormat: 'F j, Y', 
    defaultDate: nextDay, 
    onChange: function(selectedDates, dateStr, instance) {

        const maxDate = new Date(selectedDates[0].getTime() - 86400000); 
        checkIn.set('maxDate', maxDate);

        const minDate = checkIn.selectedDates[0] || currentDate;
        const disabled = disabledDates.filter(date => date >= minDate && date <= maxDate);
        checkIn.set('disable', disabled);
    }
});





    function getRoomPrice(room_id,guests,check_in,check_out) {
        fetch(`/admin/rooms/get-price/${room_id}`)
            .then(response => response.json())
            .then(data => {
                const totalNights = Math.round((new Date(check_out) - new Date(check_in)) / (1000 * 60 * 60 * 24));
                let totalCost = data.total_cost * guests * totalNights;
                document.getElementById('total_cost').value = totalCost;
            })
            .catch(error => console.error(error));
    }

    document.getElementById('guests').addEventListener('input', function() {
        const room_id = document.getElementById('room_title').value;
        const check_in_date = document.getElementById('check_in').value;
        const check_out_date = document.getElementById('check_out').value;
        const guests = parseInt(this.value) || 0;
        if (room_id) {
            getRoomPrice(room_id, guests, check_in_date,check_out_date);
        }
    });

    document.getElementById('check_in').addEventListener('input', function() {
    const room_id = document.getElementById('room_title').value;
    const check_in_date = this.value;
    const check_out_date = document.getElementById('check_out').value;
    const guests = parseInt(document.getElementById('guests').value) || 0;
    if (room_id && check_in_date && check_out_date) {
        getRoomPrice(room_id, guests, check_in_date, check_out_date);
    }
    });

    document.getElementById('check_out').addEventListener('input', function() {
    const room_id = document.getElementById('room_title').value;
    const check_in_date = document.getElementById('check_in').value;
    const check_out_date = this.value;
    const guests = parseInt(document.getElementById('guests').value) || 0;
    if (room_id && check_in_date && check_out_date) {
        getRoomPrice(room_id, guests, check_in_date, check_out_date);
    }
    });

    
  </script>


<!-- <script src="{{ asset('frontend/assets/script/validate.min.js') }}"></script> -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
            switch(type){
                case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

                case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

                case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

                case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break; 
            }
            @endif 
    </script>

  


</body>
  


</html>
