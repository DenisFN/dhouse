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
                <a href="#" class="modal-show badge badge-warning" data-toggle="modal" data-target="#modal_work_group">{{ $category->name }}</a>
                <span class="badge badge-pill badge-light">{{ $page->h1 }}</span>
            </div>

            {{--Список сотрудников выбранного отдела--}}
            @include('pages.sections.all-group-sotrudniki')


            {{--список сотрудников отдела (размещаем на карте)--}}
            @include('pages.sections.group-sotrudniki')

        </div>
    </div>
@endsection