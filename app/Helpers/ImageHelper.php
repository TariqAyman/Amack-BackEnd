<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/2/20, 3:52 AM
 * Last Modified: 10/24/20, 7:41 PM
 * Project Name: Amack-BackEnd
 * File Name: ImageHelper.php
 */

declare(strict_types=1);

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class ImageHelper
{
    public function save(array $image, string $path = ''): string
    {
        $imgType = explode('.', $image['name'])[1];
        $imageName = Str::random(10) . '.' . $imgType;
        try {
            Storage::disk('public')->put($path . $imageName, base64_decode($image['content']));
        } catch (FileException $fileException) {
            throw new \RuntimeException($fileException->getPrevious());
        }
        return $path . $imageName;
    }
}
