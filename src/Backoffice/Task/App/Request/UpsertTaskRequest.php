<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\App\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Lightit\Backoffice\Task\Domain\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Task\Domain\Enums\TaskStatus;

class UpsertTaskRequest extends FormRequest
{
    public const TITLE = 'title';

    public const DESCRIPTION = 'description';

    public const STATUS = 'status';

    public const EMPLOYEE_ID = 'employee_id';

    public function rules(): array
    {
        return [
            self::TITLE => ['required', 'string', 'max:255'],
            self::DESCRIPTION => ['required', 'string'],
            self::STATUS => ['required', Rule::enum(TaskStatus::class)],
            self::EMPLOYEE_ID => ['required', 'exists:employees,id'],
        ];
    }

    public function toDto(): TaskDto
    {
        /** @var TaskStatus $status */
        $status = $this->enum(self::STATUS, TaskStatus::class);

        return new TaskDto(
            title: $this->string(self::TITLE)->toString(),
            description: $this->string(self::DESCRIPTION)->toString(),
            status: $status,
            employee_id: $this->integer(self::EMPLOYEE_ID)
        );
    }
}
