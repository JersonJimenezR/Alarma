<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Database;

class Notification extends Model
{
  use Database;

  protected $fillable = [ 'type', 'place', 'status' ];

  // Obtener todas las notificaciones

  public function getNotifications()
  {
    return Notification::where([ 'status' => '1' ])
      ->orderBy('created_at','desc')
      ->paginate(5);
  }

  // Guardar o actualizar un nuevo registro

  public function saveOrUpdate(array $data)
	{
		return $this->persist( Notification::class, $data);

	}

  //-- Contar el total de notificaciones

  public function getCountNotifications()
  {
      return Notification::count();
  }

  // Obtener la última notificación registrada

  public function getLastNotification()
  {
    return Notification::orderBy('created_at','desc')->first();
  }
}
