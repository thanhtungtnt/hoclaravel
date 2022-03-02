<?php

namespace App\Http\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductService
{
    public function create($request){
        try {
            $name = $request->input('name');
            $description = $request->input('description');
            $content = $request->input('content');
            $menu_id = $request->input('menu_id');
            $price = $request->input('price');
            $price_sale = $request->input('price_sale');
            $product_thumb = $request->input('product_thumb');
            $active = ($request->input('active')) ? '1' : '0';

            Product::create([
                'name' => $name,
                'description' => (string) $description,
                'content' => (string) $content,
                'menu_id' => (int) $menu_id,
                'price' => (int) $price,
                'price_sale' => (int) $price_sale,
                'product_thumb' => (string) $product_thumb,
                'active' => (int) $active
            ]);
            Session::flash('success','Tạo Sản Phẩm Thành Công');
        }catch (\Exception $err) {
            dd($err . getMessage());
        }
    }
}
