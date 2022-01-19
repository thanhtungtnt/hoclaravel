<?php 
namespace App\Helpers;

class Helper{
    public static function menus($menus, $parentID = 0, $char = ''){
        $html = '';

        foreach ($menus as $k => $m) {
            if($m->parent_id == $parentID){
                $html .= '
                    <tr>
                        <td>'.$m->id.'</td>
                        <td>'.$char.$m->name.'</td>
                        <td>'.$m->parent_id.'</td>
                        <td>'.$m->description.'</td>
                        <td>'.$m->content.'</td>
                        <td>'.$m->active.'</td>
                    </tr>
                ';

                unset($menus[$k]);

                $html .= self::menus($menus, $m->id, '|---');
            }
        }

        return $html;
    }
}