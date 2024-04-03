<?php

namespace App\Notifications;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Twilio\Rest\Client;

class NewAppointmentCreated extends Notification
{
    use Queueable;

    protected $appointment;

    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    public function via($notifiable)
    {
        return ['twilio'];
    }

    public function toTwilio($notifiable)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_WHATSAPP_NUMBER");
        $client = new Client($account_sid, $auth_token);

        $message = "Um novo agendamento foi criado! Detalhes:\n";
        $message .= "Data de início: {$this->appointment->started_at}\n";
        $message .= "Data de término: {$this->appointment->ends_at}\n";

        // Buscar o usuário administrador
        $admin = User::whereRole(UserRoleEnum::ADMIN)->first();

        $client->messages->create(
            'whatsapp:+'. $admin->phone, // número do destinatário, não sei se precisa do '+'
            array(
                'from' => 'whatsapp:' . $twilio_number,
                'body' => $message
            )
        );
    }
}
