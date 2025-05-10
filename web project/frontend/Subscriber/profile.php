<?php

require_once('header.php');
$user = unserialize($_SESSION["user"]);
$myposts = $user->my_posts($user->id);

// var_dump($myposts);
// var_dump($user);
?>

<div class="container">
    <div class="row">
        <div class="col">
            <section class="w-100% px-4 py-5" style="background-color: #9de2ff; border-radius: .5rem .5rem 0 0;">
                <div class="row d-flex justify-content-center">
                    <div class="col col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">

                            <div class="card-body p-4">
                                <div class="d-flex">

                                    <div class="card mb-8 mb-x2-1-0">
                                        <div class="card-header">profile pictrure</div>
                                        <div class="card-body text-center">

                                            <?php
                                            if (isset($_GET["msg"]) && $_GET["msg"] == 'uius') {
                                            ?>

                                                <div class="alert alert-success" role="alert">
                                                    <strong> Done </strong> User Image Updated Successfully
                                                </div>
                                            <?php
                                            }
                                            ?>

                                            <img class="img-account-profile rounded-circle mb-2"
                                                style="width :100px; height: 100px; border-radius: 100px;" src=<?php if (!empty($user->image))
                                                                                                                    echo $user->image;
                                                                                                                else  echo
                                                                                                                'http://bootdey.com/img/content/avatar/avatar1.png'; ?> alt="">

                                            <form action="store_user_image.php" method="post" enctype="multipart/form-data">
                                                <label>Upload new image</label>
                                                <input type="file" name="image" style="width: 100%;">
                                               <button
                                                type="submit"
                                                class="btn btn-primary"
                                               >
                                            sive
                                               </button>
                                               

                                                </form>
                                                
                                        </div>
                                    </div>

                                </div>
                                <img src="https://https://placehold.co/600x400" alt="Generic placeholder image" class="img-fluid"
                                    style="width: 180px; border-radius: 10px;">
                            </div>


                            <div class="flex-grow-1 ms-3">
                                <h5 class="mb-1"><?= $user->name ?><h5>
                                        <p class="mb-2 pb-1"><?= $user->role ?></p>
                                        <div class="d-flex justify-content-start rounded-3 p-2 mb-2 bg-body-tertiary">
                                            <div>
                                                <p class="small text-muted mb-1">Articles</p>
                                                <p class="mb-0">41</p>
                                            </div>
                                            <div class="px-3">
                                                <p class="small text-muted mb-1">Followers</p>
                                                <p class="mb-0">976</p>
                                            </div>
                                            <div>
                                                <p class="small text-muted mb-1">Rating</p>
                                                <p class="mb-0">8.5</p>
                                            </div>
                                        </div>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </section>

    <div class="container">
        <div class="row">


            <div class="col-6 offset-3 bg-info mt-5 rounded-2">
                <h1 class="text-white text-center">SHERE YOUR POST</h1>
            </div>

            <div class="col-6 offset-3 bg-info mt-5 rounded-2 pt-5">
                <?php
                if (isset($_GET["msg"]) && $_GET["msg"] == 'done') {
                ?>

                    <div class="alert alert-success" role="alert">
                        <strong> Done </strong> Post Added Successfully
                    </div>
                <?php
                }
                ?>
                <?php
                if (isset($_GET["msg"]) && $_GET["msg"] == 'required_fields') {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <strong> required fields </strong> required fields
                    </div>
                <?php
                }
                ?>
                <form action="storepost.php" method="post" enctype="multipart/form-data">

                    <div class="mb-6">
                        <label for="" class="form-label">title</label>
                        <input type="text" name="title" id="" class="form-control" placeholder=""
                            aria-describedby="helpId" />
                        <small id="helpId" class="text-muted">Help text</small>
                    </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">content</label>
                <textarea type="text" name="content" id="" class="form-control" placeholder=""
                    aria-describedby="helpId"></textarea>
                <small id="helpId" class="text-muted">Help text</small>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">image</label>
                <input type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId" />
                <small id="helpId" class="text-muted">Help text</small>
            </div>

            <button type="submit" class="btn btn-primary mt-5">
                submit
            </button>
            </form>

        </div>

    </div>
</div>
</div>
</div>
<?php
foreach ($myposts as  $post) {
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
                        foreach ($Commends as $comment) {
                            echo '<div class="card mb-2">';
                            echo '<div class="card-body">';
                            echo '<p>' . htmlspecialchars($comment["commend"]) . '</p>';
                            echo '<small class="text-muted">' . $comment["created_at"] . '</small><br>';
                            
                            // عرض الصورة والاسم سطر واحد
                            echo '<div class="d-flex align-items-center mt-2">';
                            $image = !empty($comment["image"]) ? $comment["image"] : 'http://bootdey.com/img/content/avatar/avatar1.png';
                            echo '<img src="' . $image . '" class="rounded-circle" style="width: 30px; height: 30px;">';
                            echo '<span class="ms-2 text-primary">' . htmlspecialchars($comment["name"]) . '</span>';
                            echo '</div>';
                        
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






<!-- <div class="col-8 offset-2 bg-info mt-5 rounded-2 ">
        <div class="card">
            <img class="card-img-top" src="1.JPG" alt="Title" />
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>
            </div>
        </div>

    </div> -->




<?php
require_once('footer.php');

?>