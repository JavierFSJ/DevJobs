<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        
        VerifyEmail::toMailUsing(function($notifiable , $url) {
            return (new MailMessage)->subject('Verificar Cuenta')
                ->line('Tu cuenta ya esta casi lista, solo debes presionar el enlace a continuación')
                ->action('Confirmar cuenta' , $url)
                ->line('Si no creaste esta cuenta, puedes ignorar este mensaje');
                
        });
    }
}
