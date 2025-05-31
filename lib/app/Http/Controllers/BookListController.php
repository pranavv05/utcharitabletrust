<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingItem;
use App\Models\BookList;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use \Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use PDF;

class BookListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = BookList::with('customer_data')->orderBy('utbn', 'DESC')->get();
        return response([
            'message' => 'Record Found!',
            'status' => 'success',
            'code' => 200,
            'data' => $result
        ], 200);
    }

    /**
     * Display a listing of the resource.
     */
    public function getAllBook()
    {
        $result = BookList::where('status', 'active')->with('customer_data')->orderBy('utbn', 'DESC')->get();
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
            'book_details' => 'required|array|min:1',
            'customer_id' => 'required|uuid',
            'status' => 'required|in:active,inactive',
        ], [
            'book_details' => 'Book Details is Required!',
            'customer_id' => 'Donar Details is Required!',
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

        $donar = Customer::where('id', $request->customer_id)->first();

        if (!$donar) {
            return response([
                'message' => 'Invalid Donar Details!',
                'status' => 'failed',
                'code' => 400,
            ], 400);
        }

        $booking = Booking::create([
            'orderNo' => mt_rand(),
            'issueDate' => date('Y-m-d'),
            'endDate' => date('Y-m-d'),
            'customer_id' => $request->customer_id,
            'status' => 'inactive',
        ]);

        foreach ($request->book_details as $book) {
            $bookDetail = BookList::orderBy('utbn', 'desc')->first();
            $utbn = $bookDetail ? $bookDetail->utbn : 0;
            $book = BookList::create([
                'bookName' => $book['bookName'],
                'author' => $book['author'],
                'class' => $book['class'],
                'utbn' => $utbn + 1,
                'customer_id' => $request->customer_id,
                'status' => 'active',
            ]);

            BookingItem::create([
                'orderNo' => $booking->orderNo,
                'booking_id' => $booking->id,
                'book_id' => $book->id,
            ]);

            $booking->update([
                'status' => 'new'
            ]);
        }

        // $result = [
        //     'customer' => $donar,
        //     'record' => $request->book_details,
        // ];

        // $pdf = PDF::loadView('bookdonate', $result);
        // // Storage::put('public/pdf/customertransaction.pdf', $pdf->output());
        // // $pdfurl = "public/pdf/customertransaction.pdf";
        // // $path = Storage::url($pdfurl);
        // return $pdf->download('donate.pdf');  // use stream and down for blob

        // return response([
        //     'message' => 'Book Added Successfully!',
        //     'status' => 'success',
        //     'data' => $path,
        //     'code' => 200
        // ], 201);

        if ($book->exists) {
            return response([
                'message' => 'Book Added Successfully!',
                'status' => 'success',
                // 'data' => $result,
                'code' => 200
            ], 201);
        } else {
            return response([
                'message' => 'Book Added Failed!',
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
        $result = BookList::with('customer_data')->find($id);
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
            'bookName' => 'required|string',
            'author' => 'required|string',
            'class' => 'required|string',
            'utbn' => 'required|string',
            'customer_id' => 'required|uuid',
            'status' => 'required|in:active,inactive',
        ], [
            'bookName' => 'Book Name is Required!',
            'author' => 'Author Details is Required!',
            'class' => 'Class Details is Required!',
            'utbn' => 'UTBN is Required!',
            'customer_id' => 'Donar Details is Required!',
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

        $result = BookList::find($id);
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

        // if ($request->utbn !== $result->utbn) {
        //     if (BookList::where('utbn', $request->utbn)->first()) {
        //         return response([
        //             'message' => 'Book UTBN Already Exist!',
        //             'status' => 'failed',
        //             'code' => 400,
        //         ], 400);
        //     }
        // }

        if (!Customer::where('id', $request->customer_id)->first()) {
            return response([
                'message' => 'Invalid Donar Details!',
                'status' => 'failed',
                'code' => 400,
            ], 400);
        }

        $result->update([
            'bookName' => $request->bookName,
            'author' => $request->author,
            'class' => $request->class,
            'utbn' => $request->utbn,
            'customer_id' => $request->customer_id,
            'status' => $request->status,
        ]);

        if ($result->exists) {
            return response([
                'message' => 'Book Details Updated Successfully!',
                'status' => 'success',
                'data' => $result,
                'code' => 200
            ], 201);
        } else {
            return response([
                'message' => 'Book Details Updated Failed!',
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
        $result = BookList::find($id);
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
