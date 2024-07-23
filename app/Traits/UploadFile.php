<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadFile
{
    public function uploadFile($imageFile, $path){
        $imageExt = $imageFile->getClientOriginalExtension();
        $fileName = time() . '.' . $imageExt;
        $imageFile->move($path, $fileName);
        return $fileName;
        }
}