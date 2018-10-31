{{--@inject('workgroup', 'App\Models\Workgroup')--}}
{{--@inject('section', 'App\Models\Section')--}}
@inject('units', 'App\Models\Units')


<div id="main_menu" class="toggled">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                    <img src="/img/main/logo.png" alt="" height="150" width="150">
                {{--<a href="#">--}}
                    <p>D-house</p>
                {{--</a>--}}
            </li>
            <li>
                {{--<a href="#" class="modal-show w-100" data-toggle="modal" data-target="#zakaz_ring">Сотрудники--}}
                    {{--<span class="badge badge-dark badge-pill float-right mr-2" style="margin-top: 10px; text-indent: 0;">320</span></a>--}}

                <div id="accordion">
                    {{--Сотрудники--}}
                    <a class="modal-show w-100" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="fa fa-user-o mr-2" aria-hidden="true"></i>
                        Сотрудники
                        <span class="badge badge-dark badge-pill float-right mr-2" style="margin-top: 10px; text-indent: 0;">
                            {{ $units::where('active', '=', '1')->count() }}</span>
                    </a>

                    <div id="collapseOne" class="collapse bg-dark" aria-labelledby="headingOne" data-parent="#accordion">
                        <a href="#" class="modal-show" data-toggle="modal" data-target="#modal_section">
                            Отделы
                            <span class="badge badge-light badge-pill float-right mr-2" style="margin-top: 10px; text-indent: 0;">
                                {{ $page::where('id_category', '=', '2')->count() }}</span>
                        </a>
                        <a href="#" class="modal-show" data-toggle="modal" data-target="#modal_work_group">
                            Рабочие группы
                            <span class="badge badge-light badge-pill float-right mr-2" style="margin-top: 10px; text-indent: 0;">
                                {{ $page::where('id_category', '=', '3')->count() }}</span>
                        </a>
                        <a href="/all-sotrudniki">
                            Все сотрудники
                            <span class="badge badge-light badge-pill float-right mr-2" style="margin-top: 10px; text-indent: 0;">
                                {{ $units::where('active', '=', '1')->count() }}</span>
                        </a>
                        <a href="#" class="modal-show" data-toggle="modal" data-target="#modal_search">
                            Поиск
                        </a>
                        <a href="/statistic">
                            Статистика по сотрудникам
                        </a>
                        <a href="/workout-sotrudniki" title="Сотрудники работавшие ранее в компании">
                            Герои минувших лет
                            <span class="badge badge-light badge-pill float-right mr-2" style="margin-top: 10px; text-indent: 0;">
                                {{ $units::where('active', '=', '0')->count() }}</span>
                        </a>
                    </div>

                    {{--Управление АТС--}}
                    {{--<a class="modal-show w-100 collapsed" data-toggle="collapse" data-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">--}}
                        {{--<i class="fa fa-fax mr-2" aria-hidden="true"></i>--}}
                        {{--Управление АТС--}}
                        {{--<span class="badge badge-dark badge-pill float-right mr-2" style="margin-top: 10px; text-indent: 0;">8</span></a>--}}
                    {{--</a>--}}
                    {{--<div id="collapse-2" class="collapse bg-dark" aria-labelledby="heading-2" data-parent="#accordion">--}}
                            {{--Anim pariatur cliche reprehenderit-2--}}
                    {{--</div>--}}

                </div>
            </li>

            {{--Управление АТС--}}
            <li>
                <a href="#" class="modal-show w-100" data-toggle="modal" data-target="#modal_future">
                    <i class="fa fa-fax mr-2" aria-hidden="true"></i>
                    <i class="far fa-lightbulb"></i>
                    Управление АТС
                    <span class="badge badge-dark badge-pill float-right mr-2" style="margin-top: 10px; text-indent: 0;">8</span>
                </a>
            </li>

            {{--Освещение--}}
            <li>
                <a href="#">
                    <i class="fa fa-lightbulb mr-2" aria-hidden="true"></i>
                    <i class="far fa-lightbulb"></i>
                    Освещение
                </a>
            </li>

        </ul>

        <div class="pl-4 pb-2" style="
            position: absolute;
            bottom: 0;
            white-space:nowrap;
        ">
            © 2017 - @php echo date('Y'); @endphp | d-devices.com
        </div>
    </div>

    <!-- /#sidebar-wrapper -->
</div>




