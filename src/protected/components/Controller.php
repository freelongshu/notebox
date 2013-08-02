<?php

/**
 * Controller基类
 *
 * @author wudi
 */
class Controller extends CController
{

	public $layout='//layouts/column1';

	public $menu=array();

	public $breadcrumbs=array();
    
    public function getLogger()
    {
        return Yii::getLogger();
    }

    public function renderJSON($data)
    {
       
        echo CJSON::encode($data);

        /*foreach (Yii::app()->log->routes as $route) {
            if($route instanceof CWebLogRoute) {
                $route->enabled = false; // disable any weblogroutes
            }
        }*/
        Yii::app()->end();
    }

    public function requireUserLogin()
    {
        if (Yii::app()->user->isGuest)
            Yii::app()->user->loginRequired();
    }

}