<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\App\Notifications;

class ReassignTaskAssignmentNotification extends TaskAssignmentNotification
{
    protected function getSubject(): string
    {
        return 'Task Reassigned';
    }

    protected function getBody(): string
    {
        return "You have been reassigned a task with title: {$this->task->title} and id: {$this->task->id}.";
    }
}
