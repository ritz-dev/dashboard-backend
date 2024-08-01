<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Models\AstrologerTool;
use App\Http\Controllers\Controller;
use App\Http\Requests\AstrologerToolRequest;
use App\Http\Resources\AstrologerToolResource;

class AstrologerToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $astrologerTools = AstrologerTool::get();
        $data = AstrologerToolResource::collection($astrologerTools);

        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AstrologerToolRequest $request)
    {
        $astrologerTool = new AstrologerTool;
        $astrologerTool->astrologer_id = $request->astrologer_id;
        $astrologerTool->astrological_tool_id = $request->astrological_tool_id;
        $astrologerTool->charge = $request->charge;
        $astrologerTool->save();

        return response()->json([
            "message" => "success"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $astrologerTool = AstrologerTool::findOrFail($id);
        $data = new AstrologerToolResource($astrologerTool);

        return response()->json([
            "message" => "message",
            "data" => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $astrologerTool = AstrologerTool::findOrFail($id);
        $astrologerTool->astrologer_id = $request->astrologer_id;
        $astrologerTool->astrological_tool_id = $request->astrological_tool_id;
        $astrologerTool->charge = $request->charge;
        $astrologerTool->save();

        return response()->json([
            "message" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AstrologerTool::where('id',$id)->delete();
        return response()->json([
            "message" => "success"
        ]);
    }
}
