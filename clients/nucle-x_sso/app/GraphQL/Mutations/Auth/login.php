<?php

namespace App\GraphQL\Mutations\Auth;

use App\GraphQL\Mutations\Auth\Traits\TokenTrait;
use App\GraphQL\Traits\ResponseTrait;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;


final class login
{
    use TokenTrait, ResponseTrait;

    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver

        $args = (object)$args;

        if (
            Auth::attempt(['email->active' => $args->login, 'password' => $args->password])
            or
            Auth::attempt(['phones->active' => $args->login, 'password' => $args->password])
            or
            Auth::attempt(['username' => $args->login, 'password' => $args->password])
        ) {

            $user = Auth::user();


            if(!$user->account_actived or !$user->email_verified or !$user->phone_verified){

                return $this->errors("Errors","This account is diasable, please active your ".((!$user->email_verified)?"email":((!$user->phone_verified)?"phone":"account")), Response::HTTP_UNAUTHORIZED);

            }

        //generation de l'access token et du refresh token

            $getToken = $this->issueToken($args, 'password');

            if($datas = $getToken->status){

                $datas = $getToken->data;

                $datas["user"] = $user; // User::getUserByEmailOrPhone($args);

                return  $this->success("LoginSuccess", $datas) ;
            }

            return $this->errors("Errors",$getToken->data, $getToken->code);

        }else{
            return $this->errors("Errors","Incorrect login or password", Response::HTTP_UNAUTHORIZED);
        }
    }
}
