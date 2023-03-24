<?php

namespace App\Providers;

use App\Http\Controllers\NewsletterController;
use App\Models\User;
use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;
use Symfony\Component\HttpFoundation\Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        app()->bind(Newsletter::class, function(){
            $client = (new ApiClient)->setConfig([ // creating a new ApiClient then setconfig in one line
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us9'
            ]);
            return new MailchimpNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        PaginationPaginator::useTailwind();
        Gate::define('admin', function (User $user){
            return $user->username === 'jhosuafungo102';
        });

        Blade::if('admin', function(){
            return request()->user()?->can('admin'); // ? means optional
        });
    }
}
