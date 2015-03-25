<?php
include_once 'lib.php';
include_once 'db.php';
include_once 'profile.php';

View::start('');

$uid = $_POST['uid'];
$option = $_POST['option_gestion'];

if($option == 1){
    $res = DB::queryExecuter("DELETE FROM usuarios WHERE id='$uid';");
    print_r($res);
    header("Refresh: 5; URL: admin.php");
}elseif($option == 2){
    Profile::get_form($uid);
}else{
    exit();
}

View::end();