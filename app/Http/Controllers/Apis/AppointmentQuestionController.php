<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Models\AppointmentQuestion;
use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentQuestionRequest;
use App\Http\Resources\AppointmentQuestionResource;

class AppointmentQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointment_questions = AppointmentQuestion::get();
        $data = AppointmentQuestionResource::collection($appointment_questions);

        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AppointmentQuestionRequest $request)
    {
        $appointment_question = new AppointmentQuestion;
        $appointment_question->user_id = $request->user_id;
        $appointment_question->astrologer_id = $request->astrologer_id;
        $appointment_question->request_type = $request->request_type;
        $appointment_question->request_message = $request->request_message;
        $appointment_question->request_datetime = $request->request_datetime;
        $appointment_question->status = $request->status;
        $appointment_question->save();

        return response()->json([
            "message" => "success"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $appointment_question = AppointmentQuestion::findOrFail($id);
        $data = new AppointmentQuestionResource($appointment_question);

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
        $appointment_question = AppointmentQuestion::findOrFail($id);
        $appointment_question->user_id = $request->user_id;
        $appointment_question->astrologer_id = $request->astrologer_id;
        $appointment_question->request_type = $request->request_type;
        $appointment_question->request_message = $request->request_message;
        $appointment_question->request_datetime = $request->request_datetime;
        $appointment_question->status = $request->status;
        $appointment_question->save();

        return response()->json([
            "message" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AppointmentQuestion::where('id',$id)->delete();
        return response()->json([
            "message" => "success"
        ]);
    }
}
