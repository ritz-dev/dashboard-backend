<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Models\Administrator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\AdministratorResource;
use App\Http\Requests\AdministratorStoreRequest;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $administrators = Administrator::get();
        $data = AdministratorResource::collection($administrators);
        return response()->json([
            "message" => "success",
            "data" => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdministratorStoreRequest $request)
    {
        $administrator = new Administrator;
        $administrator->username = $request->username;
        $administrator->email = $request->email;
        $administrator->role = $request->role;
        $administrator->password = Hash::make($request->password);
        $administrator->save();

        return response()->json([
            "message" => "success",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $administrator = Administrator::findOrFail($id);
        $data = new AdministratorResource($administrator);

        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $administrator = Administrator::findOrFail($id);
        $administrator->username = $request->username;
        $administrator->email = $request->email;
        $administrator->role = $request->role;
        $administrator->password = Hash::make($request->password);
        $administrator->save();

        return response()->json([
            "message" => "success",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Administrator::where('id',$id)->delete();
        return response()->json([
            "message" => "success"
        ]);
    }
}
