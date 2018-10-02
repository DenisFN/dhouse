<?php
/**
 * Работаетаем с tools.stavtrack.ru
 */
namespace App\Services;

use App\Models\Direction;

class ToolsStavtrack
{

    /**
     * Отправка только что созданой заявки
     * @param $domain
     * @param $request
     */
    public function send($request)
    {
        //создаем массив инфы для отправки
        $query = $this->createMessage($request);

        // отправляем через CURL
        $this->curl($query);
    }



    public function createMessage($request)
    {
//        info('test', $request->all() );

        $fullUrl = 'https://stavtrack.kz' . $request->url;
        $product = $request->exists('product') ? $request->product . ' | ' : null;
        $timecall = $request->exists('timecall') ? $request->timecall . ' | ' : null;
        $email = $request->exists('email') ? $request->email . ' | ' : null;
        $question = $request->exists('question') ? $request->question . ' | ' : null;
        $link_file = $request->exists('link_file') ? $request->link_file . ' | ' : null;
        $question_can_log = $request->exists('can_mark') ? ' Проконсультируйте меня пожалуйста по выбору CAN-считывателя для транспорта: ' .
            $request->can_mark . ' ' . $request->can_year . ' | ' : null;
        $voprosConsult = $request->exists('voprosConsult') ? $request->voprosConsult . ' | ' : null;
        $message = $timecall  . $email . $product   . $question . $voprosConsult  . $question_can_log . $link_file . $fullUrl;

//        info( 'test2 '.$message );

        return [
            'title' => $request->type_order. ' - ' . Direction::find($request->direction_id)->name,
            'message' => $message,
            'type' => $request->type_order,
            'istochnik' => null,
            'name' => $request->name,
            'phone' => $request->phone,
            'city' => $request->exists('city') ? $request->city : null,
            'timecall' => $request->exists('timecall') ? $request->timecall : null
        ];
    }



    private function curl($query)
    {
//        info( 'test3', $query);

        $myCurl = curl_init();
        curl_setopt_array($myCurl, array(
            CURLOPT_URL => 'http://tools.stavtrack.ru/api/get-data-from-stavtrack',
            //CURLOPT_URL => 'http://tools.stavtrack.dev/api/get-data-from-stavtrack',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($query)
        ));
        $response = curl_exec($myCurl);
        curl_close($myCurl);
    }
}