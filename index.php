<?php 
// khoi dong session
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
require 'config/constant.php';
require 'helper/CommonHelper.php';
require 'helper/LoginUserHelper.php';
require 'helper/UploadFileHelper.php';
require 'helper/PaginationHelper.php';

if(file_exists('router/web.php')){
    require 'router/web.php';
} else {
    die('Sorry, website can not access');
}