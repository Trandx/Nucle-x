<?php

namespace App\GraphQL\Mutations\Auth;

use App\GraphQL\Traits\ResponseTrait;
use App\Models\PinCode;
use App\Models\User;
use Illuminate\Http\Response;

final class resetPassword
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

        if(/*$pincode = */PinCode::isValidPinCode($user->id, isset($args["email"])?"email":"phone", $args["code"])){

            $user->password = bcrypt($args["password"]);

            $user->save();

            return $this->success("ResetPasswordSuccess", ["message" => "reset password successfully"], Response::HTTP_OK);
        }

        return $this->errors("Errors", "invalid pin code",  Response::HTTP_NOT_FOUND);


    }
}
