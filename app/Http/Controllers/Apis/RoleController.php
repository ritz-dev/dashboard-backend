<?php

namespace App\Http\Controllers\Apis;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\RolePermission;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string',
            'permissions' => 'required|array', // Assuming each permission is an integer
        ]);

        $permissions = $validatedData['permissions'];
        $role = new Role;
        $role->name = $request->name;
        $role->save();

        if($role->id){
            foreach($permissions as $permission){
                $permissionId = Permission::where('name',$permission)->select('id')->first()->id;
                RolePermission::create([
                    "role_id" => $role->id,
                    "permission_id" => $permissionId,
                ]);
            }
        }

        return response()->json([
            "message" => "success",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
