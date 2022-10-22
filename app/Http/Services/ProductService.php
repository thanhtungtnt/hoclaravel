<?php

namespace App\Http\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductService
{
    public function getAll(){
        return Product::all();
    }

    protected function isValidPrice($request){
        if($request->input('price') > $request->input('price_sale')){
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }
        return true;
    }

    public function create($request){
        try {
            $isValidPrice = $this->isValidPrice($request);
            if ($isValidPrice === false) return false;

            //get data
            $name = $request->input('name');
            $description = $request->input('description');
            $content = $request->input('content');
            $menu_id = $request->input('menu_id');
            $price = $request->input('price');
            $price_sale = $request->input('price_sale');
            $product_thumb = $request->input('product_thumb');
            $active = ($request->input('active')) ? '1' : '0';

            //create row
            //cach 1 : lay ra tung data
            Product::create([
                'name' => $name,
                'description' => (string) $description,
                'content' => (string) $content,
                'menu_id' => (int) $menu_id,
                'price' => (int) $price,
                'price_sale' => (int) $price_sale,
                'thumb' => (string) $product_thumb,
                'active' => (int) $active
            ]);
            Session::flash('success','Thêm Sản Phẩm Thành Công');
        }catch (\Exception $err) {
//            Session::flash('error', 'Thêm sản phẩm không thành công');
            dd($err);
            return false;
        }
        return true;
    }
}
