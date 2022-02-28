<?php

namespace App\Http\Services;

class UploadService
{
    public function store($request){
        if($request->hasFile('file')){
            try {
                //storeAs:
                //param1: ten thu muc con nam trong /storage/app
                //param2: ten file muon luu
                $fileName = $request->file('file')->getClientOriginalName();
                $path = $request->file('file')->storeAs(
                    'public/uploads/', $fileName
                );
                return '/storage/uploads/'.$fileName;
            }catch(\Exception $e){
                return false;
            }

        }
    }
}
