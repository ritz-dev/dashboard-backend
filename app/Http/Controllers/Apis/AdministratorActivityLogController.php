<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdministratorActivityLog;
use App\Http\Requests\AdministratorActivityLogRequest;
use App\Http\Resources\AdministratorActivityLogResource;

class AdministratorActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adals = AdministratorActivityLog::get();
        $data = AdministratorActivityLogResource::collection($adals);

        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdministratorActivityLogRequest $request)
    {
        $adal = new AdministratorActivityLog;
        $adal->administrator_id = $request->administrator_id;
        $adal->action = $request->action;
        $adal->log_timestamp = $request->log_timestamp;
        $adal->details = $request->details;
        $adal->save();

        return response()->json([
            "message" => "success"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $adal = AdministratorActivityLog::findOrFail($id);
        $data = new AdministratorActivityLogResource($adal);

        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdministratorActivityLogRequest $request, string $id)
    {
        $adal = AdministratorActivityLog::findOrFail($id);
        $adal->administrator_id = $request->administrator_id;
        $adal->action = $request->action;
        $adal->log_timestamp = $request->log_timestamp;
        $adal->details = $request->details;
        $adal->save();

        return response()->json([
            "message" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AdministratorActivityLog::where('id',$id)->delete();

        return response()->json([
            "message" => "success"
        ]);
    }
}
