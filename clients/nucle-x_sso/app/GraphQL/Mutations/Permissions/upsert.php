<?php

namespace App\GraphQL\Mutations\Permissions;

use App\GraphQL\Mutations\Clients\Traits\RolesTrait;
use App\GraphQL\Traits\ResponseTrait;
use App\Models\Permission;
use Illuminate\Http\Response;

final class upsert
{
    use ResponseTrait, RolesTrait;
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        //check user role
        try{
            $args["id"] = $args["id"]??null;
            $user = $this->isClientAdmin();

            if (!$user) {
                return $this->errors("Errors","unauthorized", Response::HTTP_UNAUTHORIZED);
            }

            $permissions = Permission::updateOrCreate([
                "user_id" => $user->id,
                'id' => $args["id"]
            ], $args );

            return $this->success("UpsertPermissionSuccess", $permissions);

        } catch (\Throwable $e) {

            return $this->errors("Errors",$e->getMessage(), Response::HTTP_UNAUTHORIZED);

        }


    }
}
