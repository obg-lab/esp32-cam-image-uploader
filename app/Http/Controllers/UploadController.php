<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

use App\Image;

class UploadController extends Controller
{
    /**
     * Store a new file.
     *
     * @param  Request  $request
     * @return Response
     */
    public function upload(Request $request)
    {
        Log::info('Upload started');

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $name = time() . '.' . strtolower($image->getClientOriginalExtension());

            $destinationPath = storage_path(env('UPLOAD_PATH'));

            $image->move($destinationPath, $name);

            $url = URL::asset('uploads/' . $name);

            $newImage = new Image();
            $newImage->name = $name;
            $newImage->url = $url;
            $newImage->save();

            return response()->json([
                'message' => 'image is uploaded',
                'data' => $newImage
            ]);
        }

        return response()->json(['message' => 'image is missing'], 400);
    }
}
