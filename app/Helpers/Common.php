<?php

namespace App\Helpers;

use Image;
use Str;

class Helper
{
    public static function image($file, $path)
    {
        $uploadedFile = $file;
        $extension = $uploadedFile->getClientOriginalExtension();
        $fileName = 'media_' . uniqid() . '.' . $extension;

        Image::make($uploadedFile)->save(public_path($path . $fileName));


        return $fileName;
    }


    public static function skuGenerate($productName, $categoryId)
    {
        $sku = Str::slug($productName) . '-' . Str::slug($categoryId) . '-' . uniqid();
        return $sku;
    }


    public static function prevImage($image, $path)
    {
        $deletedFrom = public_path($path . $image);
        unlink($deletedFrom);
    }
}
