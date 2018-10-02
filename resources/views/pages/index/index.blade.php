@extends('layouts.base')


@section('to_header')
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endsection



@section('content')
    <div class="page-index">
        <div class="container">

            {{--указатель нахождения на странице--}}
            <div class="w-100 text-center my_hr2 pt-2">
                <span class="badge badge-pill badge-light">{{ $page->h1 }}</span>
            </div>

            <div class="mt-5 map">
                <div class="badge badge-pill badge-warning" style="position: absolute; top: 115px; left: 215px;">Уборная</div>
                <div class="badge badge-pill badge-light" style="position: absolute; top: 190px; left: 212px;">Ж</div>
                <div class="badge badge-pill badge-light" style="position: absolute; top: 190px; left: 264px;">М</div>
                <div class="badge badge-pill badge-warning" style="position: absolute; top: 160px; left: 340px;">Кухня</div>
                <div class="badge badge-pill badge-warning" style="position: absolute; top: 160px; left: 460px;">Руководство</div>
                <div class="badge badge-pill badge-warning" style="position: absolute; top: 387px; left: 215px;">Кладовая</div>
                <div class="badge badge-pill badge-warning" style="position: absolute; top: 287px; left: 230px;">Прихожая</div>
                <div class="badge badge-pill badge-warning" style="position: absolute; top: 515px; left: 62px;">Балкон</div>
                <div class="badge badge-pill badge-warning" style="position: absolute; top: 435px; left: 760px;">Переговорная & <br> Комната отдыха</div>
                <div class="badge badge-pill badge-warning" style="position: absolute; top: 500px; left: 960px;">Лоджия</div>
                <div class="badge badge-pill badge-warning" style="position: absolute; top: 337px; left: 530px;">Отделы & Рабочие группы</div>
            </div>


        </div>
    </div>
@endsection