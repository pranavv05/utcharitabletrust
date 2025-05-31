<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = Member::orderBy('created_at', 'DESC')->get();
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
            'phone' => 'required|regex:/^[0-9]{10}$/|min:10',
            'bloodgroup' => 'required',
            'address' => 'required',
            'city' => 'required',
            'purpose' => 'required',
        ], [
            'name' => 'Full Name is Required!',
            'email.required' => 'Email is Required!',
            'email' => 'Enter Valid Email Address!',
            'phone.required' => 'Phone No. is Required!',
            'phone' => 'Enter Valid Phone Number!',
            'bloodgroup' => 'Blood Group is Required!',
            'address' => 'Address is Required!',
            'city' => 'City is Required!',
            'purpose' => 'Purpose is Required!',
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 'failed',
                'message' => $validator->errors()->first(),
                'code' => 400,
            ], 400);
        }

        if (Member::where('email', $request->email)->first()) {
            return response([
                'message' => 'Member Email Address Already Exist!',
                'status' => 'failed',
                'code' => 400,
            ], 400);
        }

        if (Member::where('phone', $request->phone)->first()) {
            return response([
                'message' => 'Member Phone Number Already Exist!',
                'status' => 'failed',
                'code' => 400,
            ], 400);
        }

        $result = Member::create([
            'memberId' => mt_rand(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'bloodgroup' => $request->bloodgroup,
            'address' => $request->address,
            'city' => $request->city,
            'purpose' => $request->purpose,
            'status' => 'active',
        ]);

        if ($result->exists) {
            return response([
                'message' => 'Member Details Submitted Successfully!',
                'status' => 'success',
                'data' => $result,
                'code' => 200
            ], 201);
        } else {
            return response([
                'message' => 'Member Details Submitted Failed!',
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
        $result = Member::find($id);
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
