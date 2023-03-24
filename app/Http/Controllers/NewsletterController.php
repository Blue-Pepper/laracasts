<?php

namespace App\Http\Controllers;

use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Http\Request;
use PDO;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter){
        request()->validate([
            'email' => ['required', 'email']
        ]);
        try{
            // $newsletter = new Newsletter();
            // $newsletter->subscribe(request('email'));
            // (new Newsletter())->subscribe(request('email')); this is the same as the above
            $newsletter->subscribe(request('email')); //with this code laravel is the one in charge in creating and finding the newsletter laravel is in charge
        } catch (\Exception $e){
            \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'this email cannot be added on our email list',
            ]);
        }

        return redirect('/')
            ->with('success', 'You are now signed up for our newsletter!');
    }
}
