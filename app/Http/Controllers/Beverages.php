<?
namespace App\Http\Controllers;
use App\Traits\Traits\UploadFile;
use Illuminate\Http\Request;
use App\Models\Beverage;
use Illuminate\Support\Facades\Storage;


class Beverages extends Controller
{
   use UploadFile;
    /**
     * Display a listing of beverages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='Beverages of cafe';
        $beverages = Beverage::all();
        return view('admin.beverages', compact('beverages','title'));
    }

    /**
     * Show the form for creating a new beverage.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addBeverage');
    }

    /**
     * Store a newly created beverage in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'price' => 'required|numeric',
            'published' => 'nullable|boolean',
            'special' => 'nullable|boolean',
            'image' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);
        $fileName= $this->upload($request->image, 'assets/img');
         $data['image'] = $fileName;
            // Handle the active checkbox
       $data['active'] = isset ($request->active);
       $data['published'] = isset ($request->published);
        Beverage::create($data);

        return redirect()->route('beverages')->with('success', 'Beverage created successfully.');
    }

    /**
     * Display the specified beverage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $title = "Show beverage ";
        
        $beverage = Beverage::findOrFail($id);
        return view('admin.showBeverage', compact('beverage','title'));
    }

    /**
     * Show the form for editing the specified beverage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title='edit beverages';
        $beverage = Beverage::findOrFail($id);
        return view('admin.editBeverages', compact('beverage','title'));
    }

    /**
     * Update the specified beverage in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $beverage = Beverage::findOrFail($id);
    
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'price' => 'required|numeric',
            'published' => 'nullable|boolean',
            'special' => 'nullable|boolean',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($beverage->image) {
                $oldImagePath = public_path('assets/img/' . $beverage->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            // Store the new image
            $fileName = $this->upload($request->image, 'assets/img');
            $data['image'] = $fileName;
        } else {
            // Keep the old image if no new image is uploaded
            $data['image'] = $beverage->image;
        }
    
        $beverage->update($data);
    
        return redirect()->route('beverages')->with('success', 'Beverage updated successfully.');
    }

    /**
     * Remove the specified beverage from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $beverage = Beverage::findOrFail($id);
        if ($beverage->image) {
            $imagePath = public_path('assets/img/' . $beverage->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $beverage->delete();
        return redirect()->route('beverages')->with('success', 'Beverage deleted successfully.');
    }
    /**
     * Display a listing of trashed beverages.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $beverages = Beverage::onlyTrashed()->get();
        return view('admin.trashBeverage', compact('beverages'));
    }

    /**
     * Restore the specified trashed beverage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $beverage = Beverage::withTrashed()->findOrFail($id);
        $beverage->restore();
        return redirect()->route('beverages.trash')->with('success', 'Beverage restored successfully');
    }

    /**
     * Permanently delete the specified trashed beverage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        $beverage = Beverage::withTrashed()->findOrFail($id);
        if (Storage::exists('assets/img/' . $beverage->image)) {
            Storage::delete('assets/img/' . $beverage->image);
        }
        $beverage->forceDelete();
        return redirect()->route('beverages.trash')->with('success', 'Beverage permanently deleted');
    }
}
