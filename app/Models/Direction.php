<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    public $timestamps = false;

    /**
     * Отношение один к одному
     * получаем адрес раздела направления
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function urlPage()
    {
        return $this->hasOne(Page::class);
    }
}
