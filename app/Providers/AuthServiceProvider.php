<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Configuración de la información del correo de verificación
        VerifyEmail::toMailUsing( function($notifiable, $url) {
            return (new MailMessage)
                //Asunto del correo
                ->subject('Verificar Cuenta JobsApp')
                //Parrafo del correo
                ->line('Tu cuenta está casi lista, presiona el siguiente enlace para verificarla.')
                //Boton de verificación
                ->action('Confirmar cuenta', $url)
                ->line('Si no solicitaste crear esta cuenta, puedes ignorar este mensaje');
        });
    }
}
