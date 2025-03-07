<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\App\Notifications;

class NewTaskAssignmentNotification extends TaskAssignmentNotification
{
    protected function getSubject(): string
    {
        return 'New Task Assigned';
    }

    protected function getBody(): string
    {
        return "You have been assigned a new task with title: {$this->task->title}.";
    }
}
