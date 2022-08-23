<?php

namespace App\GraphQL\Queries\Clients;

use App\GraphQL\Mutations\Clients\Traits\RolesTrait;
use App\GraphQL\Queries\Traits\PaginateTrait;
use App\GraphQL\Traits\ResponseTrait;
use App\Models\OauthClient;
use Illuminate\Http\Response;

final class listClient
{
    use ResponseTrait, RolesTrait, PaginateTrait;
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // args: page and limit
        $args = (object) $args;

        $user = $this->isClientAdmin();


        if (!$user) {
            return $this->errors("Errors","unauthorized", Response::HTTP_UNAUTHORIZED);
        }

        try {
            //$products = $art->products->skip($offset*$limit)->take($limit)->get()

            $query = OauthClient::where([ "user_id" => $user->id]);

            if(isset($args->search)){
                $query = $query->where("name", "like", "%".$args->search."%");
            }

            $datas = $this->paginate($args->page??null, $args->limit??null, $query);

            return $this->success("ListClientSuccess", $datas);

        } catch (\Throwable $e) {

            return $this->errors("Errors",$e->getMessage(), Response::HTTP_UNAUTHORIZED);

        }
    }
}
