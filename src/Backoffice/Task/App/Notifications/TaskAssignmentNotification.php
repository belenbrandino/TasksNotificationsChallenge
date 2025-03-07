<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Lightit\Backoffice\Task\Domain\Models\Task;

abstract class TaskAssignmentNotification extends Notification
{
    use Queueable;

    public function __construct(protected Task $task)
    {
    }

    /**
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    abstract protected function getSubject(): string;

    abstract protected function getBody(): string;

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage())
            ->subject($this->getSubject())
            ->view('mail.assigned-task', [
                'task'    => $this->task,
                'bodyMessage' => $this->getBody(),
            ]);
    }
}
