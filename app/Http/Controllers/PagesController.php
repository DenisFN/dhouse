<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Http\Controllers\Controller;



class PagesController extends Controller
{
    public function index()
    {
        $page=Page::find(1);

        return view('pages.index.index', ['page'=>$page]);
    }


    public function category_pages($category, $url)
    {
//        dump($category);
//        dump($url);
//        http://stavtrack-kz.test/reviews/gapou-lo-luga-agro-industrial-college

        $category=Category::where('url','=',$category)->first();
        $page=Page::where([
            ['id_category','=',$category->id],
            ['url','=',$url]
            ])->first();

//        $page=Page::
//            whereExists(function ($query) use ($category) {
//                $query->select('id')
//                    ->from('category')
//                    ->where('category.url','=',$category)
//                    ->whereRaw('category.id = pages.id_category');
//            })
//            ->where('url','=',$url)
//            ->first();

//        dump($page);
        if ($page->lendos == '0') {
            //выводим простую страницу из БД
            //dd('ok');
            return view('pages.category-link-page.base-link-page', ['page'=>$page], ['category'=>$category]);
        }
        else {
            //загружаем лендос
            return view('pages.category-link-page.'.$page->url, ['page'=>$page], ['category'=>$category]);
        }

    }


    public function first_pages($url){
        $page=Page::where('url','=',$url)->first();

        if ($page->lendos == '0') {
            //выводим простую страницу из БД
            return view('pages.one-link-page.base-link-page', ['page'=>$page]);
        }
        else {
            //загружаем лендос
            return view('pages.one-link-page.'.$page->url, ['page'=>$page]);
        }
    }



}
