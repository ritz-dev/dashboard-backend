<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AstrologerFinancialTransaction;
use App\Http\Requests\AstrologerFinancialTransactionRequest;
use App\Http\Resources\AstrologerFinancialTransactionResource;

class AstrologerFinancialTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $afts = AstrologerFinancialTransaction::get();
        $data = AstrologerFinancialTransactionResource::collection($afts);

        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AstrologerFinancialTransactionRequest $request)
    {
        $aft = new AstrologerFinancialTransaction;
        $aft->astrologer_id = $request->astrologer_id;
        $aft->balance = $request->balance;
        $aft->description = $request->description;
        $aft->save();

        return response()->json([
            "message" => "success"
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aft = AstrologerFinancialTransaction::findOrFail($id);
        $data = new AstrologerFinancialTransactionResource($aft);

        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AstrologerFinancialTransactionRequest $request, string $id)
    {
        $aft = AstrologerFinancialTransaction::findOrFail($id);
        $aft->astrologer_id = $request->astrologer_id;
        $aft->balance = $request->balance;
        $aft->description = $request->description;
        $aft->save();

        return response()->json([
            "message" => "success",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AstrologerFinancialTransaction::where('id',$id)->delete();
        return response()->json([
            "message" => "success",
        ]);
    }
}
