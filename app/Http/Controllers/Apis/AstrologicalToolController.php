<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Models\AstrologicalTool;
use App\Http\Controllers\Controller;
use App\Http\Requests\AstrologicalToolRequest;
use App\Http\Resources\AstrologicalToolResource;

class AstrologicalToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $astrologicalTools = AstrologicalTool::get();
        $data = AstrologicalToolResource::collection($astrologicalTools);

        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AstrologicalToolRequest $request)
    {
        $astrologicalTool = new AstrologicalTool;
        $astrologicalTool->tool_name = $request->tool_name;
        $astrologicalTool->description = $request->description;
        $astrologicalTool->price = $request->price;
        $astrologicalTool->developer_id = $request->developer_id;
        $astrologicalTool->save();

        return response()->json([
            "message" => "success",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $astrologicalTool = AstrologicalTool::findOrFail($id);
        $data = new AstrologicalToolResource($astrologicalTool);

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
        $astrologicalTool = AstrologicalTool::findOrFail($id);
        $astrologicalTool->tool_name = $request->tool_name;
        $astrologicalTool->description = $request->description;
        $astrologicalTool->price = $request->price;
        $astrologicalTool->developer_id = $request->developer_id;
        $astrologicalTool->save();

        return response()->json([
            "message" => "success",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AstrologicalTool::where('id',$id)->delete();
        return response()->json([
            "message" => "success"
        ]);
    }
}
