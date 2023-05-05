<?php
session_start();

if(!isset($config)) {
    $config = [];
}

if(isset($config['needToLogin']) == false) {
    $config['needToLogin'] = true;
}

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../lib/lib.php';
require_once __DIR__ . '/../app/app.php';

if($config['needToLogin'] and App::isLogined() == false) {
    jsAlert('Plase Login');
    jsLocationReplace('/adm/member/login.php');
}