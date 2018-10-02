@extends('layouts.base')


@section('to_header')
   <style>
      .one-link-page li {
         list-style-image: url(/img/main/foli.png);
         line-height: 1.8em;
      }
      .one-link-page .card {
         width: 20rem;
         flex-direction: row;
         min-height: 90px;
      }
      .one-link-page .card img {
         width: 65px;
         height: 50px;
         margin-left: 15px;
         margin-top: auto;
         margin-bottom: auto;
      }
   </style>

@endsection


@section('content')
<div class="container one-link-page">

   {{--указатель местонахождения--}}
   <div class="w-100 my_hr1"></div>
   <div class="w-100 my_hr1 pt-3 pb-3">
      <a href="/">Главная</a> » {{$page->title}}
   </div>

   <h1 class="w-100 text-center text-dark">{{$page->title}}</h1>

   {!! $page->body !!}

</div>
@endsection