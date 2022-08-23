<?php

namespace App\GraphQL\Mutations\Auth;

use App\GraphQL\Mutations\Auth\Traits\TokenTrait;
use App\GraphQL\Social\Socialize;
use App\GraphQL\Traits\ResponseTrait;
use App\Models\TokenSocialites;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

final class socialLogin
{
    use ResponseTrait, TokenTrait;
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver

        $social = new Socialize($args["social_type"], $args["token"]);

        if($data =  $social->user()){



            /// enregister le refresh token de googgle

            //$rendom_pass = Str::random(8);

            // $user = new User([
            //     "first_name" => $data->first_name,
            //     "last_name" => $data->last_name,

            //     "email" => [
            //         "active" =>$data->email,
            //         "old" => [$data->email],
            //     ],

            //     "pseudo" => $data->pseudo,

            //     "avatar" => [
            //         "thumb" => "",
            //         "real_size" =>$data->avatar,
            //         "old" => [$data->avatar],
            //     ],
            //     "email_verified" => true,
            //     "password" => bcrypt(Str::random(16)),

            // ]);

            // $user->save();



            // ellectuer une vérification avant de creer un utilisateur

            $user = User::firstOrCreate(

                ["social_id" => $data->social_id],

                User::prepareDataForCreation(

                [
                "social_id" => $data->social_id,
                "first_name" => $data->first_name,
                "last_name" => $data->last_name,

                "email" => $data->email,

                "pseudo" => $data->pseudo,

                "avatar" => $data->avatar,
                "email_verified" => true,
                "password" => bcrypt(Str::random(16)),
                "account_actived" => true,
                //"email_actived" => true,

            ]));


            /*if($google->refresh_token){

                TokenSocialites::creat(
                    [
                        "user_id" =>  $user['id'],
                        "social_type" =>  "google",
                        "refresh_token" =>  $google->refresh_token,
                        "token_expired_at" =>  now()->addSeconds($google->expires_in) ,
                        "token_created_at" =>  now(),
                    ]
                );

            }*/

            // definir comme utilisateur connecté et génération de son token

            auth()->login($user);

            $args = (object)($data->email ? ['email' => $user["email"]["active"]]: ['social_id' => $user["social_id"]]);

            $getToken = $this->issueToken($args, 'password');

            if($getToken->status){

                $datas = $getToken->data;

                $datas["user"] = $user;

                return  $this->success("LoginSuccess", $datas) ;
            }

            return $this->errors("Errors",$getToken->data, $getToken->code);

        }else{

            return $this->errors(
                "Errors",
                $social->error(),
                $social->status()
            );
        }

    }
}
