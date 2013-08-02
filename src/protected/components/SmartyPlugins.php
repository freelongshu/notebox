<?php

class SmartyPlugins extends CComponent
{
    public static function urlFunction($params, $smarty)
    {
        $route = $params['r'];
        unset($params['r']);
        return Yii::app()->urlManager->createUrl($route, $params);
    }

    public static function staticFunction($params, $smarty)
    {
        $file = $params['file'];
        return Yii::app()->request->baseUrl.'/static/'.$file;
    }

    public static function cityModifier($id)
    {
        return City::get($id)->name;
    }

    public static function industryModifier($id)
    {
        return Industry::get($id)->name;
    }

    public static function professionModifier($id)
    {
        return Profession::get($id)->name;
    }

}