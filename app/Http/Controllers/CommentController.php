<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'text' => 'required|min:10'
        ]);

        $comment = new Comment();
        $comment->text = $request->input('text');
        $comment->article_id = $id;
        $comment->save();

        return redirect('#')->with('success', 'Комментарий добавлен');
        return 'Комментарий добавлен';
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
