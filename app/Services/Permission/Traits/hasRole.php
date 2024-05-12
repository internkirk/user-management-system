<?php
namespace App\Services\Permission\Traits;

use App\Models\Role;
use Illuminate\Support\Arr;


trait hasRole
{
    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }


    public function giveRoleTo(...$role)
    {
        $roles = $this->getRoles($role);

        if($roles->isEmpty()) return $this;

       return $this->role()->syncWithoutDetaching($roles);

    }

    public function widthrawRole(... $roles)
    {
        $role = $this->getRoles($roles);
        
        $this->role()->detach($role);
        
        return $this;
    }


    public function refreshRole(... $roles)
    {
        $role = $this->getRoles($roles);

        $this->role()->sync($role);

        return $this;
    }

    public function hasRole(string $role): bool
    {
      return $this->role->contains('name' , $role);
    }


    protected function getRoles(...$role)
    {
        return Role::whereIn('name', Arr::flatten($role))->get();
    }
}