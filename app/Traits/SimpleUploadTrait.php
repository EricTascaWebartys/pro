<?php
namespace App\Traits;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Str;
use Image;

trait SimpleUploadTrait {

    /**
     * Upload the file with slugging to a given path
     *
     * @param UploadedFile $image
     * @param $path
     * @return string
     */

    public function uploadFile(UploadedFile $image, $path) {
        $extension = $image->getClientOriginalExtension();
        $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $image_name = Str::slug($name) . "-" . uniqid('', 5) . '.' . $extension;
        $image->move($path, $image_name);

        return $image_name;
    }

    public function uploadImageResize($image, $path, $height, $width=null) {
        list($oldWidth,$oldHeight) = getimagesize($image);
        // $oldHeight = Image::make($image)->height();
        // $oldWidth = Image::make($image)->width();
        $ratio = $oldWidth / $oldHeight;

        $extension = $image->getClientOriginalExtension();
        $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $image_name = Str::slug($name) . "-" . uniqid('', 5) . '.' . $extension;

        $image->move("upload/temp/", $image_name);

        // $original = imagecreatefromjpeg("ORIGINAL.jpg");
        if($width === null) $width = $ratio*$height;
        $resized = imagecreatetruecolor($width, $height);
        // $img = imagejpeg($resized, "plop.jpg");
        $link = "upload/temp/". $image_name;
        $extension === "png" ? $imageSource = imagecreatefrompng($link) : $imageSource = imagecreatefromjpeg($link);
        // $link = asset($path .'test.jpg');
        // $test = imagecopyresampled($resized, $img, 0, 0, 0, 0, $width, $height, $oldWidth, $oldHeight);
        imagecopyresampled($resized, $imageSource, 0, 0, 0, 0, $width, $height, $oldWidth, $oldHeight);
       // copier l'image dans la nouvelle destination
       $destination = $path . $image_name;
       // imagepng($resized, $destination);
       $extension === "png" ? imagepng($resized, $destination) : imagejpeg($resized, $destination);
       unlink("upload/temp/". $image_name);
       // $image->move($path, $resized);

        return $image_name;

    }
}
