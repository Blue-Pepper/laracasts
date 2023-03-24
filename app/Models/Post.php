<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // guarded means everything is mass assigned except the ones in the array
    protected $guarded = [''];
    // fillable means everything in the array are the only ones that can be mass assigned
    //protected $fillable = ['title', 'excerpt', 'body', 'category_id', 'slug'];
    // 3rd option is to never mass assign anything. Best way.
    use HasFactory;
                                    //can dissable eagear loading by using without() function
    protected $with = ['category', 'author']; //will always get this category, and author when loading, it will become the default

    public function category(){
        //hasone , hasmany, belongsto, belongstomany
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter($query, array $filters){
        $query->where(fn($query)=>
            $query->when($filters['search'] ?? false, fn($query, $search)=>
            $query->where('title' , 'like', '%'. request('search'). '%' )
            ->orWhere('excerpt' , 'like', '%'. request('search'). '%' )))
    ;

    $query->when($filters['category'] ?? false, fn($query, $category)=>
    $query->whereHas('category', fn($query)=> $query->where('slug', $category)));


    $query->when($filters['author'] ?? false, fn($query, $author)=>
    $query->whereHas('author', fn($query)=> $query->where('username', $author)));

    }
}
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    // Route::get('posts/{post}', function(Post $post){ //Post::where('slug', $post->firstorfail());
    //     return view('post', [
    //         'post' => $post
    //     ]);
//}
