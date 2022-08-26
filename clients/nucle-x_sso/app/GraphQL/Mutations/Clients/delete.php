<?php

namespace App\GraphQL\Mutations\Clients;

use App\GraphQL\Mutations\Clients\Traits\RolesTrait;
use App\GraphQL\Traits\ResponseTrait;
use App\Models\OauthClient;
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


            $query = OauthClient::where(['id'=> $args["id"], "user_id" => $user->id]);

            $client = $query->first();

            if($client){

                $query->delete();

                //$datas["user"] = $user;
                // $datas["client"] = $client;

                // return $this->success("DeleteClientSuccess", $datas);

                return $this->success("DeleteClientSuccess", $client);


            }

            return $this->errors("Errors","inavalid client 'id'", Response::HTTP_UNAUTHORIZED);

        } catch (\Throwable $e) {

            return $this->errors("Errors",$e->getMessage(), Response::HTTP_UNAUTHORIZED);

        }
    }
}
