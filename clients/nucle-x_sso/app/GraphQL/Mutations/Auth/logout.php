<?php

namespace App\GraphQL\Mutations\Auth;

use App\GraphQL\Traits\ResponseTrait;
use Error;
use Illuminate\Support\Facades\Auth;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final class logout
{

    use ResponseTrait;
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args, GraphQLContext $context, ?Error $error)
    {
        // TODO implement the resolver

        $user = $context->user();

        $accessToken = Auth::user()->token();

        //DB::table('oauth_refresh_tokens')->where('access_token_id', $accessToken->id)->update(['revoked' => true]);

        $accessToken->revoke();

        return  $this->success("LogoutSuccess", ["user" => $user]) ;

    }
}
