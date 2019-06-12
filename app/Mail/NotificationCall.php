<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Notification;

class NotificationCall extends Mailable
{
    use Queueable, SerializesModels;

    public $notification;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( Notification $notification )
    {
        $this->notification = $notification;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from( env('MAIL_USERNAME'), 'Alarma')
                    ->subject('Notificación Alarma')
                    ->view( 'mails.notification' )
                    ->with([
                      'id' => $this->notification->id,
                      'locate' => $this->notification->place,
                      'created_at' => $this->notification->created_at
                    ]);
    }
}
