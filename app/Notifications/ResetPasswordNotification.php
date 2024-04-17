<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    public $token;
    public $email; 
    public $firstName; 

    /**
     * Create a new notification instance.
     */
    public function __construct($token, $email, $firstName)
    {
        $this->token = $token;
        $this->email = $email;
        $this->firstName = $firstName;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = 'http://atendimentopro.test/password/reset/'.$this->token.'?email='.$this->email;
        $minutos = config('auth.passwords.'.config('auth.defaults.passwords').'.expire');
       return (new MailMessage)
        ->subject('Atualização de Senha - Atendimento Pro')
        ->greeting('Olá '.$this->firstName .', como está?')
        ->line('Esqueceu sua senha? Não se preocupe vamos te ajudar.')
        ->action('Clique aqui para modificar sua senha', $url)
        ->line('Este link irá expirar em '.$minutos.' minutos.')
        ->line('Se você não solicitou alteração de senha, desconsidere este e-mail.')
        ->salutation('Até breve,');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}