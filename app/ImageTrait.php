<?php
namespace App;
use Intervention\Image\Facades\Image;
Trait ImageTrait
{
    function saveImage($folder ,$photo,$width=300,$height=300){


        $file_name=$photo->hashName();

        Image::make($photo)
            ->resize($width, $height)->fit($width,$height)
            ->save(public_path($folder.$file_name));


        return $file_name;
    }
}


