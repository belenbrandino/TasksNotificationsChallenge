<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\Actions;

use Lightit\Backoffice\Employee\Domain\Models\Employee;
use Lightit\Backoffice\Task\App\Notifications\ReassignTaskAssignmentNotification;
use Lightit\Backoffice\Task\Domain\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Task\Domain\Models\Task;

class UpdateTaskAction
{
    public function execute(Task $task, TaskDto $taskDto): Task
    {
        $task->update([
            'title' => $taskDto->getTitle(),
            'description' => $taskDto->getDescription(),
            'status' => $taskDto->getStatus()->value,
            'employee_id' => $taskDto->getEmployeeId(),
        ]);
        $notification = new ReassignTaskAssignmentNotification($task);

        $employee = Employee::findOrFail($task->employee_id);
        $employee->notify($notification);

        return $task;
    }
}
