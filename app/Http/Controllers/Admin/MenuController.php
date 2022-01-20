<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService){
        $this->menuService = $menuService;
    }

    public function create(){
        return view('admin.menus.add',[
            'title' => 'Thêm Danh Mục Mới',
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function store(CreateFormRequest $request){
        $result = $this->menuService->create($request);

        return redirect()->back();
    }

    public function index(){
        return view('admin.menus.list', [
            'title' => 'Danh Sách Danh Mục',
            'menus' => $this->menuService->getAll()
        ]);
    }

    public function destroy(Request $request){
        $result = $this->menuService->destroy($request);
        if($result == true){
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công danh mục'
            ]);
        }else{
            return response()->json([
                'error' => true,
                'message' => 'Xóa không thành công'
            ]);
        }
    }

    public function show(Menu $menu){
        return view('admin.menus.edit', [
            'title' => 'Chỉnh Sửa Danh Mục: '.$menu->name,
            'menu' => $menu,
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function update(Menu $menu, CreateFormRequest $request){
        $result = $this->menuService->update($menu, $request);

        return redirect()->back();
    }
}
