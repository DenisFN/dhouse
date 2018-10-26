@extends('layouts.base')
@inject('units', 'App\Models\Units')


@section('to_header')
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sections.css') }}" rel="stylesheet">

@endsection



@section('content')
    <div class="page-index">
        <div class="container">

            {{--указатель нахождения на странице--}}
            <div class="w-100 text-center my_hr2 pt-2">
                <a href="/" class="badge badge-warning">Карта помещений</a>
                <a href="#" class="modal-show badge badge-warning" data-toggle="modal" data-target="#modal_search">Поиск сотрудника</a>
                <span class="badge badge-pill badge-light">{{ $page->h1 }}</span>
            </div>

            <form id="custom-search-form" class="form-search form-horizontal pull-right"
                  action="{{action('PagesController@search')}}" method="get">
                <div class="input-append spancustom">
                    <input type="text" class="search-query" name="character" placeholder="fio">
                    <button type="submit" class="btn">search</button>
                </div>
            </form>

            {{--Список сотрудников выбранного отдела--}}
            {{--<div class="mt-5 map">--}}

            {{--</div>--}}

        </div>
    </div>
@endsection
