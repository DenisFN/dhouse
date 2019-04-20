<?php

    // главная функция /////////////////////////////////////////////////////////////////////////////////////////////////
    function rbt_start() {
        $rbt_repeat=3; //число попыток обработки запроса

        //обрабатываем последнюю невыполненную команду в очереди запроса
        $item=DB::table('turn')->where('t_status','=',0)->orderBy('id','desc')->first();

        //проверяем число попыток обработки запроса
        if ($item->t_repeat < $rbt_repeat) {

            //увеличиваем счетчик попыток
            DB::table('turn')->where('id', '=', $item->id)->increment('t_repeat');
            //обновляем время попытки последней отправки запроса
            DB::table('turn')->where('id', '=', $item->id)->update(['t_repeat_time' => date('Y-m-d H:i:s')]);

            ///////////////////////////////////////////////////////////
            //command_id - передаём идентификатор команды на выполнение
            ///////////////////////////////////////////////////////////
            if (strpos($item->t_command, 'command_id=') !== false) {
                DB::table('turn')->where('id', '=', $item->id)->update(['t_status' => 1]);

                rbt_command_id(
                    $item->id, //номер очереди запроса
                    //значение команды запроса
                    substr($item->t_command,
                        strpos($item->t_command,
                            'command_id=') + 11,
                        strlen($item->t_command) - 1)
                );
            }

            ///////////////////////////////////////////////////////////
            //turn - ловим ответ от устройства
            ///////////////////////////////////////////////////////////
            if (strpos($item->t_command, 'turn=') !== false) {
                rbt_turn($item->id, $item->t_command);
            }

            ///////////////////////////////////////////////////////////
            //get_data - читаем состояние портов устройства
            ///////////////////////////////////////////////////////////
            if (strpos($item->t_command, 'get_data=') !== false) {
                rbt_get_data($item->t_sender, $item->t_command);
            }




        } else {
            //меняем статус запроса на ошибочный
            DB::table('turn')->where('id', '=', $item->id)->update(['t_status' => 3]);
        }
    }


    // обработчик command_id ///////////////////////////////////////////////////////////////////////////////////////////
    function rbt_command_id( $turn_id, $command_id ) {
        //извлекаем необходимые данные для построения команды
        $device_config=DB::table('device_config')->where('id', '=', $command_id)->first();
        $device=DB::table('device')->where('id', '=', $device_config->id_device)->first();

        //собираем команду для отправки устройству
        $query = $device->t_adress.'/config?key='.$device->t_key.'&turn='.$turn_id.'&'.$device_config->t_command;
        //отправляем команду устройству
        rbt_execute($query);
    }


    // обработчик turn /////////////////////////////////////////////////////////////////////////////////////////////////
    function rbt_turn($id, $command) {
        //помечаем ответ от устройства как выполненный
        DB::table('turn')->where('id', '=', $id)->update(['t_status' => 1]); //команда выполнена

        //ищем номер очереди полученной в turn и помечаем как выполненой

        //ищем разделитель, если имеется
        $pos=strpos($command, 'turn='); echo 'pos='.$pos.'<br>';

        if (strpos($command, '&', $pos) === false) {
            //ненайден
            //значение команды запроса
            $turn = substr($command,
                strpos($command,
                    'turn=') + 5,
                    strlen($command) - 1);
        } else {
            //найден
            //значение команды запроса
            $turn = substr($command,
                strpos($command,
                    'turn=') + 5,
                strpos($command, '&', $pos) ); //-1
        }

        //подтверждаем найденную команду согласно номера очереди от устройства
        DB::table('turn')->where('id', '=', $turn)->update(['t_status' => 2]);
    }

    // обработчик get_data /////////////////////////////////////////////////////////////////////////////////////////////
    function rbt_get_data($sender, $command) {
        //получили id устройства для обновления состояния портов
        $device=DB::table('device')->where('t_adress', '=', $sender)->first();

        //значение команды запроса
        $data = substr($command,
            strpos($command,
                'get_data=') + 9,
            strlen($command) - 1);

        //разбираем данные по разрядам

    }



    //////////////////////////////
    /// ВТОРОСТЕПЕННЫЕ ФУНКЦИИ ///
    //////////////////////////////

    // отправляем команду устройству ///////////////////////////////////////////////////////////////////////////////////
    function rbt_execute($query) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        //Устанавливаем параметр, чтобы curl возвращал данные, вместо того, чтобы выводить их в браузер.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $query);

        curl_exec($ch);
        curl_close($ch);
    }

    // проверяем временную метку выполнения запроса ////////////////////////////////////////////////////////////////////
    function rbt_interval($datetime)
    {
        date_default_timezone_set('Etc/GMT-3');
        $diff = strtotime(date('Y-m-d H:i:s')) - strtotime($datetime);
        if (sprintf('%02d', ($diff % 3600) / 60) > 0 || sprintf('%02d', $diff / 3600) > 0) {
            return true;
        } else {
            return false;
        }
    }














