<?php

namespace App\GraphQL\Mutations\Auth\Traits;

use Illuminate\Http\Request;
//use Laravel\Passport\Client;

trait TokenTrait
{
    private $client;

    public function issueToken($args, $grantType, $refresh=false, $scope = "*")
    {
        //$this->client = Client::find(config('global.internal_client_id'));

        $params = [
            'grant_type' => $grantType,
            'client_id' => config('global.internal_client_id'),
            'client_secret' => config('global.internal_client_secret'),
            'scope' => $scope
        ];

        if(!$refresh){
            $params = array_merge($params,
            [
                'username' => $args->login, //$args->email ?? $args->phone ?? $args->social_id,
                'password' =>  "every chars", // $args->password // go into user model to disable it] )
            ]);
        }else{
            $params = array_merge($params,
            [
                'refresh_token' => $args->refresh_token
            ]);
        }

        $url = route("passport.token");

        $request = Request::create($url, 'POST', $params);

        $response = app()->handle($request);

        if($response->status() >=300){
            return (object)["status" => false, "data" => $response->getContent(), "code" => $response->status()];
        }

        return (object)["status" => true, "data" => json_decode($response->getContent(), true), "code" => $response->status()];

    }
}

