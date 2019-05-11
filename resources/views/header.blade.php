<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Resort Daddy</title>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('/css/styles.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <!-- Header -->
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="site-logo">
                            <a href="{{  url('/') }}"><img src="{{  asset('/img/logo-resort-daddy.png') }}" class="site-logo-img" alt="logo"></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>