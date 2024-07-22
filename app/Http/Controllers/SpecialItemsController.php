<?php

namespace App\Http\Controllers;

use App\Models\SpecialItem;
use App\Http\Requests\StoreSpecialItemRequest;
use App\Http\Requests\UpdateSpecialItemRequest;
use Illuminate\Http\Request;
use App\Models\SpecialItems;
use Psy\Util\Str;

class SpecialItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all special items from the database
        $specialItems = SpecialItems::all();
        
        // Return view with the special items data
        return view('frontPages.special', compact('specialItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return view for creating a new special item
        return view('admin.addBeverage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSpecialItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate and store the new special item
        $validatedData = $request->validated();
        SpecialItems::create($validatedData);

        // Redirect to index with success message
        return redirect()->route('special')
                         ->with('success', 'Special item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SpecialItem  $specialItem
     * @return \Illuminate\Http\Response
     */
    public function show( $specialItem)
    {
        // Return view with the specific special item data
        return view('frontPages.special', compact('specialItem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SpecialItem  $specialItem
     * @return \Illuminate\Http\Response
     */
    public function edit( $specialItem)
    {
        // Return view for editing the specific special item
        return view('admin.editBeverages', compact('specialItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpecialItemRequest  $request
     * @param  \App\Models\SpecialItem  $specialItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $specialItem)
    {
        // Validate and update the special item
        $validatedData = $request->validated();
        $specialItem->update($validatedData);

        // Redirect to index with success message
        return redirect()->route('special')
                         ->with('success', 'Special item updated successfully.');
    }

   
   
}
