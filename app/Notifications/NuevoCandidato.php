<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($vacante_id, $nombre_vacante, $usuario_id)
    {
        $this->vacante_id = $vacante_id;
        $this->nombre_vacante = $nombre_vacante;
        $this->usuario_id = $usuario_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //Envia email y almacena en la base de datos
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/notificaciones');

        return (new MailMessage)
                    ->line('Has recibido un nuevo candidato en tu vacante ' . $this->nombre_vacante)
                    ->action('Ver notificaciones', $url)
                    ->line('Gracias por utilizar JobsApp');
    }

    //Almacena las notificaciones en la DB
    public function toDatabase($notifiable)
    {
        return [
            'vacante_id' => $this->vacante_id,
            'nombreVacante' => $this->nombre_vacante,
            'usuario_id' => $this->usuario_id
        ];
    }
}
