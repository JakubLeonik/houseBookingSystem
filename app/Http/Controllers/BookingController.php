<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Booking::class);
        if(Auth::user()->role == "admin")
            $bookings = Booking::all()->sortByDesc('id');
        else
            $bookings = auth()->user()->bookings()->sortByDesc('id');
        return view('bookings.index', [
            'bookings' => $bookings
        ]);
    }

    public function create(House $house)
    {
        $this->authorize('create', Booking::class);
        return view('bookings.create', [
            'house' => $house
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Booking::class);
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
        $this->authorize('view', $booking);
        return view('bookings.show', [
            'booking' => $booking
        ]);
    }

    public function edit(Booking $booking)
    {
        $this->authorize('update', $booking);
        return view('bookings.edit', [
            'booking' => $booking,
            'house' => $booking->house
        ]);
    }

    public function update(Request $request, Booking $booking)
    {
        $this->authorize('update', $booking);
        $data = $request->validate([
            'house_id' => ['integer', 'exists:houses,id', 'required'],
            'dateFrom' => ['date', 'after:today', 'required'],
            'dateTo' => ['date', 'after:dateFrom', 'required'],
        ]);

        $data['user_id'] = auth()->user()->id;

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
        $this->authorize('update', $booking);
        if(!$booking->delete()){
            return redirect()->back()->withErrors([
                'error' => 'Unable to delete booking'
            ]);
        }
        else{
            return redirect()->route('bookings.index')->with([
                'status' => 'success'
            ]);
        }
    }
}
