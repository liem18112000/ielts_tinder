<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @yield('head')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')

    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>

    <!-- Tinymce -->
	<script src="https://cdn.tiny.cloud/1/rmdclr9q9pr72tgrpg0w7x3r0kqnglgojdaxfqsij86e4bp0/tinymce/5/tinymce.min.js"
		referrerpolicy="origin"></script>

</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>

    <script>
        @yield('scripts')

        @auth

        function refuseMatchingRequest(invitor, token){
            // Notification for practice
            console.log('refuse matching request');

            var xhttp = new XMLHttpRequest();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',

                url: "http://localhost/ielts_tinder/public/room/matching/refuse/" + invitor + "/" + token,

                success: function (data) {
                    console.log('send refuse request done');
                }
            });
        }

        function getPendingRequest(){
            // Notification for practice
            var xhttp = new XMLHttpRequest();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',

                url: "{{route('room.request')}}",

                success: function (data) {

                    if(data.message != null){

                        var notifications = data.notifications;

                        notifications.forEach(function(notification){

                            var data = notification.data;

                            Swal.fire({
                                title: 'New matching request',
                                text: 'Would you like to match with ' + data.from.name,
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes',
                                timer: 10000
                            }).then((result) => {
                                if (result.value) {
                                    window.location.replace("http://localhost/ielts_tinder/public/room/join/" + data.token);
                                }else{
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'error',
                                        title: 'What a pity!',
                                        showConfirmButton: false,
                                        timer: 3000
                                    });

                                    refuseMatchingRequest(data.from.id, data.token)

                                }
                            })
                        });

                    }
                },
                complete: function(data) {
                    setTimeout(getPendingRequest, 1000)
                }
            });

        }

        setTimeout(getPendingRequest(), 1000);

        function getRefuseRequest(){
            // Notification for practice
            var xhttp = new XMLHttpRequest();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',

                url: "{{route('room.get-refuse')}}",

                success: function (data) {

                    if(data.message != null){

                        var notifications = data.notifications;

                        notifications.forEach(function(notification){

                            var data = notification.data;

                            console.log('on refuse matching request')

                            window.location.replace("http://localhost/ielts_tinder/public/room/matching/on-refuse/" + data.token)

                        });

                    }
                },
                complete: function(data) {
                    setTimeout(getRefuseRequest, 1000)
                }
            });

        }

        setTimeout(getRefuseRequest(), 1500);

        @endauth

        {!!
            Session::get('message');
        !!}
    </script>

</body>
</html>
