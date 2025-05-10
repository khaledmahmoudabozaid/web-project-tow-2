<?php
require_once('header.php');
$user = unserialize($_SESSION["user"]);
$myposts = $user->my_posts($user->id);
// var_dump($myposts);

?>

<div class="container">
    <div class="row">
        <div class="col">
            <section class="w-100 px-4 py-5" style="background-color: #9de2ff; border-radius: .5rem .5rem 0 0;">
                <div class="row d-flex justify-content-center">
                    <div class="col col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">

                            <div class="card-body p-4">
                                <div class="d-flex">

                                    <div class="card mb-4 mb-xl-1-0">
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

                                            <!-- <from action="store_user_image.php" method="post" encrtype="multipart/from-data">
                                                <input type="file" name="image" style="width :100%;">Upload new image </input>
                                                <button type="submit" class="btn btn-primary"> Save

                                                </button>

                                                </form> -->
                                            <form action="store_user_image.php" method="post" enctype="multipart/form-data">
                                                <input type="file" name="image" style="width :100%;">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </form>


                                        </div>
                                    </div>

                                </div>
                                <img src="https://placehold.co/600x400" alt="Generic placeholder image" class="img-fluid"
                                    style="width: 180px; border-radius: 10px;">
                            </div>


                            <div class="flex-grow-1 ms-3">
                            <h5 class="mb-1"><?= $user->name ?></h5>

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

                    <div class="mb-3">
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
    <div class="col-8 offset-2 bg-info mt-5 rounded-2 ">
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