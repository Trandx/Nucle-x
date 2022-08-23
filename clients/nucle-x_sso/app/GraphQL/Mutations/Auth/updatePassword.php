<?php

namespace App\GraphQL\Mutations\Auth;

use App\GraphQL\Traits\ResponseTrait;
use App\Models\PinCode;
use App\Models\User;
use Illuminate\Http\Response;
use Nuwave\Lighthouse\Execution\Resolved;
use Nuwave\Lighthouse\Schema\Context;

final class updatePassword
{
    use ResponseTrait;
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args, Context $context = null, Resolved $resolved)
    {
        // TODO implement the resolver


        // l'utilsateur doit etre auth

        $user = User::where("", $args)->where("", );

        // isset($args["phone"]) ? User::where("password", $args["password"])->where('phone->active', $args["phone"])->first(): User::where("password", $args["password"])->where('email->active',$args["email"]);


        if(!$user){
            return $this->errors("Errors", "undefined user",  Response::HTTP_NOT_FOUND);
        }

        if(/*$pincode = */PinCode::isValidPinCode($user->id, "email"/*isset($args["email"])?"email":"phone"*/, $args["code"])){

            $user->password = bcrypt($args["password"]);

            $user->save();

            return $this->success("ResetPasswordSuccess", ["message" => "reset password successfully"], Response::HTTP_OK);
        }

        return $this->errors("Errors", "invalid pin code",  Response::HTTP_NOT_FOUND);

    }
}
