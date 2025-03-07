<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\Actions;

use Lightit\Backoffice\Employee\Domain\Models\Employee;
use Lightit\Backoffice\Task\App\Notifications\NewTaskAssignmentNotification;
use Lightit\Backoffice\Task\Domain\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Task\Domain\Models\Task;

class StoreTaskAction
{
    public function execute(TaskDto $taskDto): Task
    {
        $task = Task::create([
            'title' => $taskDto->getTitle(),
            'description' => $taskDto->getDescription(),
            'status' => $taskDto->getStatus()->value,
            'employee_id' => $taskDto->getEmployeeId(),
        ]);

        $notification = new NewTaskAssignmentNotification($task);
        $employee = Employee::findOrFail($task->employee_id);
        $employee->notify($notification);

        return $task;
    }
}
