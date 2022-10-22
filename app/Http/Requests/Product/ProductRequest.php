<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'menu_id'=>'required',
            'thumb'=>'required',
            'price'=>'required|numeric',
            'price_sale'=>'numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'menu_id.required' => 'Danh mục không được để trống',
            'thumb.required' => 'Hình ảnh sản phẩm không được để trống',
            'price.numeric'=>'Giá phải là 1 số',
            'price.required' => 'Giá không được để trống',
            'price_sale.numeric' => 'Giá Sale phải là 1 số'
        ];
    }
}
