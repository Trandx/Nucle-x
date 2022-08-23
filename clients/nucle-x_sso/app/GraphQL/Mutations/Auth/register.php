<?php

namespace App\GraphQL\Mutations\Auth;

use App\GraphQL\Mutations\Auth\Traits\TokenTrait;
use App\GraphQL\Traits\ResponseTrait;
use App\Models\PinCode;
use App\Models\User;
use Illuminate\Http\Response;

final class register
{
    use ResponseTrait, TokenTrait;

    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        ////////////// register step /////

        if($user = User::create(User::prepareDataForCreation($args))){

            PinCode::createPinCode($user["id"], array_keys($args), ["phone", "email"])->send();

            return  $this->success("RegisterSuccess",
                [
                    "message"=> "Your account has created successfully but it's not activated.",
                    "msg_phone" => isset($args["phone"])? "Please check verification phone code": null,
                    "msg_email" => isset($args["email"])? "Please check verification email code" :null,
                    "user" => $user
                ]);

            // auth()->login($user);

            // $args = (object)($args["email"] ? ['email' => $user["email"]["active"]]: ['social_id' => $user["social_id"]]);

            // $getToken = $this->issueToken($args, 'password');

            // if( $getToken->status){

            //     $datas = $getToken->data;

            //     $datas["user"] = $user;

            //     return  $this->success("RegisterSuccess", $datas) ;
            // }

            // return $this->errors("Errors",$getToken->data, $getToken->code);
        }

        return $this->errors("Errors","Invalid datas",  Response::HTTP_BAD_REQUEST);
    }
}
