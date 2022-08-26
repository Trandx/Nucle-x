<?php

namespace App\GraphQL\Validators;

use Illuminate\Support\Facades\Auth;
use Nuwave\Lighthouse\Validation\Validator;

final class UpsertPermissionInputValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules($table=null): array
    {
        $tb = $table??"permissions";
        $user = Auth::user();

        if(!$user){
            return [] ;
        }

        return [

            'name' => [
                'required_without:id',
                "unique:$tb,name,NULL,id,user_id,$user->id",
            ],
        ];
    }
}
