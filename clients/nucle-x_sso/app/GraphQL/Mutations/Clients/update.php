<?php

namespace App\GraphQL\Mutations\Clients;

use App\GraphQL\Mutations\Clients\Traits\RolesTrait;
use App\GraphQL\Traits\ResponseTrait;
use App\Models\OauthClient;
use Illuminate\Http\Response;

final class update
{
    use ResponseTrait, RolesTrait ;
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        //check role

        $user = $this->isClientAdmin();

        if (!$user) {
            return $this->errors("Errors","unauthorized", Response::HTTP_UNAUTHORIZED);
        }
        //$datas["user"] = $user;

        unset($args["directive"]);


        try {
            $client = OauthClient::where(['id'=> $args["id"], "user_id" => $user->id])->first(); //->update($args);

            if($client){

                foreach($args as $property => $value) {
                    $client->$property = $value;
                }

                $client->save();

                // $datas["client"] = $client;

                // return  $this->success("UpdateClientSuccess", $datas) ;

                return  $this->success("UpdateClientSuccess", $client) ;

            }

            return $this->errors("Errors","inavalid client 'id'", Response::HTTP_UNAUTHORIZED);

        } catch (\Throwable $e) {

            return $this->errors("Errors",$e->getMessage(), Response::HTTP_UNAUTHORIZED);

        }



    }
}
