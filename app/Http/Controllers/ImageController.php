<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function show(Image $image)
    {
        $imageFile  = Storage::get($image->path);
        $type   = Storage::mimeType($image->path);

        return response($imageFile)->header('content-type', $type);
    }
}
