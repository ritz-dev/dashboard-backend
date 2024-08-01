<?php

namespace App\Http\Controllers\Apis;

use App\Models\Developer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\DeveloperResource;
use App\Http\Requests\DeveloperStoreRequest;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $developers = Developer::get();
        $data = DeveloperResource::collection($developers);

        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeveloperStoreRequest $request)
    {
        $developer = new Developer;
        $developer->username = $request->username;
        $developer->email = $request->email;
        $developer->password = Hash::make($request->password);
        $developer->save();

        return response()->json([
            "message" => "success",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $developer = Developer::findOrFail($id);
        $data = new DeveloperResource($developer);

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
        $developer = Developer::findOrFail($id);
        $developer->username = $request->username;
        $developer->email = $request->email;
        $developer->password = Hash::make($request->password);
        $developer->save();

        return response()->json([
            "message" => "success",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Developer::where('id',$id)->delete();
        return response()->json([
            "message" => "success"
        ]);
    }
}
