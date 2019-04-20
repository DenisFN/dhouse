@inject('device_config', 'App\Models\Device_config')


<?php
    $device_id=2;   //определяем требуемое утсройство из списка в БД
    $device=DB::table('device')->where('id', '=', $device_id)->first(); //получаем ключ устройства
    $server=DB::table('device')->where('id', '=', 1)->first(); //получаем ключ сервера
?>



<div class="modal fade modal-base-form" id="modal_future" tabindex="-1" role="dialog" aria-labelledby="modal-base-form-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title text-center" id="modal-base-form-label">
                    {{$device->t_name}}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form class="modal-body" onshow="viewAtc()">
                {{--@foreach($page::where('id_category', '=', '2')->get() as $page)--}}
                    {{--<a class="btn btn-warning mr-2 mb-2" href="/sections/{{$page->url}}">{{$page->h1}}</a>--}}
                {{--@endforeach--}}
                <div class="text-dark">Функционал доступен только зарегистрированным пользователям.</div>

                @foreach($device_config::where('id_device', '=', $device_id)->where('t_port', '<>', '0')->orderBy('t_port', 'ASC')->get() as $item)
                    <div class="float-left p-2 mt-1 w-100 badge badge-pill badge-light" style="font-size: 20px;" title="{{ $item->t_comment }}">

                        <span class="badge badge-pill badge-secondary">
                            <span class="badge badge-pill badge-dark mr-2">{{ $item->t_port }}</span>
                            АТС - {{ $item->t_name }}
                        </span>
                        {{--передаем в вызываемую функцию ключ сервера для корректной работы команд--}}
                        <button class="badge badge-pill badge-warning"
                              onclick="cl_but('key={{$server->t_key}}&command_id={{$item->id}}')">On/Off</button>
                        <?php
                            if ($item->t_status == 0) {
                                echo '<span class="bg-danger position-absolute mt-1 ml-2 rounded-circle" style="width: 16px; height: 16px;"></span>';
                            } else {
                                echo '<span class="bg-success position-absolute mt-1 ml-2 rounded-circle" style="width: 16px; height: 16px;"></span>';
                            }
                        ?>
                    </div>
                @endforeach


                <span class="badge badge-pill badge-warning"
                      onclick="get_data('key={{$server->t_key}}&command_id=9')">get_data</span>

            </form>

            <div class="modal-footer">
                {{--<div class="w-100">* Выберите нужный отдел для перехода</div>--}}
            </div>

        </div>
    </div>
</div>



<script src="/js/jquery.min.js"></script>
<script>
//    $(document).ready(function(){

    function cl_but(data) {
//        alert('num='+data);
        $.get("turn.php?"+data);
    }

    function get_data(data) {
        $.get("turn.php?"+data);
    }

</script>

