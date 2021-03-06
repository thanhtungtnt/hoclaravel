<?php
namespace App\Http\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MenuService{
    public function getParent(){
        return Menu::where('parent_id', null)->get();
    }

    public function getAll2(){
        return Menu::all();
    }

    public function getAll(){
        return Menu::where('parent_id', null)
            ->with('childrenMenus')
            ->get();
    }

    public function create($request){
        try {
            $active = ($request->input('active')) ? '1' : '0';
            $parent_id = $request->input('parent_id');
            if($parent_id == 0){
                $parent_id = null;
            }
            Menu::create([
                'name' => (string) $request->input('name'),
                'parent_id' => $parent_id,
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

    public function update($menu, $request){
        $menu->name = (string) $request->input("name");
        $menu->parent_id = (int) $request->input("parent_id");
        $menu->description = (string) $request->input("description");
        $menu->content = (string) $request->input("content");
        $menu->link = (string) $request->input("link");
        $menu->active = (string) ($request->input("active")) ? 1 : 0;

        $menu->save();

        $request->session()->flash('success', 'Cập Nhật Thành Công Danh Mục');
    }

    public function destroy($request){
        $id = $request->input('id');
        $menu = Menu::where('id', $id)->first();
        if($menu){
            return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }
        return false;
    }
}
