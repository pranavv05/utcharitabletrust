<?php

namespace App\Http\Controllers;

use App\Models\ClassName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassNameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = ClassName::orderBy('created_at', 'DESC')->get();
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
            'title' => 'required',
            'status' => 'required|in:active,inactive',
        ], [
            'title' => 'Class Name is Required!',
            'status' => 'Status is Required!',
            'status.in' => 'Invalid Status Type',
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 'failed',
                'message' => $validator->errors()->first(),
                'code' => 400,
            ], 400);
        }

        if (ClassName::where('title', $request->ClassName)->first()) {
            return response([
                'message' => 'Class Name Already Exist!',
                'status' => 'failed',
                'code' => 400,
            ], 400);
        }

        $result = ClassName::create([
            'title' => $request->title,
            'status' => $request->status,
        ]);

        if ($result->exists) {
            return response([
                'message' => 'Record Added Successfully!',
                'status' => 'success',
                'data' => $result,
                'code' => 200
            ], 201);
        } else {
            return response([
                'message' => 'Record Added Failed!',
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
        $result = ClassName::find($id);
        if (!$result) {
            return response(
                [
                    'message' => 'Record Not Found!',
                    'status' => 'failed',
                    'code' => 400,
                ],
                400,
            );
        } else {
            return response(
                [
                    'message' => 'Record Found!',
                    'status' => 'success',
                    'data' => $result,
                    'code' => 200,
                ],
                200,
            );
        }
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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'status' => 'required|in:active,inactive',
        ], [
            'title' => 'Class Name is Required!',
            'status' => 'Status is Required!',
            'status.in' => 'Invalid Status Type',
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 'failed',
                'message' => $validator->errors()->first(),
                'code' => 400,
            ], 400);
        }

        $result = ClassName::find($id);
        if (!$result) {
            return response(
                [
                    'message' => 'Record Not Found!',
                    'status' => 'failed',
                    'code' => 400,
                ],
                400,
            );
        }

        if ($request->title !== $result->title) {
            if (ClassName::where('title', $request->title)->first()) {
                return response([
                    'message' => 'Class Name Already Exist!',
                    'status' => 'failed',
                    'code' => 400,
                ], 400);
            }
        }

        $result->update([
            'title' => $request->title,
            'status' => $request->status,
        ]);

        if ($result->exists) {
            return response([
                'message' => 'Record Updated Successfully!',
                'status' => 'success',
                'data' => $result,
                'code' => 200
            ], 201);
        } else {
            return response([
                'message' => 'Record Updated Failed!',
                'status' => 'failed',
                'code' => 400
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = ClassName::find($id);
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
