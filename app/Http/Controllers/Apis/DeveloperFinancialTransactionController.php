<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DeveloperFinancialTransaction;
use App\Http\Requests\DeveloperFinancialTransactionRequest;
use App\Http\Resources\DeveloperFinancialTransactionResource;

class DeveloperFinancialTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dfts = DeveloperFinancialTransaction::get();
        $data = DeveloperFinancialTransactionResource::collection($dfts);

        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeveloperFinancialTransactionRequest $request)
    {
        $dft = new DeveloperFinancialTransaction;
        $dft->developer_id = $request->developer_id;
        $dft->balance = $request->balance;
        $dft->description = $request->description;
        $dft->save();

        return response()->json([
            "message" => "success"
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dft = DeveloperFinancialTransaction::findOrFail($id);
        $data = new DeveloperFinancialTransactionResource($dft);

        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeveloperFinancialTransactionRequest $request, string $id)
    {
        $dft = DeveloperFinancialTransaction::findOrFail($id);
        $dft->developer_id = $request->developer_id;
        $dft->balance = $request->balance;
        $dft->description = $request->description;
        $dft->save();

        return response()->json([
            "message" => "success",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DeveloperFinancialTransaction::where('id',$id)->delete();
        return response()->json([
            "message" => "success",
        ]);
    }
}
