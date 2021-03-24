<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Session;
use JD\Cloudder\Facades\Cloudder;

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

    public function storeMediaCloudinary($request, $field)
    {
        $fileNameToStore = 'untitled';

        // Handle File Upload
        if ($request->hasFile($field)) {

            $media = $request->file($field);

            // dd($media->getMimeType());

            $media_type = explode('/', $media->getMimeType())[0];

            $media_ext = explode('/', $media->getMimeType())[1];

            $media_name = $media->getRealPath();

            list($width, $height) = getimagesize($media_name);

            if ($media_type == 'video' || $media_type == 'audio') {
                Cloudder::uploadVideo($media_name, null);

                if($media_type == 'video')
                {
                    $media_url = 'https://res.cloudinary.com/ieltstinder/video/upload/' . Cloudder::getPublicId() . "." . $media_ext;
                }else{
                    $media_url = Cloudder::secureShow(Cloudder::getPublicId(), [
                        'resource_type' => 'video',
                        'format' => 'mp3'
                    ]);
                }
            } else {
                Cloudder::upload($media_name, null);
                $media_url = Cloudder::secureShow(Cloudder::getPublicId(), [
                    'resource_type' => $media_type,
                    'format' => $media_ext,
                    "width" => $width,
                    "height" => $height
                ]);
            }

            return $media_url;
        }

        return $fileNameToStore;
    }

    public function encrypt($data)
    {
        return Crypt::encryptString($data);
    }

    public function decrypt($encryptString)
    {
        try
        {
            return Crypt::decryptString($encryptString);

        } catch (DecryptException $e) {
            //
        }
    }

    public function commingSoon()
    {
        Session::flash(
            'message',
            'Swal.fire(
                "Comming soon",
                "The function is under development!",
                "info"
            )'
        );

        return redirect()->back();
    }
}
