<?php
    //ClientRepository
namespace App\GraphQL\Mutations\Clients;

use App\GraphQL\Mutations\Clients\Traits\GenerateTokenTrait;
use App\GraphQL\Mutations\Clients\Traits\RolesTrait;
use App\GraphQL\Traits\ResponseTrait;

use Illuminate\Http\Response;

final class create
{
    use ResponseTrait, RolesTrait, GenerateTokenTrait;
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        $args = (object) $args;

        //check user role

        $user = $this->isClientAdmin();

        if (!$user) {
            return $this->errors("Errors","unauthorized", Response::HTTP_UNAUTHORIZED);
        }

        /// clients type

        // $datas["user"] = $user;

        if($datas = $this->generateToken($args, $user)){
            return $this->success("CreateClientSuccess", $datas);
        }

        return $this->errors("Errors","Client type '$args->type' isn't referenced ", Response::HTTP_UNAUTHORIZED);


    }
}
