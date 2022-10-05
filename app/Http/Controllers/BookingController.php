<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\House;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view('bookings.index', [
            'bookings' => Booking::all()->sortByDesc('dateFrom')
        ]);
    }

    public function create()
    {
        return view('bookings.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'house_id' => ['integer', 'exists:houses,id', 'required'],
            'dateFrom' => ['date', 'after:today', 'date_format:Y/m/d', 'required'],
            'dateTo' => ['date', 'after:dateFrom', 'date_format:Y/m/d', 'required'],
            'user_id' => ['integer', 'exists:users,id', 'required']
        ]);

        $data['user_id'] = auth()->user()->id;

        if(!Booking::create($data)){
            return redirect()->back()->withErrors([
                'error' => 'Unable to create booking'
            ]);
        }
        else{
            return redirect()->route('bookings.index')->with([
                'status' => 'success'
            ]);
        }
    }

    public function show(Booking $booking)
    {
        return view('bookings.show', [
            'booking' => $booking
        ]);
    }

    public function edit(Booking $booking)
    {
        return view('bookings.edit', [
            'booking' => $booking
        ]);
    }

    public function update(Request $request, Booking $booking)
    {
        $data = $request->validate([
            'house_id' => ['integer', 'exists:houses,id', 'required'],
            'dateFrom' => ['date', 'after:today', 'date_format:Y/m/d', 'required'],
            'dateTo' => ['date', 'after:dateFrom', 'date_format:Y/m/d', 'required'],
            'user_id' => ['integer', 'exists:users,id', 'required']
        ]);
        if(!$booking->update($data)){
            return redirect()->back()->withErrors([
                'error' => 'Unable to update booking'
            ]);
        }
        else{
            return redirect()->route('bookings.index')->with([
                'status' => 'success'
            ]);
        }
    }

    public function destroy(Booking $booking)
    {
        if(!$booking->delete()){
            return redirect()->back()->withErrors([
                'error' => 'Unable to delete booking'
            ]);
        }
        else{
            return redirect()->route('booking.index')->with([
                'status' => 'success'
            ]);
        }
    }
}
