<?php

class SiteController extends Controller
{
    public function actions(){
        return array(
			'index' => 'application.controllers.site.IndexAction',
        );
    }
}
