<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$page->title}}</title>
    <meta charset="utf-8">
    <meta name="author" content="d-devices.com">



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/left_menu.css') }}" rel="stylesheet">

    {{-- стили модальных окон --}}
    <link href="{{ mix('/css/modal-base-form.css') }}" rel="stylesheet">

    {{--различные иконки fontawesome--}}
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">



    @stack('css')
    @yield('to_header')

</head>
<body>
    <div id="app">
        {{-- заголовок страниц ------------------------------------------}}
        @include('layouts.header')
        {{-- боковое меню ------------------------------------------}}
        @include('layouts.left_menu')

            @include('modals.section')
            @include('modals.work-group')
            @include('modals.search')
            @include('modals.future')

        {{--данные страницы--}}
        @yield('content')


    </div>




    <!-- Scripts ------------------------------------------------------------------------------------------------------>
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tools/1.2.7/jquery.tools.min.js" ></script>


    {{-- боковое меню ------------------------------------------}}
    <script>
        $("#main_menu").hide();
        $("#main_menu").toggleClass("toggled");

        $("#menu-toggle").click(function() {
            $("#main_menu").show();
            $("#main_menu").toggleClass("toggled");
        });
    </script>

</body>
</html>