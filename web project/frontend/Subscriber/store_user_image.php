<?php 
// var_dump($_FILES);
session_start();

require_once('../../classes.php');
if (!empty($_FILES["image"]["name"])) {
    
    $user = unserialize($_SESSION["user"]);
    if (!empty($_FILES["image"]["name"])) {
        $imagePath = "../../images/users/" . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
        $user->update_profile_pic($imagePath, $user->id);
        $user->image=$imagename;
        $_SESSION["user"]=serialize($user);
        header("Location: profile.php?msg=uius");
    } 


  
} else {
    header("Location: profile.php?msg=required_fields");
    exit;
}