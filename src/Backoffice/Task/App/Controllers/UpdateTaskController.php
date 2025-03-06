<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Task\App\Request\UpsertTaskRequest;
use Lightit\Backoffice\Task\App\Transformers\TaskTransformer;
use Lightit\Backoffice\Task\Domain\Actions\UpdateTaskAction;
use Lightit\Backoffice\Task\Domain\Models\Task;

class UpdateTaskController
{
    public function __invoke(Task $task, UpsertTaskRequest $request, UpdateTaskAction $action): JsonResponse
    {
        $updatedTask = $action->execute($task, $request->toDto());

        return responder()
            ->success($updatedTask, TaskTransformer::class)
            ->respond();
    }
}
