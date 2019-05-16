<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resort Daddy</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!--  <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"> -->
    
    
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="{{ asset('/css/intlTelInput.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/caleran.min.css') }}">
    <link href="{{ asset('css/formValidation.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css">
    
    
</head>
<body>
        <!-- Header -->
        @include('header')

        @yield('content')
        <!-- footer -->
        @include('footer')
        <script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/momentjs.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/moment-timezone.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/jquery.countdown.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/utils.js') }}"></script>
        <script src="///cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>
        <script src="{{ asset('/js/FormValidation.full.min.js') }}"></script>
        <script src="{{ asset('/js/FormValidation.Bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/intlTelInput.min.js') }}"></script>
        <script src="{{ asset('js/caleran.min.js') }}"></script>
        <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
        @yield('scripts')
    </body>
</html>