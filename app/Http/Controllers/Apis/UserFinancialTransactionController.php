<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserFinancialTransaction;
use App\Http\Resources\UserFinancialTransactionResource;
use App\Http\Requests\UserFinancialTransactionStoreRequest;

class UserFinancialTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ufts = UserFinancialTransaction::get();
        $data = UserFinancialTransactionResource::collection($ufts);

        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserFinancialTransactionStoreRequest $request)
    {
        $uft = new UserFinancialTransaction;
        $uft->user_id = $request->user_id;
        $uft->balance = $request->balance;
        $uft->description = $request->description;
        $uft->save();

        return response()->json([
            "message" => "success"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $uft = UserFinancialTransaction::findOrFail($id);
        $data = new UserFinancialTransactionResource($uft);

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
        $uft = UserFinancialTransaction::findOrFail($id);
        $uft->user_id = $request->user_id;
        $uft->balance = $request->balance;
        $uft->description = $request->description;
        $uft->save();

        return response()->json([
            "message" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        UserFinancialTransaction::where('id',$id)->delete();
        return response()->json([
            "message" => "success"
        ]);
    }
}
