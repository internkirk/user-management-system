<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use App\Services\Permission\Traits\hasRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory, hasRole;

    public $table = 'permissions';
    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_permission');
    }

}
