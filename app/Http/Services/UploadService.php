<?php

namespace App\Http\Services;

class UploadService
{
    public function store($request){
        if($request->hasFile('file')){
            try {
                $info = array();
                //storeAs:
                //param1: ten thu muc con nam trong /storage/app
                //param2: ten file muon luu
                $file = $request->file('file');
                $fileName = $file->getClientOriginalName();
                $fileExt = $file->extension();
                $extArr = array("jpg", "jpeg", "png");
                if(in_array($fileExt, $extArr) == true){
                    $path = $file->storeAs(
                        'public/uploads/', $fileName
                    );
                    return '/storage/uploads/'.$fileName;
                }else{
                    return false;
                }
            }catch(\Exception $e){
                return false;
            }

        }
    }
}
