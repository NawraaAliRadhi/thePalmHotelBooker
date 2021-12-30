<?php


namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait UploadTrait
{
    public function uploadOne(UploadedFile $uploadedFile, $folder = null,
        $disk = 'public', $filename = null) : string
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }

    public function deleteFile($path, $disk = "public") : void
    {
        $path = storage_path().'/app/'.$disk.'/'.$path;
        if(File::exists($path) && !is_dir($path)){
            unlink($path);
        }
    }
}
