<?php 

// session_start();
// if (!empty($_REQUEST["title"]  && !empty($_REQUEST["content"]   ))) {

//     // require_once('../../classes.php');
// $user = unserialize($_SESSION["user"]);

// // if ($_FILES["image"]["name"]) {
    
 
    
// //     move_uploaded_file($_FILES["image"]["tmp_name"],$imageName ="../../images/posts". $_FILES["image"]["name"]);
// // }else{


// //     $imageName = null;

// // }

// var_dump($_REQUEST);
// // $user->store_post($_REQUEST["title"],$_REQUEST["content"],$imageName,$user->id);
// // header("location:profile.php?msg=done");



// }else{
//     header("location:profile.php?msg=required_fields");
// }





session_start();

if (!empty($_REQUEST["title"]) && !empty($_REQUEST["content"])) {

    require_once('../../classes.php');
    $user = unserialize($_SESSION["user"]);

    var_dump($_REQUEST); // title, content
    var_dump($_FILES);   // image

    if (!empty($_FILES["image"]["name"])) {
        $imagePath = "../../images/posts/" . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
    } else {
        $imagePath = null;
    }

    $user->store_post($_REQUEST["title"], $_REQUEST["content"], $imagePath, $user->id);

    header("Location: profile.php?msg=done");
    exit;
} else {
    header("Location: profile.php?msg=required_fields");
    exit;
}
