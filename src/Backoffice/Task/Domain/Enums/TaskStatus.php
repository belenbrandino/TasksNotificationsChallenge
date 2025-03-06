<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\Enums;

enum TaskStatus: string
{
    case ToDo = 'toDo';
    case InProgress = 'inProgress';
    case Accepted = 'accepted';

    public static function values(): array
    {
        return array_column(TaskStatus::cases(), 'value');
    }
}
