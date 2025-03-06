<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\Actions;

use Lightit\Backoffice\Task\Domain\Models\Task;

class GetTaskAction
{
    /**
     * @param mixed $task
     */
    public function execute(Task $task): Task
    {
        return $task;
    }
}
