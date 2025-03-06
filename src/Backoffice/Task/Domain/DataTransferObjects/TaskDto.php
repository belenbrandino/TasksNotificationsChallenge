<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\DataTransferObjects;

use Lightit\Backoffice\Task\Domain\Enums\TaskStatus;

class TaskDto
{
    public function __construct(
        private readonly string $title,
        private readonly string $description,
        private readonly TaskStatus $status,
        private readonly int $employee_id,
    ) {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getStatus(): TaskStatus
    {
        return $this->status;
    }

    public function getEmployeeId(): int
    {
        return $this->employee_id;
    }
}
