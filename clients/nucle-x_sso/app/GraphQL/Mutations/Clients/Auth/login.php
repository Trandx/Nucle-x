<?php

namespace App\GraphQL\Mutations\Clients\Auth;

use App\GraphQL\Traits\ResponseTrait;
use App\Models\User;
use Illuminate\Http\Response;

final class login
{
    use ResponseTrait;

    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver

        // verify user role

        // if user existe and have role client_admin || client_super_admin
            // return user with personal_access_token
        //else return error auth

        $args = (object)$args;
        $user = new User();
        //$user = User::AuthByPhoneOrEmailOrUsername($args);

        if (
            // Auth::attempt(['email->active' => $args->login, 'password' => $args->password])
            // or
            // Auth::attempt(['phones->active' => $args->login, 'password' => $args->password])
            // or
            // Auth::attempt(['username' => $args->login, 'password' => $args->password])
            $user = $user->AuthByPhoneOrEmailOrUsername($args)->with('roles')->first()
        ) {
           // $user = Auth::user();



            if(!$user->account_actived or !$user->email_verified or !$user->phone_verified){

                return $this->errors("Errors","This account is diasable, please active your ".((!$user->email_verified)?"email":((!$user->phone_verified)?"phone":"account")), Response::HTTP_UNAUTHORIZED);

            }

            if($user->isClientAdmin()){
                $token = $user->createToken($user->id)->accessToken;

                $datas["user"] = $user;
                $datas["access_token"] = $token;

                return  $this->success("LoginSuccess", $datas) ;

            }else{

                return $this->errors("Errors","Not authorize to check this route", Response::HTTP_UNAUTHORIZED);
            }


        }else{
            return $this->errors("Errors","Incorrect login or password", Response::HTTP_UNAUTHORIZED);
        }


    }
}
