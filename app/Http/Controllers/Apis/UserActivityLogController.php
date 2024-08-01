<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Models\UserActivityLog;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserActivityLogRequest;
use App\Http\Resources\UserActivityLogResource;

class UserActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $uals = UserActivityLog::get();
        $data = UserActivityLogResource::collection($uals);

        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserActivityLogRequest $request)
    {
        $ual = new UserActivityLog;
        $ual->user_id = $request->user_id;
        $ual->action = $request->action;
        $ual->log_timestamp = $request->log_timestamp;
        $ual->details = $request->details;
        $ual->save();

        return response()->json([
            "message" => "success"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ual = UserActivityLog::findOrFail($id);
        $data = new UserActivityLogResource($ual);

        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserActivityLogRequest $request, string $id)
    {
        $ual = UserActivityLog::findOrFail($id);
        $ual->user_id = $request->user_id;
        $ual->action = $request->action;
        $ual->log_timestamp = $request->log_timestamp;
        $ual->details = $request->details;
        $ual->save();

        return response()->json([
            "message" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        UserActivityLog::where('id',$id)->delete();

        return response()->json([
            "message" => "success"
        ]);
    }
}
