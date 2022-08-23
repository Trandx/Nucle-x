<?php

namespace App\GraphQL\Mutations\Auth;

use App\GraphQL\Traits\ResponseTrait;
use App\Models\PinCode;
use App\Models\User;
use Illuminate\Http\Response;

final class resendCode
{
    use ResponseTrait;
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = User::where('id', $args["user_id"])->first();

        if($user->email_verified and $user->phone_verified){
            return $this->errors("Errors", "Email and phone have already activated",  Response::HTTP_NOT_FOUND);
        }

        // chercher l'option qui est inactive et l'envoyer le code d'activation
        $pincode = new PinCode();
        $param = [];

        if(!$user->email_verified){
            $param["msg_email"] = "Please check verification email code";
            $pincode =  $pincode->generatePinCode("email", $args["user_id"]); // createPinCode($args["user_id"], 'email');
        }

        if(!$user->phone_verified){
            $param["msg_phone"] = "Please check verification phone code";
            $pincode =  $pincode->generatePinCode("phone", $args["user_id"]); //createPinCode($args["user_id"], 'phone');
        }

       $pincode->send();

        return  $this->success("ResendCodeSuccess",
            array_merge([
                "message"=> "sending code successfully.",
                "user" => $user
            ], $param ));
    }
}
