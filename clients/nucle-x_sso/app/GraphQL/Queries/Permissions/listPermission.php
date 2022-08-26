<?php

namespace App\GraphQL\Queries\Permissions;

use App\GraphQL\Mutations\Clients\Traits\RolesTrait;
use App\GraphQL\Queries\Traits\PaginateTrait;
use App\GraphQL\Traits\ResponseTrait;
use App\Models\Permission;
use Illuminate\Http\Response;

final class listPermission
{
    use ResponseTrait, RolesTrait, PaginateTrait;
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        // args: page and limit
        try {
            $args = (object) $args;

            $user = $this->isClientAdmin();


            if (!$user) {
                return $this->errors("Errors","unauthorized", Response::HTTP_UNAUTHORIZED);
            }


            //$products = $art->products->skip($offset*$limit)->take($limit)->get()

            $query = Permission::where("user_id", $user->id)->orWhereNull("user_id");

            if(isset($args->search)){
                $query = $query->where("name", "like", "%".$args->search."%");
            }

            $datas = $this->paginate($args->page??null, $args->limit??null, $query);

            return $this->success("ListPermissionSuccess", $datas);

        } catch (\Throwable $e) {

            return $this->errors("Errors",$e->getMessage(), Response::HTTP_UNAUTHORIZED);

        }
    }
}
