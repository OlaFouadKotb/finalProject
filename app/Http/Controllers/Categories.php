<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class Categories extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all categories
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view for creating a new category
        return view('admin.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->errMsg();
        // Validate the request
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ], $messages);

        // Create a new category
        Category::create($data);

        // Redirect with success message
        return redirect()->route('categories');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Fetch the specified category
        $category = Category::with('beverages')->findOrFail($id);
        //$category = Category::findOrFail($id);
        return view('admin.showCategory', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Fetch the specified category for editing
        $category = Category::findOrFail($id);
        return view('admin.editCategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request
        $data =  $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Update the category
        
        $category = Category::findOrFail($id);
        $category->update($data);

        // Redirect with success message
        return redirect()->route('categories');
    }
     /**
     * Display a listing of the trashed categories.
     */
    public function trash()
    {
        // Fetch all trashed categories
        $trash = Category::onlyTrashed()->get();
        return view('admin.trashCategory', compact('trash'));
    }
 
    /**
     * Restore the specified trashed category.
     */
    public function restore(string $id)
    {
        // Restore the trashed category
        Category::withTrashed()->where('id', $id)->restore();
       
        return redirect('categories.trash');
    }


    /**
     * Remove the specified resource from storage.
     */
   
     public function destroy(Category $category)
     {
         // Check if the category has any associated beverages
         if ($category->beverages()->count() > 0) {
             return redirect()->route('categories.index')->with('error', 'Cannot delete category with associated beverages.');
         }
 
         // Delete the category
         $category->delete();
 
         return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
     }
 
     public function forceDelete(Category $category)
     {
         // Check if the category has any associated beverages
         if ($category->beverages()->count() > 0) {
             return redirect()->route('categories.index')->with('error', 'Cannot permanently delete category with associated beverages.');
         }
 
         // Permanently delete the category
         $category->forceDelete();
 
         return redirect()->route('categories.index')->with('success', 'Category permanently deleted.');
     }
 

       /**
     * Custom error messages for validation.
     */
    public function errMsg()
    {
        return [
            'name.required' => 'The Category Name is required',
           
        ];
    }
}
