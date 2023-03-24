<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Query\IndexHint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index(){
     return view('posts.index',[
        'posts' => Post::latest()->filter(request(['search', 'category','author']))->paginate(6)->withQueryString()
     ]);
    }

    public function show(Post $post){
        return view('posts.show', [
            'post' => $post->load('comment.author'),
        ]);
    }

    public function create(){
        return view('admin.posts.create');
    }
}
