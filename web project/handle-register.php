<?php

//  var_dump($_REQUEST);
 
session_start();
$ereers=[];

if(empty($_REQUEST["name"]))$ereers["name"]="plese enter the name";
if(empty($_REQUEST["email"]))$ereers["email"]="plese enter the email address";
if(empty($_REQUEST["phone"]))$ereers["phone"]="plese enter the phone";
if(empty($_REQUEST["pw"]) || empty($_REQUEST["pc"])){
    $ereers["pw"]="plaese add password confirmation rquirment";
}
else if($_REQUEST["pc"]!= $_REQUEST["pw"]){

    $ereers["pc"]="password confirmation most be aqule to password";
}

$name=htmlspecialchars(trim( $_REQUEST["name"]));
$phone=htmlspecialchars( $_REQUEST["phone"]);
$password_confirmation=htmlspecialchars( $_REQUEST["pc"]);
$password=htmlspecialchars($_REQUEST["pw"]);
$email=   filter_var($_REQUEST["email"],FILTER_SANITIZE_EMAIL);
 

// echo $name;
// echo $phone;
// echo $password_confirmation;
// echo $password;
// echo $email;
if(!empty($_REQUEST["email"])  && !filter_var($_REQUEST["email"],FILTER_VALIDATE_EMAIL))$ereers["email"]="email invalid add plaese";

if(empty($ereers))
{
    echo "hi";
   
        //code...
        // require_once('classes.php'); ده شكل الكود لو عايز اسجل user
        // $rslt= Subscriber::register(md5($password) , $name,$email,$phone);
        // header('location:index.php?msg=succesfull');
        require_once('classes.php');
        try {
            //code...
            $rslt= Subscriber::register(md5($password) , $name,$email,$phone);
            header('location:index.php?msg=succesfull');
        } catch (\Throwable $th) {
            header('location:register.php?msg=الاميل موجود');
            //throw $th;
        }

        //throw $th;
        // header(header: 'location:register.php?msg=ar');
    
    // var_dump($cn);

} 


else  {

$_SESSION["ereers"]=$ereers;

    header("location:register.php");
}





