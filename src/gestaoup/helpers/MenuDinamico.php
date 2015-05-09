<?php

namespace gestaoup\helpers;

use Yii;
use yii\caching\TagDependency;
use kartik\icons\Icon;
use app\modules\base\models\Menu;



class MenuDinamico
{

    public static function getMenu($userId){

        $menus = Menu::find()->where('st_ativo = 1')->asArray()->indexBy('id')->all();

        $result = [];
        foreach ($menus as $id=>$menu) {
            $items[$menu['menu_id']][$menu['id']]=$menu;
        }

        $result = self::normalizeMenu($items);

        return $result;
    }


    private static function normalizeMenu($menus, $root = null){

        $order = [];
        foreach($menus[$root] as $id=>$menu){

            if(!empty($menu['ds_icon'])){
                $StrMenu = Icon::show($menu['ds_icon']) .' '.$menu['ds_menu'];
            } else{
                $StrMenu = $menu['ds_menu'];
            }

            $items[$id] = [
                'label' => $StrMenu,
                'url' => $menu['ds_rota'],
            ];

            $order[] = $menu['nr_ordem'];

            if(isset($menus[$id])){
                $items[$id]['items'] = static::normalizeMenu($menus, $menu['id']);
            }

        }

        if($items != []){
            array_multisort($order, $items);
        }

        return $items;
    }

}
