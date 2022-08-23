<?php

namespace App\GraphQL\Validators;

use Nuwave\Lighthouse\Validation\Validator;

final class UpdateClientInputValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return (new CreateClientInputValidator())->rules(false);
    }
}
