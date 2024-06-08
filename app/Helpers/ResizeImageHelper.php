<?php

use Intervention\Image\Facades\Image;

class ResizeImageHelper {

    static public function resizeImage($path, $file, $file_name) {
        $resize_image = Image::make($file->getRealPath());
        $resize_image->resize(800, 800, function($constraint) {
            $constraint->aspectRatio();
        })->save($path . '/' . $file_name);
    }

}
