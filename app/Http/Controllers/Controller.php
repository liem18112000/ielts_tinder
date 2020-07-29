<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function storeMedia($request, $field, $storeLocation)
    {

        $fileNameToStore = 'untitled';

        // Handle File Upload
        if ($request->hasFile($field)) {

            // Get filename with the extension
            $filenameWithExt = $request->file($field)->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file($field)->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            // Upload Image
            $path = $request->file($field)->storeAs($storeLocation, $fileNameToStore);
        }

        return $fileNameToStore;
    }
}
