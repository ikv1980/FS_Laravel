<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:170|min:10',
            'anons' => 'required|min:10',
            'text' => 'required|min:10',
            'main_image' => 'nullable|image|max:500' // необязательное поле, не более 500КБт
        ]);

        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image')->getClientOriginalName();
            $image_name_without_ext = pathinfo($file, PATHINFO_FILENAME);

            $ext = $request->file('main_image')->getClientOriginalExtension();

            $image_name = $image_name_without_ext . "_" . time() . "." . $ext;
            $request->file('main_image')->storeAs('public/img/articles', $image_name);
        } else
            $image_name = 'noimage.jpg';

        $article = new Article();
        $article->title = $request->input('title');
        $article->anons = $request->input('anons');
        $article->text = $request->input('text');
        $article->user_id = auth()->user()->id;
        $article->image = $image_name;
        $article->save();

        return redirect('/')->with('success', 'Статья добавлена');
    }

    // public function show($id)
    // {     
    //     $article = Article::find($id);
    //     return view('articles.show')->with('article', $article);
    // }

    public function show($id)
    {
        $article = Article::find($id);
        $comment = Comment::where('article_id', '=', $id)->orderBy('id', 'desc')->get();
        return view('articles.show', compact('article', 'comment'));
    }

    public function edit($id)
    {
        $article = Article::find($id);

        if (auth()->user()->id != $article->user_id)
            return redirect('/')->with('error', 'Это не ваша статья');

        return view('articles.edit')->with('article', $article);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:170|min:10',
            'anons' => 'required|min:10',
            'text' => 'required|min:10',
            'main_image' => 'nullable|image|max:500'
        ]);

        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image')->getClientOriginalName();
            $image_name_without_ext = pathinfo($file, PATHINFO_FILENAME);

            $ext = $request->file('main_image')->getClientOriginalExtension();

            $image_name = $image_name_without_ext . "_" . time() . "." . $ext;
            $request->file('main_image')->storeAs('public/img/articles', $image_name);
        }

        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->anons = $request->input('anons');
        $article->text = $request->input('text');

        if ($request->hasFile('main_image')) {
            if ($article->image != "noimage.jpg")
                Storage::delete('public/img/articles/' . $article->image);

            $article->image = $image_name;
        }

        $article->save();

        return redirect('/')->with('success', 'Статья была обновлена');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        if (auth()->user()->id != $article->user_id)
            return redirect('/')->with('error', 'Это не ваша статья');

        if ($article->image != "noimage.jpg")
            Storage::delete('public/img/articles/' . $article->image);

        $article->delete();
        return redirect('/')->with('success', 'Статья была удалена');
    }
}
