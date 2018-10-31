@extends('layouts.base')
@inject('units', 'App\Models\Units')


@section('to_header')
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sections.css') }}" rel="stylesheet">
    <style>
        .page-index .alert .badge {
            font-size: 14px;
        }
        .statistic {
            width: 30rem;
            float: left;
            margin: 0 10px;
        }

    </style>
@endsection



@section('content')
    <div class="page-index">
        <div class="container">

            {{--указатель нахождения на странице--}}
            <div class="w-100 text-center my_hr2 pt-2">
                <a href="/" class="badge badge-warning">Карта помещений</a>
                {{--<a href="#" class="modal-show badge badge-warning" data-toggle="modal" data-target="#modal_search">Поиск сотрудника</a>--}}
                <span class="badge badge-pill badge-light">{{ $page->h1 }}</span>
            </div>

            {{--Список всех сотрудников--}}
            <div class="card statistic alert bg-secondary mt-4">
                <h4 class="text-white">Общая статистика по сотрудникам</h4>
                <div class="mt-4">
                    <div class="badge badge-pill badge-dark mr-2">Всего работало сотрудников</div>
                    <div class="badge badge-pill badge-light mr-2">{{$units->count()}} чел.</div>
                </div>
                <div class="mt-3">
                    <div class="badge badge-pill badge-dark mr-2">В настоящий момент работает</div>
                    <div class="badge badge-pill badge-light mr-2">{{$units->where('active','=',1)->count()}} чел.</div>
                    <a href="/all-sotrudniki" class="badge badge-pill badge-warning" target="_blank">Показать</a>
                </div>
                <div class="mt-3">
                    <div class="badge badge-pill badge-dark mr-2">Бывшие сотрудники</div>
                    <div class="badge badge-pill badge-light mr-2">{{$units->where('active','=',0)->count()}} чел.</div>
                    <a href="/workout-sotrudniki" class="badge badge-pill badge-warning" target="_blank">Показать</a>
                </div>
                <div class="mt-3">
                    <div class="badge badge-pill badge-dark mr-2">Процент текучки кадров</div>
                    <div class="badge badge-pill badge-light mr-2">{{$rez = $units->where('active','=',0)->count() * $units->count() / 100}} %</div>
                </div>
                <div class="text-dark mt-3">* По данным 2017 - @php echo date('Y'); @endphp гг.</div>
            </div>


            {{--Список контегента сотрудников--}}
            <div class="card statistic alert bg-secondary mt-4">
                <h4 class="text-white">Возрастная оценка сотрудников</h4>
                <div class="mt-4">
                    <div class="badge badge-pill badge-dark mr-2">Самый взрослый сотрудник</div>
                    <div class="badge badge-pill badge-light mr-2">
                        {{$units
                        ->where('birthday','=',$units->where('active','=',1)->min('birthday'))
                        ->value('fio')}}
                    </div>
                    <a href="#" class="badge badge-pill badge-warning" target="_blank">Показать</a>
                </div>
                <div class="mt-3">
                    <div class="badge badge-pill badge-dark mr-2">Самый молодой сотрудник</div>
                    <div class="badge badge-pill badge-light mr-2">
                        {{$units
                        ->where('birthday','=',$units->where('active','=',1)->max('birthday'))
                        ->value('fio')}}
                    </div>
                    <a href="#" class="badge badge-pill badge-warning" target="_blank">Показать</a>
                </div>
                <div class="mt-3">
                    <div class="badge badge-pill badge-dark mr-2">Средний возраст сотрудника</div>

                    @php $i=0; @endphp
                    @foreach($units::select('birthday')->whereNotNull('birthday')->where('active','=',1)->get() as $units)
                        @php $i+=(date('Y')-date('Y',strtotime( $units->birthday ))); @endphp
                    @endforeach
                    <div class="badge badge-pill badge-light mr-2">
                        @php echo intval($i / $units::select('birthday')->whereNotNull('birthday')->where('active','=',1)->count()).' лет'; @endphp
                    </div>

                </div>
                <div class="mt-3">
                    <div class="badge badge-pill badge-dark mr-2">Не указали дату рождения</div>
                    <div class="badge badge-pill badge-light mr-2">{{$units->whereNull('birthday')->count()}} чел.</div>
                </div>
                <div class="mt-3">
                    <div class="badge badge-pill badge-dark mr-2">Половая принадлежность</div>
                    <div class="badge badge-pill badge-info">М</div>
                    <div class="badge badge-pill badge-light mr-2">
                        {{$units->where('active','=',1)->where('pol','=','м')->count()}} чел.
                    </div>
                    <div class="badge badge-pill badge-danger">Ж</div>
                    <div class="badge badge-pill badge-light mr-2">
                        {{$units->where('active','=',1)->where('pol','=','ж')->count()}} чел.
                    </div>
                </div>
                <div class="text-dark mt-3">* Расчет возрастной оценки осуществляется только по сотрудникам указавшим свои
                    данные и работающих в компании на текущий момент</div>
            </div>


        </div>
    </div>
@endsection