<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table ='pages';
}


//namespace App\Models;
//
//use Illuminate\Database\Eloquent\Model;
////use Laravel\Scout\Searchable;
//
//class Page extends Model
//{
//
//    use Common;
//
//    public $timestamps = false;
//
//    protected $fillable = ['h1', 'title', 'key', 'desc', 'desc', 'content', 'm_content', 'url', 'label', 'direction_id', 'blade'];
//
//
//    /**
//     * Определяем отношение
//     * Страница принадлежит какомуто направлению копетенции
//     */
//    public function direction()
//    {
//        return $this->belongsTo(Direction::class);
//    }
//
//
//    /**
//     * Определяем отношение
//     * Страница может иметь несколько товаров
//     */
//    public function equipment()
//    {
//        return $this->hasMany(Equipment::class);
//    }
//
//
//    /**
//     * Получаем несуществующее поле seo_title
//     * Прогоняем title через реплейсер, которые ищет все вхождения %%var%%
//     * Если %%var%% в строке нет то делаем по умолчанию как было на старом сайте
//     */
//    public function getSeoTitleAttribute()
//    {
//        $new_str = $this->replacer($this->title);
//        return $new_str ? $new_str : $this->title . ' ' . app('domain')->postfix1;
//    }
//
//
//    /**
//     * Получаем несуществующее поле seo_description
//     */
//    public function getSeoDescriptionAttribute()
//    {
//        $new_str = $this->replacer($this->desc);
//        return $new_str ? $new_str : $this->desc . ' ' . app('domain')->postfix2 . ' и во многих других населенных пунктах';
//    }
//
//
//    /**
//     * Получаем несуществующее поле seo_description
//     */
//    /*public function getMyHeaderAttribute()
//    {
//        $new_str = $this->replacer($this->h1);
//        return $new_str ? $new_str : $this->h1 .' '.app('domain')->postfix3;
//    }*/
//
//
//
//    /**
//     * Получаем несуществующее поле seo_keywords
//     */
//    public function getSeoKeywordsAttribute()
//    {
//        $new_str = $this->replacer($this->key);
//        return $new_str ? $new_str : app('domain')->name . ' ' .$this->key;
//    }
//
//
//    public function updatePage($request)
//    {
//        return parent::update($request->all());
//    }
//
//}
