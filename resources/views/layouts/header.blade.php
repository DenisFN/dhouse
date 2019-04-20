<div class="w-100 bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        {{--<a class="navbar-brand" href="#">Navbar</a>--}}
        {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="true" aria-label="Toggle navigation">--}}
            {{--<span class="navbar-toggler-icon"></span>--}}
        {{--</button>--}}

            <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle" style="z-index: 10;">
                <span class="navbar-toggler-icon"></span>
            </a>

            <div class="container">
                <div class="w-100 text-center mr-5">
                    <img src="/img/main/stavtrack-mobile-logo.png" alt="" height="38">
                </div>
            </div>


            @guest
                {{--<div>gost</div>--}}
                <a class="text-dark" href="{{ route('login') }}">
                    <div class="badge badge-pill badge-warning">
                        Войти
                    </div>
                </a>
            @else
                {{--<div class="btn-group btn-group-sm" role="group">--}}
                    {{--<button id="btnGroupDrop1" type="button" class="badge badge-pill badge-warning dropdown-toggle"--}}
                            {{--data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                        {{--{{ Auth::user()->name }}--}}
                    {{--</button>--}}
                    {{--<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">--}}
                        {{--<a class="dropdown-item badge badge-pill badge-warning" href="{{ route('logout') }}">--}}
                                {{--Выйти--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-secondary disabled">{{ Auth::user()->name }}</button>
                    <a class="btn btn-warning" href="{{ route('logout') }}">Выйти</a>
                </div>
            @endguest


            {{--<div class="badge badge-pill badge-secondary">--}}
                {{--@php echo date('d-m-Y',strtotime(now())); @endphp--}}
            {{--</div>--}}



        {{--<div class="collapse navbar-collapse" id="navbar1">--}}
            {{--<ul class="navbar-nav mr-auto">--}}
                {{--<li class="nav-item active">--}}
                    {{--<a class="nav-link" href="/#scroll-company">О КОМПАНИИ <span class="sr-only">(current)</span></a>--}}
                {{--</li>--}}
                {{--<li class="nav-item bord dropdown">--}}
                    {{--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ВИДЕОНАБЛЮДЕНИЕ ЗА АВТО</a>--}}
                    {{--<div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown1">--}}

                            {{--<a class="dropdown-item" data-toggle="modal" data-target="#zakaz_commpred">Видеонаблюдение для спецтехники</a>--}}
                            {{--<a class="dropdown-item" data-toggle="modal" data-target="#zakaz_commpred">Видеонаблюдение при перевозке <br> опасных грузов</a>--}}
                            {{--<a class="dropdown-item" data-toggle="modal" data-target="#zakaz_commpred">Видеонаблюдение для автобусов <br> и маршруток</a>--}}
                            {{--<a class="dropdown-item" data-toggle="modal" data-target="#zakaz_commpred">Видеонаблюдение для такси</a>--}}
                            {{--<a class="dropdown-item" data-toggle="modal" data-target="#zakaz_commpred">Видеонаблюдение для грузового <br> автомобиля</a>--}}
                            {{--<a class="dropdown-item" data-toggle="modal" data-target="#zakaz_commpred">Видеонаблюдение для <br> инкассаторских машин</a>--}}

                        {{--<div class="dropdown-divider"></div>--}}
                    {{--</div>--}}
                {{--</li>--}}
            {{--</ul>--}}

            {{--<form class="form-inline my-2 my-lg-0">--}}
            {{--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
            {{--<button class="btn btn-outline-info my-2 my-sm-0 bg-warning text-dark" type="submit">Search</button>--}}
            {{--</form>--}}
        {{--</div>--}}


    </nav>

</div>


