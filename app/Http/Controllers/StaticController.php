<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function index() {
        $title = 'Главная страница';
        return view('static/index', compact('title')); // первый вариант передачи данных в прредставление
    }

    public function about()
    {
        $data = [
            'title_page' => 'Страница про нас',
            'params' => ['BMW', 'Audi', 'Volvo']
        ];
        return view('static.about')->with($data);
    }

    // public function about() {
    //     $title = 'Про нас';
    //     return view('static/about')->with('title_page',$title); // второй вариант передачи данных в прредставление ($имя по которой передаются данные, $данные)
    // }
}