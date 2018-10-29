
<div class="mt-5 map">

    {{--выводим маску всех сотрудников--}}
    @foreach($units::select()->get() as $units)
        <div class="{{$units->color}} position-absolute rounded-circle" style="width: 16px; height: 16px; left: {{ $units->left }}px; top: {{ $units->top }}px;"></div>
    @endforeach

    {{--выводим сотрудников нужного отдела--}}
    @php $i=0; @endphp
    @foreach($units::where('id_workgroup','LIKE',"%'".$page->id."'%")->get() as $units)

        @php $i++; @endphp

        <div class="wp_box bg-light text-dark" style="left: {{ $units->left }}px; top: {{ $units->top }}px">
            {{--определяем цвет шапки окна в зависимости от "половой принадлежности" сотрудника--}}
            @if ($units->pol == 'ж')
                <div class="wp_head bg-danger">
                    @else
                        <div class="wp_head bg-info">
                            @endif

                            <div class="wp_logo">
                                {{--значок с порядковым номером--}}
                                <div class="wp_pivot badge badge-pill badge-warning" style="left: {{ $units->left }}px; top: {{ $units->top }}px;">
                                    @php echo $i; @endphp
                                </div>
                            </div>
                            <div class="wp_hole">
                                <div></div>
                            </div>
                            {{--<div class="wp_id">--}}
                            {{--<div>ID: {{ $units->id }}</div>--}}
                            {{--</div>--}}

                        </div>

                        <div class="wp_body">
                            <div class="wp_body_left ">
                                <div class="wp_foto ">
                                    <img class="img-fluid" src="/files/foto_user/{{ $units->img }}" alt="" width="90" height="120">
                                </div>
                            </div>

                            <div class="wp_body_right ">
                                <div class="wp_name ">
                                    {{ $units->fio }}
                                    <div class="dropdown-divider mb-0"></div>
                                </div>
                                <strong>Должность:</strong>
                                <br>
                                {{ $units->doljnost }}<br>

                                {{--@if ( $units->birthday != null)--}}
                                    {{--<strong>Дата рождения:</strong>--}}
                                    {{--<br>--}}
                                    {{--@php echo date('d-m-Y',strtotime( $units->birthday )); @endphp--}}
                                    {{--@php echo '('.(date('Y')-date('Y',strtotime( $units->birthday ))).' лет)'; @endphp--}}
                                {{--@endif--}}
                                @if ($units->birthday)
                                    <p>
                                        Дата рождения: @php echo date('d-m-Y',strtotime( $units->birthday )).' г.<br>'.
                                                        '('.(date('Y')-date('Y',strtotime( $units->birthday ))).' лет)'; @endphp</p>
                                @else
                                    <p>Дата рождения: <span class="text-danger">не указана</span>
                                        <br>(стесняшка.. ☺)</p>
                                @endif

                                @if ($units->comment != null)
                                    {!! $units->comment !!}
                                @endif

                                @if ( ( $units->id_bitrix != NULL ) || ( $units->id_bitrix != 0 ) )
                                    <a class="btn btn-secondary btn-sm mt-3" target="_blank" href="https://portal.stavtrack.ru/company/personal/user/{{ $units->id_bitrix }}/">Подробно...</a>
                                @endif
                                {{--menu-item-link--}}
                            </div>
                        </div>

                </div>

                @endforeach
        </div>

{{--<div class="w-100 text-center position-relative">--}}
{{--г.Ставрополь, ул.Бруснёва 4/3, 4-этаж--}}
{{--</div>--}}