<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    /**
     * отключаем защиту от массового заполнения
     */
    protected $guarded = ['id'];



    public static function createNewOrder($request)
    {
//        info('test', $request->all());

        //все значение в запросе
        $addition = $request->all();
        //удалаляем поля а остальные (и новые в будущем) храним в JSON в addition
        $addition = array_except($addition, array('url', 'name', 'phone', 'type_order', 'direction_id'));

        //logger($request->all());

        return self::create([
            'url' => $request->url,
            'name' => $request->name,
            'phone'  => $request->phone,
            'type' => $request->type_order,
            'direction_id' => $request->direction_id,
            'addition' => count($addition) ? json_encode($addition) : null,
        ]);
    }


    /**
     * Получаем addition в раскодированом виде
     */
    public function getAdditionAttribute($value)
    {
        return json_decode($value);
    }
}
