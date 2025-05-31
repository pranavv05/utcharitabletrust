<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = Feedback::orderBy('created_at', 'DESC')->get();
        return response([
            'message' => 'Record Found!',
            'status' => 'success',
            'code' => 200,
            'data' => $result
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable|regex:/^[0-9]{10}$/|min:10',
            'feedback' => 'required',
        ], [
            'name' => 'Full Name is Required!',
            'email.required' => 'Email is Required!',
            'email' => 'Enter Valid Email Address!',
            'phone.required' => 'Phone No. is Required!',
            'phone' => 'Enter Valid Phone Number!',
            'feedback' => 'Feedback is Required!',
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 'failed',
                'message' => $validator->errors()->first(),
                'code' => 400,
            ], 400);
        }

        $result = Feedback::create([
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
            'feedback' => $request->feedback,
        ]);

        if ($result->exists) {
            return response([
                'message' => 'Feedback Added Successfully!',
                'status' => 'success',
                'data' => $result,
                'code' => 200
            ], 201);
        } else {
            return response([
                'message' => 'Feedback Added Failed!',
                'status' => 'failed',
                'code' => 400
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = Feedback::find($id);
        if ($result) {
            return response(
                [
                    'message' => 'Record Deleted!',
                    'status' => 'success',
                    'data' => $result->delete(),
                    'code' => 200,
                ],
                200,
            );
        } else {
            return response(
                [
                    'message' => 'Record Not Found!',
                    'status' => 'failed',
                    'code' => 400,
                ],
                400,
            );
        }
    }
}
