<?php

namespace App\Http\Controllers\Apis;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\RolePermission;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{
            $limit = $request->input('limit', 15);
            $page = $request->input('page',1);
            $orderBy = $request->input('orderBy', 'created_at');
            $sortedBy = $request->input('sortedBy', 'desc');
            $search = $request->input('search','');

            if(!in_array($orderBy,['name','created_at','updated_at'])) {
                $orderBy = 'created_at';
            }

            if(!in_array($sortedBy, ['asc','desc'])) {
                $sortedBy = 'desc';
            }

            $rolesQuery = Role::query();

            if($search) {
                $rolesQuery->where('name', 'like', '%' . $search . '%');
            }

            $roles = $rolesQuery->select(['id', 'name', 'slug', 'description'])
                                ->orderBy($orderBy, $sortedBy)
                                ->limit($limit)
                                ->offset(($page - 1) * $limit)
                                ->get()
                                ->toArray();

            return response()->json([
                'success' => true,
                'data' => $roles,
                'message' => 'Roles retrieved successfully.'
            ],200);
        
        } catch (\Exception $e) {
            Log::error('Error Fetching roles: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occured while retrieving roles.',
                'error' => $e->getMessage(),
            ]);
        }
        
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


        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'permissions' => 'required|array',
        ]);
    
        // Check if validation fails
        if ($validatedData->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validatedData->errors(),
            ], 422);
        }

        try {

            DB::beginTransaction();

            $roleName = $request->input('name');
            $roleDescription = $request->input('description');
            $permissionsArray = $request->input('permissions');

            $role = Role::firstOrCreate([
                'name' => $roleName,
                'description' => $roleDescription
            ]);

            $permissions = collect($permissionsArray)->map(function ($permissionName) {
                return Permission::firstOrCreate(['name' => $permissionName])->id;
            });

            $role->permissions()->sync($permissions);
            
            DB::commit();

            return response()->json(['message' => 'Role and permissions saved successfully.']);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        try {
            $role = Role::with('permissions')->where('slug', $slug)->firstOrFail();

            $transformedRole = [
                'id' => $role->id,
                'name' => $role->name,
                'description' => $role->description,
                'slug' => $role->slug,
                'permissions' => $role->permissions->pluck('name')->toArray(),
            ];

            return response()->json($transformedRole,200);

        } catch (\Exception $e) {
            Log::error('Errb2or Fetching role for edit: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while retrieving the role data.',
                'error' => $e->getMessage(),
            ], 500);
        }
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
    public function update(Request $request, string $slug)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'permissions' => 'required|array',
        ]);

        // Check if validation fails
        if ($validatedData->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validatedData->errors(),
            ], 422);
        }

        try {
            DB::beginTransaction();
    
            // $role = Role::findOrFail($id);

            $role = Role::where('slug', $slug)->firstOrFail();
    
            $role->name = $request->input('name');
            $role->description = $request->input('description');
            $role->slug = substr(base64_encode(hash('sha256', $request->input('name'), true)), 0, 15);
            $role->save();
    
            $permissionsArray = $request->input('permissions');
            $permissions = collect($permissionsArray)->map(function ($permissionName) {
                return Permission::firstOrCreate(['name' => $permissionName])->id;
            });
    
            $role->permissions()->sync($permissions);
    
            DB::commit();
    
            return response()->json($role->load('permissions'), 200);
    
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating role: ' . $e->getMessage());
    
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating the role.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
