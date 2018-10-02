@extends('layouts.base')

{{--иньекция для выборки данных из БД--}}
{{--@inject('tbl_review', 'App\Models\Page')--}}



@section('to_header')
    <link href="{{ asset('css/reviews.css') }}" rel="stylesheet">

    <style>
        .category-link-page h1 {
            width: 100%;
            font-size: 26px;
            color: #333;
            margin-bottom: 15px;
            font-weight: bold;
            line-height: 32px;
            text-shadow: none;
        }
        .category-link-page .reviews img {
            border: 2px dotted #CCC;
        }

    </style>
@endsection


@section('content')
    <div class="container category-link-page">

        {{--указатель нахождения на странице--}}
        <div class="w-100 text-center my_hr2 pt-2">
            <a href="/" class="badge badge-warning">Карта помещений</a>
            <a href="#" class="modal-show badge badge-warning" data-toggle="modal" data-target="#modal_section">{{ $category->name }}</a>
            <span class="badge badge-pill badge-light">{{ $page->h1 }}</span>
        </div>


        {{--вставка дополнительных сведений в заголовок, если требуется --}}
{{--        @yield($category->url.'_block1')--}}

        {!! $page->body !!}

    </div>





@endsection





