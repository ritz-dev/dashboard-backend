<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Models\AppointmentAnswer;
use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentAnswerRequest;
use App\Http\Resources\AppointmentAnswerResource;

class AppointmentAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointment_answers = AppointmentAnswer::get();
        $data = AppointmentAnswerResource::collection($appointment_answers);

        return response()->json([
            "message" => "success",
            "data" => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AppointmentAnswerRequest $request)
    {
        $appointment_answer = new AppointmentAnswer;
        $appointment_answer->appointment_question_id = $request->appointment_question_id;
        $appointment_answer->message =$request->message;
        $appointment_answer->save();

        return response()->json([
            "message" => "success"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $appointment_answer = AppointmentAnswer::findOrFail($id);
        $data = new AppointmentAnswerResource($appointment_answer);

        return response()->json([
            "message" => "success",
            "data" => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $appointment_answer = AppointmentAnswer::findOrFail($id);
        $appointment_answer->appointment_question_id = $request->appointment_question_id;
        $appointment_answer->message =$request->message;
        $appointment_answer->save();

        return response()->json([
            "message" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AppointmentAnswer::where('id',$id)->delete();
        return response()->json([
            "message" => "success"
        ]);
    }
}
