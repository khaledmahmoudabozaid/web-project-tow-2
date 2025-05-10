<?php
session_start();
// var_dump($_REQUEST);
if (!empty($_REQUEST["email"])&&!empty($_REQUEST["password"])) {
    //filterationمعملتهاش
    $email = filter_var($_REQUEST["email"], FILTER_SANITIZE_EMAIL);
    // echo"hallow ";
    # code...
    require_once('classes.php');
   $user=user::login($_REQUEST["email"],md5( $_REQUEST["password"]));
   if (!empty($user)) {
     $_SESSION["user"]= serialize($user) ;
    

    if ($user->role == "admin") {
        header("location:frontend/admin/home.php");
        # code...
    }elseif($user->role == "Subscriber"){
        header("location:frontend/Subscriber/home.php");
  
    }
    # code...
   }
   else{

    header("location:index.php?msg=no user");

   }

}
else{
    header("location:index.php?msg=empty_field");
} 
// session_start();
// // var_dump($_REQUEST);
//  if (!empty($_REQUEST["email"]) && !empty($_REQUEST["password"])) {

// //      $email =filter_var( $_REQUEST["email"],FILTER_SANITIZE_EMAIL);
// //      $passwod =htmlspecialchars($_REQUEST["passwod"]);

//   require_once('classes.php');
//   $user= user::login($_REQUEST["email"],md5($_REQUEST["password"]));


//  if (!empty($user)) {
//      $_SESSION["user"]= serialize($user);
//    if ($user->role == "admin") {
//          header("location:frontend/admin/home.php");
//     }elseif ($user->role == "Subscriber") {
//        header("location:frontend/Subscriber/home.php");
        
//     }
//   }else
//   {
//     header( "location:index.php?msg=no_user");
    
// }
 
   
// }else {
//     header( "location:index.php?msg=empty_field");
// }
