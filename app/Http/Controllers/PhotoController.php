<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    //
    public function addImage($id,Request $request) {
        $file = null;
     
        if ($request->hasFile('photo')) {
            $md5Name = md5_file($request->file('photo')->getRealPath());
            $guessExtension = $request->file('photo')->guessExtension();
            $originalName = $request->file('photo')->getClientOriginalName();
            $file = $request->file('photo')->storeAs('profile/'.$id, $originalName);
            $client->update(['file_profile' => $originalName]);
        }
        return $file;
    }

    public function getUrlImg($id,$name){

        $url = Storage::url('profile/'.$id.'/'.$name);
        return $url;
    }
}
