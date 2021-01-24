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
    function generateRandomCode(  $length=3,$length1=5){



        $poolChar = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $poolNum = '0123456789';
        $code = substr(str_shuffle(str_repeat($poolChar, 3)), 0, $length) .'-'.substr(str_shuffle(str_repeat($poolNum, 5)), 0, $length1);

        return $code;
    }
}


