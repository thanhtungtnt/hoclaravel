<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Helpers\Helper;

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
}
