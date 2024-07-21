<?
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Beverage;
use Illuminate\Support\Facades\Storage;


class Beverages extends Controller
{
   // use UploadFile;
    /**
     * Display a listing of beverages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beverages = Beverage::all();
        return view('admin.beverages', compact('beverages'));
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
            'category' => 'required|string',
        ]);
         $imgExt = $request->image->getClientOriginalExtension();
         $fileName = time() . '.' . $imgExt;
         $path = 'assets/img';
         $request->image->move($path, $fileName);
          $data['image'] = $fileName;
       
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
        $beverage = Beverage::findOrFail($id);
        return view('admin.showBeverage', compact('beverage'));
    }

    /**
     * Show the form for editing the specified beverage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $beverage = Beverage::findOrFail($id);
        return view('admin.editBeverages', compact('beverage'));
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
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'price' => 'required|numeric',
            'published' => 'nullable|boolean',
            'special' => 'nullable|boolean',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string'
        ]);
        $beverage = Beverage::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($beverage->image) {
                Storage::disk('public')->delete($beverage->image);
            }

            $path = $request->file('image')->store('images', 'public');
            $data['image'] = $path;
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
        if (Storage::exists('assets/img/' . $beverage->image)) {
            Storage::delete('assets/img/' . $beverage->image);
        }
        $beverage->delete();
        return redirect()->route('beverages')->with('success', 'Beverage deleted successfully');
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