<?php
/**
 * Обрабатываем все заявки оставленые посетителями сайта
 */

namespace App\Http\Controllers;

use App\Http\Requests\SendOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoWialon;
use App\Services\ToolsStavtrack;
use App\Mail\AfterOrders;


class OrderController extends Controller
{

    public function send_order(SendOrderRequest $request)
    {
        //сохраняем в базу
        Order::createNewOrder($request);


        $domain='http://tools.stavtrack.ru';

        //отправляем заявку в tools.stavtrack.ru
        (new ToolsStavtrack())->send($request);


        //отправляем письмо клиенту если заполнено поле email
        if ($request->exists('email')) {
            //посылаем только после заявок на прайсы или коммпреды
            if ($request->type_order == 'PRICE' OR $request->type_order == 'COMMPRED') {
                Mail::to($request->email)->send(new AfterOrders($request));
            };

            //посылаем по заявке клиента для Демо-доступа
            if ($request->type_order == 'DEMO_ACCESS') {
                Mail::to($request->email)->send(new DemoWialon($request));
            }

        }
    }


    /**
     * Сюда стекаются данные со всех форм на сайте.
     * Сначала проверяем поле type_order для того что бы обработать спецефические заявки
     * Далее идут только заявки для менеджеров (сохраняются в базу, посылаются в тулс)
     * Если нужно отправить письмо то посылаем его клиенту
     * @param $domain
     * @param SendOrderRequest $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function send($domain, SendOrderRequest $request)
    {

        //info($request->all());

        if ($request->type_order == 'PARTNER') { //если это формы для партнеров
            //посылаем письмо Матвееву
            Mail::send(new AfterPartnerOrders());
            return;
        } elseif ($request->type_order == 'LINKBOSS') { //если это форма "Связаться с руководством"
            //посылаем письмо на info@stavtrack.ru
            Mail::send(new AfterLinkBossOrders());
            return;
        } elseif ($request->type_order == 'SUPPORT') { //если это форма "Связаться с тех поддержкой"
            //посылаем сообщение в ленту портала
            (new BitrixStavtrack())->sendSupport($request);
            return;
        } elseif ($request->type_order == 'CALLBACKUSER') { //если это форма "Связаться с определенным менеджером под фоткой"
            //находим user а
            //посылаем письмо нужному менеджеру
            Mail::send(new CallToOrderUser($request));

            return;
        } elseif ($request->type_order == 'MAILING') { //если это форма из почтовых рассылок Вани
            //посылаем письмо Матвееву
            Mail::send(new EcoDrivingOrders());
            //посылаем сообщение в ленту портала
            (new BitrixStavtrack())->sendSupportFromMailing($request);
            return;
        } elseif ($request->type_order == 'FREE_ACCOUNT') { //заказа бесплатной учетки Виалон
            //Создаем учетку по API Wialon
            $password = str_random(6);; //новый пароль для учетки
            $result = $this->makeFreeAccountWialon($request->email, $password);
            if ($result === true) {
                //посылаем письмо клиенту с инфой о логине пароле и куда входить
                Mail::send(new FreeAccountWialon($request->email, $password));
            } elseif ($result['error'] == 1002) {
                return response()->json(['msg' => ['На этот Email уже заведена учетная запись в Wialon']], 422);
            } else {
                return response()->json(['msg' => ['Неизвестная ошибка напишите на info@stavtrack.ru']], 422);
            }

            return;
        }

        //если ничего специфичного то идем дальше значит эта заявка от клиента с сайта

        //сохраняем в базу
        Order::createNewOrder($domain, $request);


        //отправляем заявку в tools.stavtrack.ru
        (new ToolsStavtrack())->send($domain, $request);


        //отправляем письмо клиенту если заполнено поле email
        if ($request->exists('email')) {
            //посылаем только после заявок на прайсы или коммпреды
            if ($request->type_order == 'PRICE' OR $request->type_order == 'COMMPRED') {
                Mail::to($request->email)->send(new AfterOrders($request));
            };
        }

    }



}
