<?php
namespace App\Models\Traits\Clients;
/**
 * By Trandx
 *
 * this trait have been maked to check user permissions
 */
trait permissionsTrait
{
      // Check if a user has a permission
    /**
     * haspermissions
     *
     * test user some user permission
     *
     * @param Array|String $permission take some permissions
     * @return Boolean
     * @throws conditon
     **/
    public function hasPermissions($permission)
    {
        if ($this->permissions()->where('name', $permission)->first())
        {
        return true;
        }

        return false;
    }

    // Pass in string or array to check if the user has a permission
    /**
     * hasAnypermissions
     *
     * test if user have one or more permissions passed in parameter
     *
     * @param Array $permissions list of permissions
     * @return Boolean
     * @throws conditon
     **/

    public function hasAnyPermissions($permissions)
    {

        if( $this->permissions()->whereIn("name", $permissions)->first()){

            return true;

        }else{

           return false;

        }
    }
}
