<?php

namespace App\GraphQL\Mutations\Auth;

use App\GraphQL\Traits\ResponseTrait;
use App\Models\PinCode;
use App\Models\User;
use Illuminate\Http\Response;

final class forgotPassword
{
    use ResponseTrait;
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver

        $user = User::getUserByEmailOrPhone($args);

        if(!$user){
            return $this->errors("Errors", "undefined user",  Response::HTTP_NOT_FOUND);

        }

        if(!$user->account_actived){
            return $this->errors("Errors", "this account have not activated. please do it",  Response::HTTP_NOT_FOUND);
        }

        $pincode = new PinCode();
        $param = [];

        if($user->email_verified){
            $param["msg_email"] = "Please check verification email code";
            $pincode =  $pincode->generatePinCode("email", $user->id); // createPinCode($args["user_id"], 'email');
        }

        if($user->phone_verified){
            $param["msg_phone"] = "Please check verification phone code";
            $pincode =  $pincode->generatePinCode("phone", $user->id); //createPinCode($args["user_id"], 'phone');
        }

        $pincode->send();

        return  $this->success("ForgotPasswordSuccess",
            array_merge([
                "message"=> "sending code successfully.",
            ], $param ));

    }
}
