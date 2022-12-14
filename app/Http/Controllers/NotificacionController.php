<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //Traer notificaciones del usuario para pasar a la vista
        $notificaciones = auth()->user()->unreadNotifications;

        //Limpiar notificaiones leidas
        auth()->user()->unreadNotifications->markAsRead();

        return view('notificaciones.index', [
            'notificaciones' => $notificaciones
        ]);
    }
}
