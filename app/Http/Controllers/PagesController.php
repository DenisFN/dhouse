<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Units;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PagesController extends Controller
{
    public function search(Request $request)
    {
        $page=Page::where('url','=','search')->first();

        $searchResult = Units::where('fio', 'LIKE', "%$request->search_fio%")->get();

        return view('pages.one-link-page.'.$page->url, ['page'=>$page, 'searchResult'=>$searchResult]);
    }

    public function turn()
    {
        return view('pages.one-link-page.turn');
    }

    public function robot()
    {
        return view('pages.one-link-page.robot');
    }

    public function index()
    {
        $page=Page::find(1);

        return view('pages.index.index', ['page'=>$page]);
    }


    public function category_pages($category, $url)
    {
        $category=Category::where('url','=',$category)->first();
        $page=Page::where([
            ['id_category','=',$category->id],
            ['url','=',$url]
            ])->first();


        if ($page->lendos == '0') {
            //выводим простую страницу из БД
            return view('pages.category-link-page.base-link-page', ['page'=>$page], ['category'=>$category]);
        }
        else {
            //загружаем лендос
            return view('pages.category-link-page.'.$page->url, ['page'=>$page], ['category'=>$category]);
        }

    }


    public function category_units($id)
    {
        $units=Units::where('id','=',$id)->first();

        $page->title='ok';

        //выводим простую страницу из БД
        return view('pages.category-link-page.base-units-page', ['units'=>$units]);
    }


    public function first_pages($url, Request $request){
        $page=Page::where('url','=',$url)->first();

        if ($page->lendos == '0') {
            //выводим простую страницу из БД
            return view('pages.one-link-page.base-link-page', ['page'=>$page]);
        }
        else {
            //загружаем лендос
            return view('pages.one-link-page.' . $page->url, ['page' => $page]);
        }
    }



}
