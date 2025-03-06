<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\Actions;

use Lightit\Backoffice\Employee\App\Notifications\NewTaskAssignmentNotification;
use Lightit\Backoffice\Employee\App\Notifications\ReassignTaskAssignmentNotification;
use Lightit\Backoffice\Employee\Domain\Models\Employee;
use Lightit\Backoffice\Task\Domain\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Task\Domain\Models\Task;

use function PHPUnit\Framework\isNull;

class UpsertTaskAction
{
    public function execute(TaskDto $taskDto): Task
    {
        $newData = [
            'title' => $taskDto->getTitle(),
            'description' => $taskDto->getDescription(),
            'status' => $taskDto->getStatus()->value,
            'employee_id' => $taskDto->getEmployeeId(),
        ];
        if (isNull($taskDto->getId())) {
            $task = Task::findOrFail($taskDto->getId());
            $task->update($newData);
            $notification = new NewTaskAssignmentNotification($task);
        } else {
            $task = Task::create($newData);
            $notification = new ReassignTaskAssignmentNotification($task);
        }

        $employee = Employee::findOrFail($task->employee_id);
        $employee->notify($notification);

        return $task;
    }
}
