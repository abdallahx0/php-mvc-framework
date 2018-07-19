<?php 

use System\Application;

$app = Application::getInstance();

$app->route->add('/' , 'Home');

$app->route->add('/404' , 'NotFound');
