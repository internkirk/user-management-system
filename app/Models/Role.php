<?php

namespace App\Models;

use App\Models\User;
use App\Services\Permission\Traits\hasPermission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory, hasPermission;


    public $table = 'roles';

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission');
    }

    protected $fillable = [
        'persian_name', 'name'
    ];


}
