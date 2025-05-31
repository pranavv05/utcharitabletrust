<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\BookList;
use App\Models\ClassName;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Feedback;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Throwable;

class MasterController extends Controller
{
    /**
     * Admin Login
     */
    public function AdminLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email' => 'Enter Valid Email Address!',
            'password' => 'Please Enter Password!',
        ]);

        if ($validator->fails()) {
            return response([
                'message' => $validator->errors()->first(),
                'status' => 'failed',
                'code' => 400,
            ], 400);
        }

        try {
            $user = User::where('email', $request->email)->first();
            if ($user && Hash::check($request->password, $user->password) && $user->role === 'manager' && $user->isValid === 1) {
                $token = $user->createToken($request->email)->plainTextToken;
                return response([
                    'message' => 'Login Successfully!',
                    'status' => 'success',
                    'token' => $token,
                    'data' => [
                        'id' => $user->role === 'manager' ? 'abf5b68c-ef5f-4524-947c-b59b6bb5d5bc' : $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'isValid' => $user->role === 'manager' ? true : false,
                    ],
                    'code' => 200,
                ], 200);
            } else {
                return response([
                    'message' => 'Invalid UserName & Password!',
                    'status' => 'failed',
                    'code' => 400,
                ], 400);
            }
        } catch (Throwable $e) {
            return response([
                'message' => 'Invalid UserName & Password1111!',
                'status' => 'failed',
                'code' => 400,
            ], 400);
        }
    }

    /**
     * Dashboard API
     */
    public function dashboard()
    {
        return response([
            'message' => 'Record Found!',
            'status' => 'success',
            'code' => 200,
            'data' => [
                'contact' => Contact::orderBy('created_at', 'DESC')->count(),
                'feedback' => Feedback::orderBy('created_at', 'DESC')->count(),
                'member' => Member::orderBy('created_at', 'DESC')->count(),
                'donar' => Customer::where('type', 'donar')->orderBy('created_at', 'DESC')->count(),
                'customer' => Customer::where('type', 'customer')->orderBy('created_at', 'DESC')->count(),
                'book' => BookList::orderBy('created_at', 'DESC')->count(),
                'book_issue' => BookList::where('status', 'issue')->orderBy('created_at', 'DESC')->count(),
                'book_active' => BookList::where('status', 'active')->orderBy('created_at', 'DESC')->count()
            ]
        ], 200);
    }

    /**
     * Dashboard API
     */
    public function master()
    {
        return response([
            'message' => 'Record Found!',
            'status' => 'success',
            'code' => 200,
            'data' => [
                'class' => ClassName::orderBy('created_at', 'DESC')->get(),
                'author' => Author::orderBy('created_at', 'DESC')->get(),
                'donar' => Customer::where('type', 'donar')->orderBy('created_at', 'DESC')->get(),
                'customer' => Customer::where('type', 'customer')->orderBy('created_at', 'DESC')->get(),
            ]
        ], 200);
    }

    /***
     * User Logout API
     */
    public function logout(Request $request)
    {
        $result = $request->user()->tokens()->delete(); // delete current user all token
        // $result = $request->user()->currentAccessToken()->delete(); // delete current user current token
        if ($result) {
            return response([
                'message' => 'Logout Successfully!',
                'status' => 'success',
                'code' => 200
            ], 200);
        } else {
            return response([
                'message' => 'Logout Failed!',
                'status' => 'failed',
                'code' => 400
            ], 400);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
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
        //
    }
}
