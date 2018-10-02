<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Задаем правила валидации для полей из форм.
     * Также проверяем сощесвование полей кроме телефона и имени и в случаи их
     * присутсвия фоормируем правлиа - этим мы можем обрабатывать разные формы имеющие различный набор полей
     * @return array
     */
    public function rules()
    {
        return [
            //если полей в форме нет то и не делаем никакой вилдации
            'name' => $this->exists('name') ? 'required|min:3' : '',
            'phone' => $this->exists('phone') ? 'required|min:5' : '',
            'city' => $this->exists('city') ? 'required' : '',
            'email' => $this->exists('email') ? 'required|email' : '',
            'timecall' => $this->exists('timecall') ? 'required' : '',
            'type_partner' => $this->exists('type_partner') ? 'required' : '',
            'count' => $this->exists('count') ? 'required' : '',
        ];
    }




    /**
     * Собственные сообщения об ошибках
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Пожалуйста, впишите Имя!',
            'name.min' => 'Имя должно быть не менее :min-х симв.',
            'email.required' => 'Пожалуйста, впишите адрес электронной почты!',
            'email.email' => 'Не правильный формат электронной почты!',
            'phone.required' => 'Укажите номер телефона!',
            'phone.min' => 'Телефон должен быть не менее :min-х симв.',
            'timecall.required' => 'Когда Вам можно позвонить?',
            'city.required' => 'Откуда Вы? - Укажите населеный пункт!',
            'type_partner.required' => 'Пожалуйста, выберете вариант сотрудничества',
            'count.required' => 'Укажите количество подключений',
        ];
    }
}
