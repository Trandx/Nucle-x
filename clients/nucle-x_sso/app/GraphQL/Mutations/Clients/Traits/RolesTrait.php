<?php
    namespace App\GraphQL\Mutations\Clients\Traits;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

/**
 *  By Trandx
 *
 *  some fuunction to check user roles
 */
trait RolesTrait
{

    public function isClientAdmin (){

        $user = Auth::user();

        $user = User::where("id", $user->id)->first();

        if(!$user->isClientAdmin()){

            return false;

        }

        return $user;

    }

}
