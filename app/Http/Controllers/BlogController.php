<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $data = [
            'title_page' => 'Блог',
            'parameter' => [
                'RecTitle' => 'Запись на сайте',
                'RecText' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum temporibus, sequi repellat deleniti voluptate voluptates necessitatibus eum voluptatem possimus dicta'],
            'parameters' => [
                ['Title' => 'Запись на сайте',
                 'Text' => 'Техт записи: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum temporibus, sequi repellat deleniti voluptate voluptates necessitatibus eum voluptatem possimus dicta'],
                ['Title' => 'Запись на сайте',
                'Text' => 'Техт записи: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum temporibus, sequi repellat deleniti voluptate voluptates necessitatibus eum voluptatem possimus dicta'],
                ['Title' => 'Запись на сайте',
                'Text' => 'Техт записи: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum temporibus, sequi repellat deleniti voluptate voluptates necessitatibus eum voluptatem possimus dicta'],
                ['Title' => 'Запись на сайте',
                'Text' => 'Техт записи: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum temporibus, sequi repellat deleniti voluptate voluptates necessitatibus eum voluptatem possimus dicta'],
            ]
        ];
        return view('static/blog')->with($data); // второй вариант передачи данных в прредставление ($массив данных. Доступ по имени ключа)
    }
}
