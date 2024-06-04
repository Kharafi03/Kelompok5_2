<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $status = $request->input('status');

        if ($status) {
            $bookings = Booking::where('booking_status', $status)->get();
        } else {
            $bookings = Booking::all();
        }

        return view('admin.bookings.index', compact('bookings'));
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
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //

        return view('admin.bookings.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
        $validatedData = $request->validate([
            'booking_status' => 'required',
        ]);

        $booking->update($validatedData);

        return redirect()->route('admin.bookings.index')->with('success', 'Booking updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->back()->with([
            'message' => 'berhasil di hapus !',
            'alert-type' => 'danger'
        ]);
    }
}
