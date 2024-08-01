<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdministratorFinancialTransaction;
use App\Http\Requests\AdministratorFinancialTransactionRequest;
use App\Http\Resources\AdministratorFinancialTransactionResource;

class AdministratorFinancialTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adfts = AdministratorFinancialTransaction::get();
        $data = AdministratorFinancialTransactionResource::collection($adfts);

        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdministratorFinancialTransactionRequest $request)
    {
        $adft = new AdministratorFinancialTransaction;
        $adft->administrator_id = $request->administrator_id;
        $adft->balance = $request->balance;
        $adft->description = $request->description;
        $adft->save();

        return response()->json([
            "message" => "success"
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $adft = AdministratorFinancialTransaction::findOrFail($id);
        $data = new AdministratorFinancialTransactionResource($adft);

        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdministratorFinancialTransactionRequest $request, string $id)
    {
        $adft = AdministratorFinancialTransaction::findOrFail($id);
        $adft->administrator_id = $request->administrator_id;
        $adft->balance = $request->balance;
        $adft->description = $request->description;
        $adft->save();

        return response()->json([
            "message" => "success",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AdministratorFinancialTransaction::where('id',$id)->delete();
        return response()->json([
            "message" => "success",
        ]);
    }
}
