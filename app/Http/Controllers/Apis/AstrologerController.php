<?php

namespace App\Http\Controllers\Apis;

use App\Models\Astrologer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\AstrologerResource;
use App\Http\Requests\AstrologerStoreRequest;

class AstrologerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $astrologers = Astrologer::all();

        $data = AstrologerResource::collection($astrologers);
        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AstrologerStoreRequest $request)
    {
        $astrologer = new Astrologer;
        if($request->hasFile('img_url')){
            $file = $request->file('img_url');
            $image = $file->getClientOriginalName();
            $imageName = time().'_'.$image;
            $file->storeAs('public/astrologer_photos/',$imageName);

            $astrologer->img_url = $imageName;
        }

        $astrologer->full_name = $request->full_name;
        $astrologer->email = $request->email;
        $astrologer->password = Hash::make($request->password);
        $astrologer->phone = $request->phone;
        $astrologer->experience_years = $request->experience_years;
        $astrologer->specialization = $request->specialization;
        $astrologer->bio = $request->bio;
        $astrologer->gender = $request->gender;
        $astrologer->cash_amount = $request->cash_amount;
        $astrologer->date_created = $request->date_created;
        $astrologer->save();

        return response()->json([
            'message' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $astrologer = Astrologer::findOrFail($id);
        $data = new AstrologerResource($astrologer);
        return response()->json([
            'message' => 'success',
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $astrologer = Astrologer::findOrFail($id);

        $path = 'public/astrologer_photos/'.$astrologer->img_url;

        if($astrologer->img_url && Storage::exists($path) && $request->img_url){
            Storage::delete($path);
        }

        if($request->hasFile('img_url')){
            $file = $request->file('img_url');
            $image = $file->getClientOriginalName();
            $imageName = time().'_'.$image;
            $file->storeAs('public/astrologer_photos/',$imageName);

            $astrologer->img_url = $imageName;
        }

        $astrologer->full_name = $request->full_name;
        $astrologer->email = $request->email;
        $astrologer->password = Hash::make($request->password);
        $astrologer->phone = $request->phone;
        $astrologer->experience_years = $request->experience_years;
        $astrologer->specialization = $request->specialization;
        $astrologer->bio = $request->bio;
        $astrologer->gender = $request->gender;
        $astrologer->cash_amount = $request->cash_amount;
        $astrologer->date_created = $request->date_created;
        $astrologer->save();

        return response()->json([
            'message' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $astrologer = Astrologer::where('id',$id)->first();

        $path = 'public/astrologer_photos/'.$astrologer->img_url;

        if($astrologer->img_url && Storage::exists($path)){
            Storage::delete($path);
        }

        $astrologer->delete();

        return response()->json([
            'message' => 'successs'
        ]);
    }
}
