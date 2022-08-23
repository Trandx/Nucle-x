<?php
    namespace App\Models\Traits\Clients;
/**
 * By Trandx
 * this trait have been maked to check user roles on client microservice
 */
trait ClientTrait
{
    use RolesTrait;
     /**
     * isClientAdmin
     *
     * return true if user have client admin role
     *
     * @return Boolean
     * @throws conditon
     **/
    public function isClientAdmin()
    {
        $clientRoles = config('global.client_admin_role');

       return $this->hasAnyRoles($clientRoles);

    }

    /**
     * isClientAdmin
     *
     * return true if user have client admin role
     *
     * @return Boolean
     * @throws conditon
     **/
    public function isClientSuperAdmin()
    {
        $clientRoles = config('global.client_admin_role.super_admin');

       return $this->hasRoles($clientRoles);

    }
}
