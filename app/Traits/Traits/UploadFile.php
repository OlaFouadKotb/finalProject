<?
namespace App\Traits\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadFile
{
    public function upload($file, $path)
    {
        $fileName = time() . '-' . $file->getClientOriginalName();
        $file->storeAs($path, $fileName, 'public');
        return $fileName;
    }
}