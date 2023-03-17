<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;

class UploadImageController extends Controller
{

/*  ----------  Without image crop and resize -------------
    public function index()
    {
        return view('image');
    }

    public function save(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5120',

        ]);
        if ($request->hasFile('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images', $name);

            $auth = Auth::user();
            $save = new Photo;

            $save->name = $name;
            $save->userid = $auth->id;
            $save->path = $name;

            $save->save();

            return redirect('dashboard');
        }
        return back()->with('error', "Invalid format or file does not exist!");
    }

*/

    public function imageUploadPage()
    {
        if (Auth::check()) {
            return view('crop-image-upload');
        }

        return redirect("welcome");
    }

    public function uploadCropImage(Request $request)
    {
        $auth = Auth::user();
        $save = new Photo;
        $folderPath = public_path('storage/images/');

        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $imageName = $auth->id."-picture.png";//uniqid() . '.png';

        $imageFullPath = $folderPath . $imageName;

        if(file_exists($imageFullPath)){
            unlink($imageFullPath);
        }else{
            $save->name = $imageName;
            $save->userid = $auth->id;
            $save->path = $imageName;
            $save->save();
        }
        file_put_contents($imageFullPath, $image_base64);

        return response()->json(['success' => 'Crop Image Uploaded Successfully']);
    }


}
