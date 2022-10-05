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
            'bookings' => Booking::all()->sortByDesc('id')
        ]);
    }

    public function create(House $house)
    {
        return view('bookings.create', [
            'house' => $house
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'house_id' => ['integer', 'exists:houses,id', 'required'],
            'dateFrom' => ['date', 'after:today', 'required'],
            'dateTo' => ['date', 'after:dateFrom', 'required'],
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
            'dateFrom' => ['date', 'after:today', 'required'],
            'dateTo' => ['date', 'after:dateFrom', 'required'],
            'user_id' => ['integer', 'exists:users,id', 'required']
        ]);

        $data['dateFrom'] = date_format($data['dateFrom'], 'Y/m/d');
        $data['dateTo'] = date_format($data['dateTo'], 'Y/m/d');

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
