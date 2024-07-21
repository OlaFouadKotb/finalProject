<?php

namespace App\Traits\Traits;

use PhpParser\Builder\Function_;

trait UploadFile
{
    public Function upload($imageFile, $path)
    {
        $imgExt = $imageFile->getClientOriginalExtension();
        $fileName = time() .'.'.$imgExt;
        $imageFile->move($path, $fileName);
        return $fileName;
    }
}
