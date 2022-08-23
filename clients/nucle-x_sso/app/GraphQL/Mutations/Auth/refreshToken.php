<?php

namespace App\GraphQL\Mutations\Auth;

use App\GraphQL\Mutations\Auth\Traits\TokenTrait;
use App\GraphQL\Traits\ResponseTrait;
use Illuminate\Http\Response;

final class refreshToken
{
    use ResponseTrait, TokenTrait;
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver

        $args = (object) $args;

        $getToken = $this->issueToken($args, 'refresh_token', true);

        if($datas = $getToken->status){

            return  $this->success("RefreshTokenSuccess", $getToken->data) ;

        }

        return $this->errors("Errors",$getToken->data, $getToken->code);
    }
}
