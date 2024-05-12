<?php
namespace App\Services\Permission\Traits;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Arr;

trait hasPermission
{

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_user');
    }


    public function givePermissionTo(...$permissions)
    {
        $permission = $this->getPermission($permissions);

        if ($permission->isEmpty())
            return $this;

        $this->permissions()->syncWithoutDetaching($permission);

        return $this;
    }


    protected function getPermission($permissions)
    {
        return Permission::whereIn('name', Arr::flatten($permissions))->get();
    }


    protected function hasPermissionThroughRole(string $permission)
    {
        foreach ($this->role as $value) {

            foreach ($value->permissions as $permissions) {

                if ($permissions->name == $permission)
                    return true;
            }
        }

        return false;
    }


    public function widthrawPermission(...$permissions)
    {
        $permission = $this->getPermission($permissions);

        $this->permissions()->detach($permission);

        return $this;

    }

    public function refreshPermission(...$permissions)
    {

        $permission = $this->getPermission($permissions);

        $this->permissions()->sync($permission);

        return $this;
    }

    public function hasPermission(string $permission): bool
    {
        return $this->hasPermissionThroughRole($permission) || $this->permissions->contains('name', $permission);
    }

}