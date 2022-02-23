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
                        <td>
                            <a href="/admin/menus/edit/'.$m->id.'" class="text-primary"><i class="fas fa-edit"></i></a>
                            <a href="#" onclick="removeRow('.$m->id.', \'/admin/menus/destroy\')" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                ';

                unset($menus[$k]);

                $html .= self::menus($menus, $m->id, $char.'----');
            }
        }

        return $html;
    }
}
