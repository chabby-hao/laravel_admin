<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Warning extends Notification implements ShouldQueue
{
    use Queueable;

    private $data;
    private $subject;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data, $subject = '监控预警')
    {
        //
        $this->data = $data;
        $this->subject = $subject;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $mail = (new MailMessage)->template('vendor.notifications.warning')
            ->from(env('MAIL_FROM_ADDRESS'), '预警系统')
            ->subject($this->subject)
            ->greeting('异常信息:');
        foreach ($this->data as $line){
            $mail->line($line);
        }
        return $mail;
        /*return (new MailMessage)->template('vendor.notifications.warning')
            //->from('system@vipcare.com', '预警系统')
            ->subject($this->subject)
            ->greeting('异常信息:')
            ->line($this->data);*/
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
