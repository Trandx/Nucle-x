<?php
namespace App\GraphQL\Mutations\Clients\Traits;

use Laravel\Passport\ClientRepository;

/**
 * By Trandx
 *
 * this trait permit us to generate some token type
 */
trait GenerateTokenTrait
{
    public function generateToken(Object $args, $user)
    {
        $clients = new ClientRepository();

        if($args->type =="authorization"){

            //Authorization code

            $client = $clients->create( $user->id, $args->name, $args->redirect?$args->redirect:"http://localhost", null, false, false, true );

            $client->type = $args->type;

            isset($args->description)? $client->description = $args->description:false;

            $client->save();

           // $datas["client"] = $client;

            //return  $datas ;

            return  $client ;

        }elseif ($args->type =="client") {

            //Client Credentials  // for anather server

            $client = $clients->create( $user->id, $args->name, '');

            $client->type = $args->type;

            isset($args->description)? $client->description = $args->description:false;

            $client->save();

           // $datas["client"] = $client;

            //return  $datas ;

            return  $client ;

        }elseif ($args->type =="password") {

            //Password Credentials // for any user who want to accede on another microservices

            $client = $clients->createPasswordGrantClient( $user->id, $args->name, 'http://localhost', null );

            $client->type = $args->type;

            isset($args->description)? $client->description = $args->description:false;

            $client->save();

           // $datas["client"] = $client;

            //return  $datas ;

            return  $client ;

        }elseif ($args->type =="personnal") {

            //personal client Credentials  // for user taht can admin sso

            $client = $clients->createPersonalAccessClient( $user->id, $args->name, 'http://localhost' );

            $client->type = $args->type;

            isset($args->description)? $client->description = $args->description:false;

            $client->save();

           // $datas["client"] = $client;

            //return  $datas ;

            return  $client ;

        }
    }
}
