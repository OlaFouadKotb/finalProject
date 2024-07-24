<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Beverage;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DrinkController extends Controller
{
   

    private $columns = [
        'title',
        'content',
        'price',
        'website',
        'published',
        'special',
        'image',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Beverages of Cafe';
        $beverages = Beverage::all();
        return view ('admin.beverages', compact('beverages', 'title'));
    }

    /**
     * Display beverages categorized by type.
     */public function index2(){
    $icedC = Beverage::where('category_id', 1)->get(); // Assuming 1 is the ID for Iced Coffee
    $hotCoffees = Beverage::where('category_id', 2)->get(); // Assuming 2 is for Hot Coffee
    $juices = Beverage::where('category_id', 3)->get(); // Assuming 3 is for Juice

    return view('frontPages.drink', compact('icedC', 'hotCoffees', 'juices'));}
    /**
     * Display special items.
     */
    public function specialItems()
    {
        $specialProducts= Beverage::where('special', true)->get();
        return view('frontPages.special', compact('specialProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addBeverage');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published' => 'nullable|boolean',
            'special' => 'nullable|boolean',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        $data['image'] = $request->image->store('beverages', 'public');
    
        Beverage::create($data);
    
        return redirect()->route('beverages.index')->with('success', 'Beverage created successfully.');
    }

    /**
     * Display the specified beverage.
     */
    public function show(Beverage $beverage)
    {
        $title = "Show Beverage";
        return view('admin.showBeverage', compact('beverage', 'title'));
    }

    /**
     * Show the form for editing the specified beverage.
     */
    public function edit(Beverage $beverage)
    {
        $categories = Category::all();
        return view('admin.beverages.edit', compact('beverage', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Beverage $beverage)
    {
       
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'price' => 'required|numeric',
        'published' => 'nullable|boolean',
        'special' => 'nullable|boolean',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'category_id' => 'required|exists:categories,id',
    ]);

    if ($request->hasFile('image')) {
        // Delete old image if it exists
        if ($beverage->image) {
            Storage::disk('public')->delete($beverage->image);
        }

        // Store new image
        $data['image'] = $request->image->store('beverages', 'public');
    }

    $beverage->update($data);

    return redirect()->route('beverages.index')->with('success', 'Beverage updated successfully.');
}

    /**
     * Remove the specified beverage from storage.
     */
    public function destroy(Beverage $beverage)
    {
        // Delete image from storage
        if ($beverage->image && Storage::disk('public')->exists($beverage->image)) {
            Storage::disk('public')->delete($beverage->image);
        }

        $beverage->delete();
        return redirect()->route('beverages.index')->with('success', 'Beverage deleted successfully.');
    }

    /**
     * Display a listing of trashed beverages.
     */
    public function trash()
    {
        $beverages = Beverage::onlyTrashed()->get();
        return view('admin.trashBeverage', compact('beverages'));
    }

    /**
     * Restore the specified trashed beverage.
     */
    public function restore($id)
    {
        $beverage = Beverage::withTrashed()->findOrFail($id);
        $beverage->restore();
        return redirect()->route('beverages.trash')->with('success', 'Beverage restored successfully.');
    }

    /**
     * Permanently delete the specified trashed beverage.
     */
    public function forceDelete($id)
    {
        $beverage = Beverage::withTrashed()->findOrFail($id);
        if ($beverage->image && Storage::disk('public')->exists($beverage->image)) {
            Storage::disk('public')->delete($beverage->image);
        }
        $beverage->forceDelete();
        return redirect()->route('beverages.trash')->with('success', 'Beverage permanently deleted.');
    }
}
