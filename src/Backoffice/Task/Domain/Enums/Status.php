<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\Enums;

enum Status: string
{
    case ToDo = 'toDo';
    case InProgress = 'inProgress';
    case Accepted = 'accepted';

    public static function values()
    {
        return array_column(Status::cases(), 'value');
    }
}
