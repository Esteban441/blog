<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index')->with([
            'posts' => Post::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:200',
            'contenido' => 'required|max:1000',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->titulo = $request->titulo;
        $post->contenido = $request->contenido;

        $avatarPath = null;

        if ($request->hasFile('foto')) {
            $avatarPath = $request->file('foto')->store('posts', 'public');
        }

        $post->foto = $avatarPath;
        $post->save();

        return redirect('/')->with([
            'alert' => ['success', 'Exito', 'Se agrego un post.']
        ]);
    }
}
