<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $result = Customer::orderBy('created_at', 'DESC')->get();
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
            'address' => 'nullable',
            'bloodgroup' => 'nullable',
            'type' => 'required|in:donar,customer',
        ], [
            'name' => 'Full Name is Required!',
            'email.required' => 'Email is Required!',
            'email' => 'Enter Valid Email Address!',
            'phone.required' => 'Phone No. is Required!',
            'phone' => 'Enter Valid Phone Number!',
            'address' => 'Address is Required!',
            'bloodgroup' => 'Blood Group is Required!',
            'type' => 'Customer Type is Required!',
            'type.in' => 'Type Must be donar,customer',
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 'failed',
                'message' => $validator->errors()->first(),
                'code' => 400,
            ], 400);
        }

        // if (Customer::where('customerId', $request->customerId)->first()) {
        //     return response([
        //         'message' => 'Customer Id Already Exist!',
        //         'status' => 'failed',
        //         'code' => 400,
        //     ], 400);
        // }

        if (Customer::where('email', $request->email)->first()) {
            return response([
                'message' => 'Email Address Already Exist!',
                'status' => 'failed',
                'code' => 400,
            ], 400);
        }

        if (Customer::where('phone', $request->phone)->first()) {
            return response([
                'message' => 'Phone Number Already Exist!',
                'status' => 'failed',
                'code' => 400,
            ], 400);
        }

        $result = Customer::create([
            'customerId' => mt_rand(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'bloodGroup' => $request->bloodgroup,
            'type' => $request->type,
        ]);

        if ($result->exists) {
            return response([
                'message' => 'Customer Added Successfully!',
                'status' => 'success',
                'data' => $result,
                'code' => 200
            ], 201);
        } else {
            return response([
                'message' => 'Customer Added Failed!',
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^[0-9]{10}$/|min:10',
            'address' => 'nullable',
            'bloodgroup' => 'nullable',
            'type' => 'required|in:donar,customer',
        ], [
            'name' => 'Full Name is Required!',
            'email.required' => 'Email is Required!',
            'email' => 'Enter Valid Email Address!',
            'phone.required' => 'Phone No. is Required!',
            'phone' => 'Enter Valid Phone Number!',
            'address' => 'Address is Required!',
            'bloodgroup' => 'Blood Group is Required!',
            'type' => 'Customer Type is Required!',
            'type.in' => 'Type Must be donar,customer',
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 'failed',
                'message' => $validator->errors()->first(),
                'code' => 400,
            ], 400);
        }

        // if (Customer::where('customerId', $request->customerId)->first()) {
        //     return response([
        //         'message' => 'Customer Id Already Exist!',
        //         'status' => 'failed',
        //         'code' => 400,
        //     ], 400);
        // }

        $result = Customer::find($id);
        if (!$result) {
            return response(
                [
                    'message' => 'Customer Not Found!',
                    'status' => 'failed',
                    'code' => 400,
                ],
                400,
            );
        }

        if ($request->email !== $result->email) {
            if (Customer::where('email', $request->email)->first()) {
                return response([
                    'message' => 'Email Address Already Exist!',
                    'status' => 'failed',
                    'code' => 400,
                ], 400);
            }
        }

        if ($request->phone !== $result->phone) {
            if (Customer::where('phone', $request->phone)->first()) {
                return response([
                    'message' => 'Phone Number Already Exist!',
                    'status' => 'failed',
                    'code' => 400,
                ], 400);
            }
        }

        $result->update([
            // 'customerId' => mt_rand(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'bloodGroup' => $request->bloodgroup,
            'type' => $request->type,
        ]);

        if ($result->exists) {
            return response([
                'message' => 'Customer Added Successfully!',
                'status' => 'success',
                'data' => $result,
                'code' => 200
            ], 201);
        } else {
            return response([
                'message' => 'Customer Added Failed!',
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
        $result = Customer::find($id);
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
