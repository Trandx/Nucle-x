<?php

namespace App\GraphQL\Mutations\Auth;

use App\GraphQL\Traits\ResponseTrait;
use App\Models\PinCode;
use App\Models\User;
use Illuminate\Http\Response;

final class verifyCode
{
    use ResponseTrait;

    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the

       //$updateData["account_actived"] = true;

       $verifyCode =  PinCode::where('user_id', $args["user_id"]);

       $user = User::where('id',  $args["user_id"])->where('account_actived',  false)->first();

    if(!$user){
        return $this->errors("Errors", "this account is already actived",  Response::HTTP_NOT_FOUND);

    }

       foreach ($args as $key => $value) {

            if(in_array($key, ["phone_code", "email_code"])){

                $type = explode("_", $key)[0];

                $verifyCode = $verifyCode->where("pin_code->{$type}->code", $value);

                $user->{$type."_verified"} = true;

                //$updateData[$type."_verified"] = true;
            }
       }

       if($verifyCode = $verifyCode->first()){

            /// si les codes sont valides nous activons le compte

            // si non on gère les cas

            if(isset($args["email_code"], $verifyCode->pin_code["email"]) and $verifyCode->pin_code["email"]["expired_date"] <= now()){

                $error["msg_email"] = "email code is exipired please click on resend btn to get another";
            }

            if(isset($args["phone_code"], $verifyCode->pin_code["phone"]) and $verifyCode->pin_code["phone"]["expired_date"] <= now()){

                $error["msg_phone"] = "phone code is exipired please click on resend  btn to get another";

            }

            if (isset($error)){
                $error = [
                    "message"=> "Expired code",
                    "msg_phone" => isset($error["msg_phone"])? $error["msg_phone"]: null,
                    "msg_email" => isset($error["msg_email"])? $error["msg_email"] :null,
                    "sended_datas" => $args
                ];

                return $this->errors("Errors", json_encode($error),  Response::HTTP_NOT_FOUND);
            }


                //->update($updateData);

                //// avant d'activer le compte je dois vérifier que email ou le phone est activé

                if ($user->phone_verified and $user->email_verified) {
                    $user->account_actived = true;
                }

                $user->save();

                return  $this->success("VerifyCodeSuccess",
                    [
                        "message"=> "Your account is activated successfully.",
                        "have_other" =>  (!$user->phone_verified or !$user->email_verified) ?true:false,
                        "code_for" =>  !$user->phone_verified? "phone not actived" :(!$user->email_verified? "email not actived" :null),
                        "user" => $user
                    ]);
            }


            $error =[
                "message"=> "Invalid user id or verification code",
                // "msg_phone" => isset($args["phone_code"])? "Invalid phone code": null,
                // "msg_email" => isset($args["email_code"])? "Invalid email code" :null,
                "sended_datas" => $args
            ];

            return $this->errors("Errors", json_encode($error),  Response::HTTP_NOT_FOUND);

    }
}
