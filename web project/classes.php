<?php


abstract  class user
{
   public $id;
   protected $password;
   public $name;
   public $image;
   public $email;
   public $phone;
   public $create_at;
   public $updata_at;

   function __construct($id, $password, $name,$image, $email, $phone, $create_at, $updata_at)
   {

      $this->id = $id;
      $this->password = $password;
      $this->name = $name;
      $this->image= $image;
      $this->email = $email;
      $this->phone = $phone;
      $this->create_at = $create_at;
      $this->updata_at = $updata_at;
   }


   public static  function login($email, $password)
   {
      $user = null;
      $qry = " SELECT* FROM USERS WHERE email='$email'and password='$password'";
      require_once('config.php');
      $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);

      //   $cn = mysqli_connect("localhost", "username", "password", "database");

      $rslt = mysqli_query($cn, $qry);
      if ($arr = mysqli_fetch_assoc($rslt)) {
         var_dump($arr);

         switch ($arr["role"]) {
            case 'Subscriber':

               $user = new Subscriber($arr["id"], $arr["password"], $arr["name"],$arr["image"] ,$arr["email"], $arr["phone"], $arr["created_at"], $arr["updated_at"]);
               break;
            case 'admin':
               $user = new admin($arr["id"], $arr["password"], $arr["name"],$arr["image"], $arr["email"], $arr["phone"], $arr["created_at"], $arr["updated_at"]);

               break;
         }
      }

      mysqli_close($cn);
      return $user;
      //    if (!$cn) {
      //       die("Database connection failed: " . mysqli_connect_error());
      //    } else {
      //       echo "قاعده البيانات مفعله بنجاح"; //رساله تدل علي ان احنا متصلين db
      //    }


   }
}
class  Subscriber extends user
{


   public $role = "Subscriber";

   public static function register($password, $name, $email, $phone)
   {
      $qry=" insert into USERS (password,name,email,phone)
        values('$password','$name','$email','$phone')";
      require_once('config.php');
      $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
      $rslt = mysqli_query($cn, $qry);
      mysqli_close($cn);
      return $rslt;
   }

public function store_post($title,$content,$image,$id_user ){
$qry= " insert into posts(title,content,image,id_user)
values('$title','$content','$image','$id_user')";
require_once('config.php');
$cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
$rslt = mysqli_query($cn, $qry);
mysqli_close($cn);
return $rslt;

}
public function store_commend($commend,$id_users,$id_posts ){
$qry= " insert into commends(commend,id_users,id_posts)
values('$commend','$id_users','$id_posts')";
require_once('config.php');
$cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
$rslt = mysqli_query($cn, $qry);
mysqli_close($cn);
return $rslt;

}
public function get_post_comment($id_posts){
   $qry = "SELECT* FROM commends join users on commends.id_users = users.id WHERE id_posts ='$id_posts' ORDER BY commends.CREATED_AT DESC";
   require_once('config.php');
   $cn =Mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
   $rslt = mysqli_query($cn,$qry);
   $data =mysqli_fetch_all($rslt,MYSQLI_ASSOC);
   MYSQLI_CLOSE($cn);
return $data;
}


// public function my_posts(){
//    $qry = " SELECT* from posts ORDER BY create_at DESC  limit 5";
//    require_once('config.php');
//    $cn =Mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
//    $rslt = mysqli_query($cn,$qry);
//    $data =mysqli_fetch_all($rslt,MYSQLI_ASSOC);
//    MYSQLI_CLOSE($cn);
//    return $data;
//    }
public function my_posts($id_user){
   $qry = " SELECT * FROM posts WHERE id_user = $id_user ORDER BY create_at DESC LIMIT 5";
   require_once('config.php');
   $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
   $rslt = mysqli_query($cn, $qry);
   $data = mysqli_fetch_all($rslt, MYSQLI_ASSOC);
   mysqli_close($cn);
   return $data;
}

public function home_posts($id_user){
   $qry = " SELECT * FROM posts WHERE id_user = $id_user ORDER BY create_at DESC LIMIT 5";

   require_once('config.php');
   $cn =Mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
   $rslt = mysqli_query($cn,$qry);
   $data =mysqli_fetch_all($rslt,MYSQLI_ASSOC);
   MYSQLI_CLOSE($cn);
   return $data;
   }
   public function update_profile_pic($imagepath,$id_user){
      $qry="UPDATE USERS SET image ='$imagepath' where id ='$id_user'";
      require_once('config.php');
      $cn =Mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
      $rslt = mysqli_query($cn,$qry);
      MYSQLI_CLOSE($cn);
      return $rslt;
      }


  
}




class admin extends user
{
   public $role = "admin";
}
?>
