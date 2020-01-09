<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

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
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = storage_path('app/images');
            $image->move($destinationPath, $name);

            return response()->json([
                'message' => 'image is uploaded',
                'url' => URL::asset($destinationPath . $name)
            ]);
        }

        return response()->json(['message' => 'image is missing'], 400);
    }
}
