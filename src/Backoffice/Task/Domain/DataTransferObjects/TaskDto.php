<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\DataTransferObjects;

use Lightit\Backoffice\Task\Domain\Enums\Status;

class TaskDto
{
    public function __construct(
        private readonly int|null $id,
        private readonly string $title,
        private readonly string $description,
        private readonly Status $status,
        private readonly int $employee_id,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getEmployeeId(): int
    {
        return $this->employee_id;
    }
}
