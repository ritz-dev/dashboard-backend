<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RolePermission extends Model
{
    use HasFactory;

    protected $table = "role_permissions";

    protected $fillable = [
        "role_id",
        "permission_id"
    ];

    public function role(){
        return $this->belongsTo(Role::class,'role_id','id');
    }

    public function permission(){
        return $this->belongsTo(Permission::class,'permission_id','id');
    }
}
