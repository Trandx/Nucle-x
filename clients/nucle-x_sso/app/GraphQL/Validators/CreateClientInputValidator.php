<?php

namespace App\GraphQL\Validators;

use Illuminate\Support\Facades\Auth;
use Nuwave\Lighthouse\Validation\Validator;

final class CreateClientInputValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules($required = true): array
    {
        $user = Auth::user();

        if(!$user){
            return [] ;
        }

        return [

            'name' => [
                $required?"required":null,
                'unique:oauth_clients,name,NULL,id,user_id,'.$user->id,
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'your have already take this name',
            'name.required' => 'The name.type field is required.',
        ];
    }


}
