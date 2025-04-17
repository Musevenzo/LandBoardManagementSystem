<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationProcessed extends Notification implements ShouldQueue
{
    use Queueable;

    protected $application;

    public function __construct($application)
    {
        $this->application = $application;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'plot_number' => $this->application->plot_number,
            'location' => $this->application->location,
            'status' => $this->application->status,
            'reason' => $this->application->rejection_reason ?? null,
            'application_id' => $this->application->id,
        ];
    }
}