<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employee\App\Request;

use Illuminate\Foundation\Http\FormRequest;
use Lightit\Backoffice\Employee\Domain\DataTransferObjects\EmployeeDto;

class StoreEmployeeRequest extends FormRequest
{
    public const NAME = 'name';

    public const EMAIL = 'email';

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            self::NAME => ['required', 'string', 'max:255'],
            self::EMAIL => ['required', 'email:strict', 'unique:employees'],
        ];
    }

    public function toDto(): EmployeeDto
    {
        return new EmployeeDto(
            name: $this->string(self::NAME)->toString(),
            email: $this->string(self::EMAIL)->toString(),
        );
    }
}
