<?php 
session_start();
require_once('../../classes.php');
$user =unserialize( $_SESSION["user"]);
if (!empty($_REQUEST["commend"])) {
    // $user->store_commend($_REQUEST["commend"],$_REQUEST["post_id"],$user->id);
    $user->store_commend($_REQUEST["commend"], $user->id, $_REQUEST["post_id"]);

    header("location:profile.php?msg=cas تم ارسال التعليق");
}else{
    header("location:profile.php?msg=ncas لم يتم ارسال التعليق");

}