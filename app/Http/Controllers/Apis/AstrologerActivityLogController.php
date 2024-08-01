<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AstrologerActivityLog;
use App\Http\Requests\AstrologerActivityLogRequest;
use App\Http\Resources\AstrologerActivityLogResource;

class AstrologerActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aals = AstrologerActivityLog::get();
        $data = AstrologerActivityLogResource::collection($aals);

        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AstrologerActivityLogRequest $request)
    {
        $aal = new AstrologerActivityLog;
        $aal->astrologer_id = $request->astrologer_id;
        $aal->action = $request->action;
        $aal->log_timestamp = $request->log_timestamp;
        $aal->details = $request->details;
        $aal->save();

        return response()->json([
            "message" => "success"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aal = AstrologerActivityLog::findOrFail($id);
        $data = new AstrologerActivityLogResource($aal);

        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AstrologerActivityLogRequest $request, string $id)
    {
        $aal = AstrologerActivityLog::findOrFail($id);
        $aal->astrologer_id = $request->astrologer_id;
        $aal->action = $request->action;
        $aal->log_timestamp = $request->log_timestamp;
        $aal->details = $request->details;
        $aal->save();

        return response()->json([
            "message" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AstrologerActivityLog::where('id',$id)->delete();

        return response()->json([
            "message" => "success"
        ]);
    }
}
