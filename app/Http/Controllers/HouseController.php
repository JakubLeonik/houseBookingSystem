<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function index()
    {
        return view('houses.index', [
            'houses' => House::all()->sortByDesc('created_at')
        ]);
    }
    public function create()
    {
        $this->authorize('create', House::class);
        return view('houses.create');
    }
    public function store(Request $request)
    {
        $this->authorize('create', House::class);
        $data = $request->validate([
            'image' => ['image', 'max:2048', 'mimes:jpeg,png,jpg,gif', 'required'],
            'name' => ['string', 'min:3', 'max:250', 'required'],
            'pricePerNight' => ['integer', 'min:1', 'required'],
            'numberOfRooms' => ['integer', 'min:1', 'required']
        ]);

        $imageName = time().'.'.$data['image']->extension();
        $request->file('image')->storeAs('public/houses', $imageName);
        unset($data['image']);
        $data['imagePath'] = '/storage/houses/'.$imageName;

        $data['user_id'] = auth()->user()->id;
        $house = House::create($data);
        if(!$house){
            return redirect()->back()->withErrors([
                'error' => 'Unable to create house'
            ]);
        }
        else{
            return redirect()->route('index')->with([
                'status' => 'success'
            ]);
        }
    }
    public function show(House $house)
    {
        $this->authorize('view', $house);
        return view('houses.show', [
            'house' => $house
        ]);
    }
    public function edit(House $house)
    {
        $this->authorize('update', $house);
        return view('houses.edit', [
            'house' => $house
        ]);
    }
    public function update(Request $request, House $house)
    {
        $this->authorize('update', $house);
        $data = $request->validate([
            'image' => ['image', 'max:2048', 'mimes:jpeg,png,jpg,gif', 'required'],
            'name' => ['string', 'min:3', 'max:250', 'required'],
            'pricePerNight' => ['integer', 'min:1', 'required'],
            'numberOfRooms' => ['integer', 'min:1', 'required']
        ]);

        $imageNameArray = explode('/', $house->imagePath);
        $request->file('image')->storeAs('public/houses', end($imageNameArray));
        unset($data['image']);

        if(!$house->update($data)){
            return redirect()->back()->withErrors([
                'error' => 'Unable to update house'
            ]);
        }
        else{
            return redirect()->route('index')->with([
                'status' => 'success'
            ]);
        }
    }
    public function destroy(House $house)
    {
        $this->authorize('delete', $house);
        $id = $house->id;
        if(!$house->delete()){
            return redirect()->back()->withErrors([
                'error' => 'Unable to delete house'
            ]);
        }
        else{
            Booking::where('house_id', $id)->delete();
            return redirect()->route('index')->with([
                'status' => 'success'
            ]);
        }
    }
}
