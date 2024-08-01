<?php

namespace App\Http\Controllers\Apis;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use App\Http\Resources\FeedbackResource;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedback = Feedback::get();

        $data = FeedbackResource::collection($feedback);

        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeedbackRequest $request)
    {
        $feedback = new Feedback;
        $feedback->appointment_answer_id = $request->appointment_answer_id;
        $feedback->user_id = $request->user_id;
        $feedback->comment = $request->comment;
        $feedback->feedback_date = $request->feedback_date;
        $feedback->save();

        return response()->json([
            "message" => "success"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $feedback = Feedback::findOrFail($id);
        $data = new FeedbackResource($feedback);

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
        $feedback = Feedback::findOrFail($id);
        $feedback->appointment_answer_id = $request->appointment_answer_id;
        $feedback->user_id = $request->user_id;
        $feedback->comment = $request->comment;
        $feedback->feedback_date = $request->feedback_date;
        $feedback->save();

        return response()->json([
            "message" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Feedback::where('id',$id)->delete();

        return response()->json([
            "message" => "success"
        ]);
    }
}
