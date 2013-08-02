<?php

$basePath = dirname(__FILE__).DIRECTORY_SEPARATOR.'..';

Yii::setPathOfAlias('lib', $basePath.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'lib');

return array(
	'language'=>'zh_cn',
    'basePath' => $basePath,
    'name' => '笔记盒',

    'preload' => array('log'),
    //'runtimePath' => SAE_TMP_PATH,
    //'runtimePath'=>'application.runtime',
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.repositories.*',
        'application.errors.*',
        'lib.yiiext.YiiRedis.*',
		'application.weibo-php-sdk.*',
    ),

    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'pipashu',
            'ipFilters' => array('127.0.0.1','::1'),
        ),
    ),

    'components' => array(
        'user' => array(
            'class' => 'application.components.WebUser',
            'allowAutoLogin' => true,
            'loginUrl' => array('organization/login'),
            'passwordSalt' => '',
        ),

        'urlManager' => array(
            'baseUrl' => '/src',
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
				'/site'=>'/site/index',
                '/user/verifyEmail/<emailVerifyCode:\w+>'=>'/user/verifyEmail',
                '/note/index'=>'/note/index',
                '/note/create/<boxId:\d+>'=>'/note/create',
                '/note/delete/<id:\d+>'=>'/note/delete',
                '/note/update/<noteId:\d+>'=>'/note/update',
                '/note/collect/<id:\d+>'=>'/note/collect',
                '/box/delete/<id:\d+>'=>'/box/delete',
                '/box/update/<id:\d+>'=>'/box/update',                                     
                '<controller:\w+>' => '<controller>/index',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),

		'session' => array(
            'class' => 'system.web.CDbHttpSession',
            'autoStart' => true,
            'connectionID' => 'db',
            'sessionTableName' => 'yii_session',
        ),


        'viewRenderer' => array(
            'class' => 'lib.yiiext.smarty-renderer.ESmartyViewRenderer',
            'fileExtension' => '.tpl',
            'smartyDir' => 'lib.smarty',
            'config' => array(
                'force_compile' => YII_DEBUG,
                'left_delimiter' => '{{',
                'right_delimiter' => '}}',
            ),
            'functions' => array(
                'url' => array('SmartyPlugins', 'urlFunction'),
                'static' => array('SmartyPlugins', 'staticFunction'),
            ),
            'modifiers' => array(
                'city' => array('SmartyPlugins', 'cityModifier'),
                'industry' => array('SmartyPlugins', 'industryModifier'),
                'profession' => array('SmartyPlugins', 'professionModifier'),
            ),
        ),

	    'redis' => array(
            'class' => 'lib.yiiext.YiiRedis.ARedisConnection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 0,
	    ),

		'db' => array(
            //'connectionString' => 'mysql:host='.SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT.';dbname='.SAE_MYSQL_DB,
            'connectionString'=>'mysql:host=127.0.0.1;dbname=notebox',
            'emulatePrepare' => true,
            //'username' => SAE_MYSQL_USER ,
            'username'=>'root',
            //'password' => SAE_MYSQL_PASS ,
            'password'=>'',
            'charset' => 'utf8',
        ),
        
        'errorHandler' => array(
            'errorAction' =>'site/error',
        ),
		
        
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CWebLogRoute',
                ),
            ),
        ),
		
        // 社交网站接入
        'weiboConnector' => array(
            'class' => 'application.components.connectors.WeiboConnector',
            'app_key' => '2963767153',
            'app_secret' => '2d3fcf1930cb4e8dd0575b90543bb3bd',
            'authorize_url' => 'https://api.weibo.com/oauth2/authorize',
            'token_url' => 'https://api.weibo.com/oauth2/access_token',
            'redirect_url' => 'http://www.51neitui.com/connect/weibo',
        ),
        'doubanConnector' => array(
            'class' => 'application.components.connectors.DoubanConnector',
            'app_key' => '0344731a3f451f5009cd594ebdcf5df0',
            'app_secret' => '461f25aef788291e',
            'authorize_url' => 'https://www.douban.com/service/oauth2/auth',
            'token_url' => 'https://www.douban.com/service/oauth2/token',
            'redirect_url' => 'http://www.51neitui.com/connect/douban',
        ),
        'mailer' => array(
            'class' => 'application.extensions.mailer.EMailer',
            'pathViews' => 'application.views.email',
            'pathLayouts' => 'application.views.email.layouts',
        ),
    ),
    'params' => array(
        'smtp_host' => 'smtp.sina.cn',
        'smtp_username' => 'notebox@sina.cn',
        'smtp_password' => 'notebox2013',
        'siteUrl' => 'notebox.sinaapp.com',
        'adminEmail' => '782570386@qq.com',
        'domain'=>'http://notebox.sinaapp.com',
    ),
);
