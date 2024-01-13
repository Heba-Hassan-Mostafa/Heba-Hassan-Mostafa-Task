<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\Permission;

trait PermissionsTrait
{
    public function roles()
    {
        return $this->belongsToMany(Role::class,'user_roles');
    }


    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'user_permissions');
    }

    //check if a current logged in user has a role or not
    public function hasRole(... $roles) {
        foreach ($roles as $role) {
            if ($this->roles->contains('name', $role)) {
                return true;
            }
        }
        return false;
    }


    //checking the permission for a current user
    public function hasPermission($permission)
    {
        return (bool) $this->permissions->where('name', $permission->name)->count();
    }

    //checks if the permission’s role is attached to the user or not
    public function hasPermissionTo($permission)
    {
        return $this->hasPermissionOfRole($permission) || $this->hasPermission($permission);
    }


    // check if a user has permission through its role
    public function hasPermissionOfRole($permission)
    {
        foreach ($permission->roles as $role){
            if($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }



    public function getAllPermissions(array $permissions)
    {
        return Permission::whereIn('name', $permissions)->get();
    }

 //attach some permissions to the current user
    public function addPermissionsToUser(... $permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        if($permissions === null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }


    //removes all permissions for a user and then reassign the permissions provided for a user
    public function deletePermissions(... $permissions )
    {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }


    // public function updateUserPermissions(... $permissions)
    // {
    //     $this->permissions()->detach();
    //     return $this->addPermissionsToUser($permissions);
    // }

    //update user roles
    public function updateUserRoles($roles)
    {
        $this->roles()->detach();
      return  $this->roles()->sync($roles);
    }


    public function updateUserPermissions()
    {
        foreach($this->roles as $role)
        {
            $this->permissions()->detach();
            return  $this->permissions()->sync($role->permissions);
        }

    }

}
