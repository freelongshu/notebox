<?php

$yii = dirname(__FILE__).'/../lib/yii/yii.php';
$config = dirname(__FILE__).'/protected/config/main.debug.php';
$application = dirname(__FILE__).'/protected/components/Application.php';

defined('YII_DEBUG') or define('YII_DEBUG',TRUE);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',0);
defined('REDIS') or define('REDIS', FALSE);

require_once($yii);
require_once($application);

$app = new Application($config);

$app->run();
