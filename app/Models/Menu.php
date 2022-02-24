<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'content',
        'link',
        'active'
    ];

    //Hàm này lấy được 1 child của group mà nó tìm thấy
    public function menus()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    //Hàm này lấy được nhiều child của nhiều cấp mà nó tìm thấy
    public function childrenMenus()
    {
        return $this->hasMany(Menu::class, 'parent_id')->with('menus');
    }
}
