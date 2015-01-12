<?php

namespace LockDemo\LockOverrides;

use DB;
use BeatSwitch\Lock\Roles\Role;
use BeatSwitch\Lock\Drivers\Driver;
use BeatSwitch\Lock\Callers\Caller;
use BeatSwitch\Lock\Permissions\Permission;
use BeatSwitch\Lock\Permissions\PermissionFactory;

class LockDemoDriver implements Driver
{
    /**
     * Returns all the permissions for a caller
     *
     * @param \BeatSwitch\Lock\Callers\Caller $caller
     * @return \BeatSwitch\Lock\Permissions\Permission[]
     */
    public function getCallerPermissions(Caller $caller)
    {
        $permissions = DB::table('permissions')
                         ->join('permissionables', function($join) use ($caller) {
                             $join->on('permissions.id', '=', 'permissionables.permission_id')
                                  ->where('permissionables.caller_type', '=', $caller->getCallerType())
                                  ->where('permissionables.caller_id', '=', $caller->getCallerId());

                         })
                         ->get(['permissions.*']);

        return PermissionFactory::createFromData($permissions);
    }

    /**
     * Stores a new permission for a caller
     *
     * @param \BeatSwitch\Lock\Callers\Caller $caller
     * @param \BeatSwitch\Lock\Permissions\Permission
     * @return void
     */
    public function storeCallerPermission(Caller $caller, Permission $permission)
    {

    }

    /**
     * Removes a permission for a caller
     *
     * @param \BeatSwitch\Lock\Callers\Caller $caller
     * @param \BeatSwitch\Lock\Permissions\Permission
     * @return void
     */
    public function removeCallerPermission(Caller $caller, Permission $permission)
    {

    }

    /**
     * Checks if a permission is stored for a caller
     *
     * @param \BeatSwitch\Lock\Callers\Caller $caller
     * @param \BeatSwitch\Lock\Permissions\Permission
     * @return bool
     */
    public function hasCallerPermission(Caller $caller, Permission $permission)
    {

    }

    /**
     * Returns all the permissions for a role
     *
     * @param \BeatSwitch\Lock\Roles\Role $role
     * @return \BeatSwitch\Lock\Permissions\Permission[]
     */
    public function getRolePermissions(Role $role)
    {

    }

    /**
     * Stores a new permission for a role
     *
     * @param \BeatSwitch\Lock\Roles\Role $role
     * @param \BeatSwitch\Lock\Permissions\Permission
     * @return void
     */
    public function storeRolePermission(Role $role, Permission $permission)
    {

    }

    /**
     * Removes a permission for a role
     *
     * @param \BeatSwitch\Lock\Roles\Role $role
     * @param \BeatSwitch\Lock\Permissions\Permission
     * @return void
     */
    public function removeRolePermission(Role $role, Permission $permission)
    {

    }

    /**
     * Checks if a permission is stored for a role
     *
     * @param \BeatSwitch\Lock\Roles\Role $role
     * @param \BeatSwitch\Lock\Permissions\Permission
     * @return bool
     */
    public function hasRolePermission(Role $role, Permission $permission)
    {

    }

} 