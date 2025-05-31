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
use PDF;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = Booking::where('status', '!=', 'inactive')->with('customer_data')->with('book_data')->orderBy('created_at', 'DESC')->get();
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
            'issueDate' => 'required|date',
            'endDate' => 'required|date',
            'customer_id' => 'required|string',
            'book_details' => 'required|array|min:1',
            'status' => 'required|in:issue,return,lost',
        ], [
            'issueDate' => 'Issue Date is Required!',
            'endDate' => 'End Date is Required!',
            'customer_id' => 'Customer Details is Required!',
            'book_details' => 'Book Details is Required!',
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

        if (!Customer::where('id', $request->customer_id)->first()) {
            return response([
                'message' => 'Invalid Customer Details!',
                'status' => 'failed',
                'code' => 400,
            ], 400);
        }

        $result = Booking::create([
            'orderNo' => mt_rand(),
            'issueDate' => $request->issueDate,
            'endDate' => $request->endDate,
            'customer_id' => $request->customer_id,
            'status' => $request->status,
        ]);

        if ($result->exists) {
            foreach ($request->book_details as $book) {
                foreach ($book as $item) {
                    $bookItem = BookingItem::create([
                        'orderNo' => $result->orderNo,
                        'booking_id' => $result->id,
                        'book_id' => $item,
                    ]);

                    if ($bookItem) {
                        if ($request->status === 'issue') {
                            BookList::where('id', $bookItem->book_id)->update(['status' => 'issue']);
                        } else {
                            BookList::where('id', $bookItem->book_id)->update(['status' => 'active']);
                        }

                    }
                }
            }

            return response([
                'message' => 'Book Issue Successfully!',
                'status' => 'success',
                'data' => $result,
                'code' => 200
            ], 201);

        } else {
            return response([
                'message' => 'Book Issue Failed!',
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
        $result = Booking::with('customer_data')->with('book_data', function ($query) {
            $query->leftJoin('book_lists', 'book_id', '=', 'book_lists.id')->get();
        })->find($id);
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
     * Display the specified resource.
     */
    public function pdfShow(string $id)
    {
        $result = Booking::with('customer_data')->with('book_data', function ($query) {
            $query->leftJoin('book_lists', 'book_id', '=', 'book_lists.id')->get();
        })->find($id);
        if ($result) {

            $receiptType = $result->status === 'new' ? 'Donar Deposit' : ($result->status === 'issue' ? 'Issue' : 'Return');
            $result = [
                'booking' => $result,
                'receiptType' => $receiptType,
                'customer' => $result->customer_data,
                'record' => $result->book_data,
            ];

            $pdf = PDF::loadView('bookissue', $result);
            return $pdf->download('issue.pdf');  // use stream and down for blob

            // return response(
            //     [
            //         'message' => 'Record Found!',
            //         'status' => 'success',
            //         'data' => $result,
            //         'code' => 200,
            //     ],
            //     200,
            // );

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
            'returnDate' => 'required|date',
            'penaltyAmount' => 'nullable|numeric',
            'penaltyReason' => 'nullable|string',
            'book_details' => 'required|array|min:1',
            'status' => 'required|in:active,inactive,return,issue,new',
            'return_type' => 'required|in:none,partial',
        ], [
            'returnDate' => 'Return Date is Required!',
            'penaltyAmount' => 'Penalty Amount is Required!',
            'penaltyReason' => 'Penalty Reason Details is Required!',
            'book_details' => 'Book Details is Required!',
            'status' => 'Status is Required!',
            'status.in' => 'Invalid Status Type',
            'return_type' => 'Return Type is Required!',
            'return_type.in' => 'Invalid Return Type',
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 'failed',
                'message' => $validator->errors()->first(),
                'code' => 400,
            ], 400);
        }

        $result = Booking::find($id);
        if (!$result) {
            return response(
                [
                    'message' => 'Book Issue Details Not Found!',
                    'status' => 'failed',
                    'code' => 400,
                ],
                400,
            );
        }

        $result->update([
            'returnDate' => $request->returnDate,
            'penaltyAmount' => $request->penaltyAmount,
            'penaltyReason' => $request->penaltyReason,
        ]);

        if ($request->return_type === 'partial') {
            $newBooking = Booking::create([
                'orderNo' => mt_rand(),
                'issueDate' => $result->issueDate,
                'endDate' => $result->endDate,
                'customer_id' => $result->customer_id,
                'ref_orderNo' => $result->orderNo,
                'status' => 'return',
            ]);
        }

        if ($result) {

            foreach ($request->book_details as $book) {
                foreach ($book as $item) {
                    if ($request->return_type === 'partial') {
                        BookingItem::create([
                            'orderNo' => $newBooking->orderNo,
                            'booking_id' => $newBooking->id,
                            'book_id' => $item,
                        ]);
                        $old = BookingItem::where('booking_id', $result->id)->where('book_id', $item)->first();
                        if ($old) {
                            $old->delete();
                        }
                    }
                    BookList::where('id', $item)->update(['status' => 'active']);
                }
                if ($request->return_type === 'partial') {
                    $result->update([
                        'status' => 'partial_return'
                    ]);
                } else {
                    $result->update([
                        'status' => 'return'
                    ]);
                }
            }

            return response([
                'message' => 'Book Return Successfully!',
                'status' => 'success',
                'data' => $result,
                'code' => 200
            ], 201);

        } else {
            return response([
                'message' => 'Book Return Failed!',
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
        $result = Booking::find($id);
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
