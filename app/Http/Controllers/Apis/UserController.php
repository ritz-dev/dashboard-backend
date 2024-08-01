<?php

namespace App\Http\Controllers\Apis;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest('id')->get();
        $data = UserResource::collection($users);

        return response()->json([
            'message' => 'success',
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $user = new User;
        if($request->hasFile('img_url')){
            $file = $request->file('img_url');
            $image = $file->getClientOriginalName();
            $imageName = time().'_'.$image;
            $file->storeAs('public/user_photos/',$imageName);

            $user->img_url = $imageName;
        }

        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->birth_datetime = $request->birth_datetime;
        $user->birth_place = $request->birth_place;
        $user->gender = $request->gender;
        $user->cash_amount = $request->cash_amount;
        $user->follower = $request->follower;
        $user->date_created = $request->date_created;
        $user->save();

        return response()->json([
            'message' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return response()->json([
            'message' => 'success',
            'data' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Log::info('Request Data: ', $request->all());
        $user = User::findOrFail($id);

        $path = 'public/user_photos/'.$user->img_url;

        if($user->img_url && Storage::exists($path) && $request->img_url){
            Storage::delete($path);
        }

        if($request->hasFile('img_url')){
            $file = $request->file('img_url');
            $image = $file->getClientOriginalName();
            $imageName = time().'_'.$image;
            $file->storeAs('public/user_photos/',$imageName);

            $user->img_url = $imageName;
        }

        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->birth_datetime = $request->birth_datetime;
        $user->birth_place = $request->birth_place;
        $user->gender = $request->gender;
        $user->cash_amount = $request->cash_amount;
        $user->follower = $request->follower;
        $user->date_created = $request->date_created;
        $user->save();

        return response()->json([
            'message' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id',$id)->first();

        $path = 'public/user_photos/'.$user->img_url;

        if($user->img_url && Storage::exists($path)){
            Storage::delete($path);
        }

        $user->delete();

        return response()->json([
            'message' => 'successs'
        ]);
    }

}
