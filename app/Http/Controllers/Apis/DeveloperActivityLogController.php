<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DeveloperActivityLog;
use App\Http\Requests\DeveloperActivityLogRequest;
use App\Http\Resources\DeveloperActivityLogResource;

class DeveloperActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dals = DeveloperActivityLog::get();
        $data = DeveloperActivityLogResource::collection($dals);

        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeveloperActivityLogRequest $request)
    {
        $dal = new DeveloperActivityLog;
        $dal->developer_id = $request->developer_id;
        $dal->action = $request->action;
        $dal->log_timestamp = $request->log_timestamp;
        $dal->details = $request->details;
        $dal->save();

        return response()->json([
            "message" => "success"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dal = DeveloperActivityLog::findOrFail($id);
        $data = new DeveloperActivityLogResource($dal);

        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeveloperActivityLogRequest $request, string $id)
    {
        $dal = DeveloperActivityLog::findOrFail($id);
        $dal->developer_id = $request->developer_id;
        $dal->action = $request->action;
        $dal->log_timestamp = $request->log_timestamp;
        $dal->details = $request->details;
        $dal->save();

        return response()->json([
            "message" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DeveloperActivityLog::where('id',$id)->delete();

        return response()->json([
            "message" => "success"
        ]);
    }
}
