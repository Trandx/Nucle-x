<?php
namespace App\Models\Traits\Clients;
/**
 * By Trandx
 *
 * this trait have been maked to check user roles
 */
trait RolesTrait
{
      // Check if a user has a role
    /**
     * hasRoles
     *
     * test user some user role
     *
     * @param Array|String $role take some roles
     * @return Boolean
     * @throws conditon
     **/
    public function hasRoles($role)
    {
        if ($this->roles()->where('name', $role)->first())
        {
        return true;
        }

        return false;
    }

    // Pass in string or array to check if the user has a role
    /**
     * hasAnyRoles
     *
     * test if user have one or more roles passed in parameter
     *
     * @param Array $roles list of roles
     * @return Boolean
     * @throws conditon
     **/

    public function hasAnyRoles($roles)
    {

        if( $this->roles()->whereIn("name", $roles)->first()){

            return true;

        }else{

           return false;

        }
    }
}
