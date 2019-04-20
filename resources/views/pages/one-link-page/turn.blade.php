{{-- turn.php / Постановщик в очередь приходящих запросов от устройств --}}

{{--t_status, где   0-значение по умолчанию, --}}
                {{--1-команда выполнена, --}}
                {{--2-команда подтверждена(получена) устройством,--}}
                {{--3-ошибочная команда--}}

<?php
    //echo 'Sender_IP='.$_SERVER['REMOTE_ADDR'].'<br>';

    //проверяем наличие зарегистрированного устройства с таким адресом
    $query = DB::table('device')->where('t_adress','=', $_SERVER['REMOTE_ADDR'])->first();
    if ($query) {
        //извлекаем ключ-доступа из внешнего запроса
        $pos = strpos($_SERVER['QUERY_STRING'], 'key=');
        //если ключ содержится, то сравниваем его с ключом устройства
        if ($pos === false) { echo 'no key';
            //запрос не содержит ключа
            DB::table('turn')->insert([
                't_sender' => $_SERVER['REMOTE_ADDR'],
                't_command' => $_SERVER['QUERY_STRING'].' | Запрос не содержит ключа (key=)',
                't_status' => 3    //ошибочный запрос
            ]);
        } else {
            if ( substr($_SERVER['QUERY_STRING'], $pos+4, 4) == $query->t_key ){
                //ключ совпал (сохраняем запрос в БД)
                DB::table('turn')->insert([
                    't_sender' => $_SERVER['REMOTE_ADDR'],
                    't_command' => $_SERVER['QUERY_STRING']
                ]);

                //вызываем обработчик запросов (app/helpers/robot.php)
                rbt_start();

            } else {
                //ключ не совпал
                DB::table('turn')->insert([
                    't_sender' => $_SERVER['REMOTE_ADDR'],
                    't_command' => $_SERVER['QUERY_STRING'].' | Ключ (key=) не совпал',
                    't_status' => 3    //ошибочный запрос
                ]);
            }
        }
    } else {
        //Запрос от незарегистрированного устройства
        DB::table('turn')->insert([
            't_sender' => $_SERVER['REMOTE_ADDR'],
            't_command' => $_SERVER['QUERY_STRING'].' | Запрос от незарегистрированного устройства',
            't_status' => 3    //ошибочный запрос
        ]);
    }

?>
