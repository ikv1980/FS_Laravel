<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaticController extends Controller
{

    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->get();
        // $articles = Article::where('id', '<', 3)->orderBy('id', 'desc')->get();
        // $articles = DB::select('SELECT * FROM articles');
        // $articles = Article::orderBy('id', 'desc')->take(1)->get();
        // $articles = Article::orderBy('id', 'desc')->paginate(1);
        return view('static.index')->with('articles', $articles);
    }

    public function about()
    {
        $data = [
            'title' => 'Страница про нас',
            'params' => ['BMW', 'Audi', 'Volvo']
        ];
        return view('static.about')->with($data);
    }
}
