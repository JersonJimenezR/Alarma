<?php

namespace App\Http\Controllers;

use app\User;
use App\Mail\NotificationCall;
use Facades\App\Models\Notification;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::getNotifications();
        return view('home' , [ 'notifications' => $notifications ]);
    }


    public function queryDatabase()
    {
      $countNotifications = Notification::getCountNotifications();
      if( $countNotifications > $_GET{'data'} )
      {
        return [ 'status' => true, 'data' => $countNotifications ];
      }

      return [ 'status' => false, 'data' => $countNotifications ];


    }

    public function alert( )
    {
      // Enviar Email

      $lastNotification = Notification::getLastNotification();

      Mail::to('jerson.jimenez@utp.edu.co')
              ->send(new NotificationCall( $lastNotification ));

      // Retornar vista de alerta

      return View('realTime.view', [
        'img' => 'img/incorrecto.gif',
        'databaseLength' => Notification::getCountNotifications(),
        'alert' => true
       ]);

    }


    public function store()
    {
      $data = [

        'type' => 'Notificación',
        'place' => 'Dormitorio',
        'status' => '1'

      ];

      $response = Notification::saveOrUpdate( $data );
      return Response()->json( $response );
    }


    public function realTimeView()
    {
      return View('realTime.view', [
        'img' => 'img/correcto.gif',
        'databaseLength' => Notification::getCountNotifications(),
        'alert' => false
       ]);
    }
}
