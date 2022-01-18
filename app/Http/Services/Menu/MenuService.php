<?php 
namespace App\Http\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MenuService{
    public function getParent(){
        return Menu::where('parent_id', 0)->get();
    }

    public function create($request){
        try {
            $active = ($request->input('active')) ? '1' : '0';

            Menu::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'link' => (string) Str::slug($request->input('name'), '-'),
                'active' => (int) $active
            ]);

            Session::flash('success','Tạo Thành Công');
        } catch (\Exception $err) {
            Session::flash('error',$err->getMessage());
            return false;
        } 

        return true;
    }
}