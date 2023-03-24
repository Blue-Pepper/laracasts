<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    public function index(){
        return view('admin.posts.index', [
            'posts' => Post::all()
        ]);
    }

    protected function validatePost(?Post $post = null): array
    {
       $post ??= new Post();
       return request()->validate(
            [
                'title' => 'required',
                'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
                'excerpt' => 'required',
                'body' => 'required',
                'category_id' => 'required', Rule::exists('categories', 'id'),
                'published_at' => 'required'
            ]);
    }

    public function store(){
        // dd(request()->file());
        // $path = request()->file('thumbnail')->store('thumbnails');
        // return 'done'. $path;
        $new_post = $this->validatePost(new Post());
        $slug = Str::slug($new_post['title'], '-');
        $new_post = array_merge($new_post, [
            'user_id' => auth()->id(),
            'slug' => Str::uuid($slug)->toString(),
            'thumbnail' =>  request()->file('thumbnail')->store('thumbnails')
        ]);
        Post::create($new_post);
        return redirect('/')->with('success', 'Post published successfully!');
    }


    public function edit(Post $post){
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post){
        $new_post = $this->validatePost($post);
            $slug = Str::slug($new_post['title'], '-');
            $new_post['slug'] = Str::uuid($slug)->toString();


            if (isset($new_post['thumbnail']))
                $new_post['thumbnail'] = request()->file('thumbnail')->store('thumbnails');



            $post->update($new_post);
            return back()->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post){
        $post->delete();
        return back()->with('success', 'Post deleted successfully!');
    }
}
