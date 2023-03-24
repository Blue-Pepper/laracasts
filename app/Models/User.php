<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [''];
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function post(){
        return $this->hasMany(Post::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }


        //access the value, even if the value is lowercase, it will be displayed as Uppercase
        //This doesn't need to be explicitly called to work.
    // public function getUsernameAttribute($username){
    //     return ucwords($username); // jhosua
    // }
        //mutates the value before it is saved in the database, does not need to be called ever
        //can also be used with setNameAttribute, setEmailAttribute, setUsernameAttribute
    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }
}
