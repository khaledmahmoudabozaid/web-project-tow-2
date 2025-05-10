<?php 
// session_start();

require_once('header.php');
require_once("../../classes.php");
$user=unserialize($_SESSION["user"]);
$homeposts = $user->home_posts($user->id);


// $homeposts = $user->home_posts();
// var_dump($homeposts);
?>

  <main>

    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light"> welcame of user<br><?=$user->name?></h1>
          <p class="lead text-body-secondary">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
          <p>
            <a href="#" class="btn btn-primary my-2"></a>
            <a href="#" class="btn btn-secondary my-2"></a>
          </p>
        </div>
      </div>
    </section>



        <!-- <div class="row">

          <div class="col-8 offset-2">
            <div class="card my-5">
              
              <img class="card-img-top" src="holder.js/100x180/" alt="Title" />
              <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p> -->
            <div class="card my-5">
            <?php
foreach ($homeposts as $post) {
?>
    <div class="col-4 offset-4 bg-info mt-5 rounded-2 ">
        <div class="card">
            <?php
            if (!empty($post["image"])) {
            ?>

                <img class="card-img-top" src="<?= $post["image"] ?>" alt="Title" />
            <?php

                # code...
            }
            ?>
            <div class="card-body">
                <h4 class="card-title"><?= $post["title"] ?></h4>
                <p class="card-text"><?= $post["content"] ?></p>
                
            </div>
          <div class="row d-flex justify-content-center">
            <div class="col">
                <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                    <div class="card-body p-4">

                        <form action="store_comment.php" method="post"> 

                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="text" id="addANote" name="commend" class="form-control" placeholder="Type commend..." />
                            <input type ="hidden" name="post_id" value="<?=  $post["id"] ?>" >  
                            <button type="submit"class="btn btn-primary mt-2 ms-2 ">+ Add a note</button>
                        </div>
                        </form>
                        <?php 
                        $Commends = $user->get_post_comment($post["id"]);
                        // foreach ($Commends as $comment) {
                        //     echo '<div class="card mb-2">';
                        //     echo '<div class="card-body">';
                        //     echo '<p>' . htmlspecialchars($comment["commend"]) . '</p>';
                        //     echo '<small class="text-muted">' . $comment["created_at"] . '</small>';
                        //     echo '</div>';
                        //     echo '</div>';
                        // }
                        // foreach ($Commends as $comment) {
                        //     echo '<div class="card mb-2">';
                        //     echo '<div class="card-body">';
                        //     echo '<p>' . htmlspecialchars($comment["commend"]) . '</p>';
                        //     echo '<small class="text-muted">' . $comment["created_at"] . '</small><br>';
                        //     echo '<small class="text-primary">By: ' . htmlspecialchars($comment["name"]) . '</small>';
                        //     echo '</div>';
                        //     echo '</div>';
                        // }
                        // foreach ($Commends as $comment) {
                        //     echo '<div class="card mb-2">';
                        //     echo '<div class="card-body">';
                        //     echo '<p>' . htmlspecialchars($comment["commend"]) . '</p>';
                        //     echo '<small class="text-muted">' . $comment["created_at"] . '</small><br>';
                            
                        //     // عرض الصورة والاسم سطر واحد
                        //     echo '<div class="d-flex align-items-center mt-2">';
                        //     $image = !empty($comment["image"]) ? $comment["image"] : 'http://bootdey.com/img/content/avatar/avatar1.png';
                        //     echo '<img src="' . $image . '" class="rounded-circle" style="width: 30px; height: 30px;">';
                        //     echo '<span class="ms-2 text-primary">' . htmlspecialchars($comment["name"]) . '</span>';
                        //     echo '</div>';
                        
                        //     echo '</div>';
                        //     echo '</div>';
                        // }
                        foreach ($Commends as $comment) {
                          echo '<div class="card mb-3 shadow-sm">';
                          echo '<div class="card-body">';
                      
                          // الصورة + الاسم + التاريخ
                          echo '<div class="d-flex align-items-center mb-3">';
                          $image = !empty($comment["image"]) ? $comment["image"] : 'http://bootdey.com/img/content/avatar/avatar1.png';
                          echo '<img src="' . $image . '" class="rounded-circle shadow" style="width: 40px; height: 40px;">';
                          echo '<div class="ms-3">';
                          echo '<h6 class="mb-0 text-primary fw-bold">' . htmlspecialchars($comment["name"]) . '</h6>';
                          echo '<small class="text-muted">' . $comment["created_at"] . '</small>';
                          echo '</div>';
                          echo '</div>';
                      
                          // نص الكومنت
                          echo '<p class="mb-0">' . htmlspecialchars($comment["commend"]) . '</p>';
                      
                          echo '</div>';
                          echo '</div>';
                      }
                      
                        
                        
                        ?>
                           <!-- <div class="card mb-4">
                            <div class="card-body">
                                <p></p>

                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(4).webp"
                                            alt="avatar" width="25" height="25" />
                                        <p class="small mb-0 ms-2"><?=$comment["name"] ?></p>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <p class="small text-muted mb-0"> </p>
                                        <i class="far fa-thumbs-up mx-2 fa-xs text-body"
                                            style="margin-top: -0.16rem;"></i>
                                        <p class="small text-muted mb-0">3</p>
                                    </div>
                                </div>
                            </div>
                        </div> -->



                        <!-- </from>
                        <?php
                        $Commends =$user->get_post_comment($post["id"]);
                        var_dump($Commends);
                        ?>

                        <div class="card mb-4">
                            <div class="card-body">
                                <p>Type your note, and hit enter to add it</p>

                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(4).webp"
                                            alt="avatar" width="25" height="25" />
                                        <p class="small mb-0 ms-2">Martha</p>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <p class="small text-muted mb-0">Upvote?</p>
                                        <i class="far fa-thumbs-up mx-2 fa-xs text-body"
                                            style="margin-top: -0.16rem;"></i>
                                        <p class="small text-muted mb-0">3</p>
                                    </div>
                                </div>
                            </div>
                        </div> -->


                            <!-- <div class="card-body">
                                <p>Type your note, and hit enter to add it</p>

                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp"
                                            alt="avatar" width="25" height="25" />
                                        <p class="small mb-0 ms-2">Johny</p>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <p class="small text-muted mb-0">Upvote?</p>
                                        <i class="far fa-thumbs-up ms-2 fa-xs text-body"
                                            style="margin-top: -0.16rem;"></i>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



<?php
    // var_dump($post);

}




?>
              
              <img class="card-img-top" src="holder.js/100x180/" alt="Title" />
              <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>

              </div>
            </div>
            <div class="card my-5">
              
              <img class="card-img-top" src="holder.js/100x180/" alt="Title" />
              <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>

     
      </div>
    </div>
    
  </main>
  <?php 
require_once('footer.php')

?>



            

