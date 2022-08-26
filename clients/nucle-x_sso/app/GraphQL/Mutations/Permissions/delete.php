<?php

namespace App\GraphQL\Mutations\Permissions;

use App\GraphQL\Mutations\Clients\Traits\RolesTrait;
use App\GraphQL\Traits\ResponseTrait;
use App\Models\Permission;
use Illuminate\Http\Response;

final class delete
{
    use ResponseTrait, RolesTrait;
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        try {

            $user = $this->isClientAdmin();

            if (!$user) {
                return $this->errors("Errors","unauthorized", Response::HTTP_UNAUTHORIZED);
            }


            $query = Permission::where(['id'=> $args["id"], "user_id" => $user->id]);

            $client = $query->first();

            if($client){

                $query->delete();

                return $this->success("DeletePermissionSuccess", $client);

            }

            return $this->errors("Errors","inavalid permission 'id'", Response::HTTP_UNAUTHORIZED);

        } catch (\Throwable $e) {

            return $this->errors("Errors",$e->getMessage(), Response::HTTP_UNAUTHORIZED);

        }

    }
}
