
<?php
session_start();
include('./includes/db.php');
if(!isset($_SESSION['first'])){
	header('location: ./login.php');
}
?>
<!-- <button class="primary_btn add_post_form_open_btn">&plus;</button> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link rel="stylesheet" href="css/addblog.css">


<?php if($_SESSION['email'] == "admin@email.com") : ?>

    <section class=""  style="overflw-y: scroll;">

        <div class="main-content">
        <div class="container">
        <h2 style="margin-top:5%; margin-left:1%" >Add a new Topic</h2>
        <div class="blog-input pt-5">
            <form action="./includes/upload_topic.php" method="post" class="form-inline" enctype="multipart/form-data" style="margin-left:3%;">
                <div class="float-start justify-content-center ms-auto">
                <div class="form-group">
                        <label for="postTitle">Topic name</label> <br>
                        <input type="text" style="color:white;" name="topic" id="topic"  class="form-control bg-dark" placeholder="Enter topic name" >
                    </div>
                   
                <input type="submit" class="btn btn-primary">
                </div>
                </div>
            </form>
        </div>
            </div>
        </div>
    </section>
<?php endif; ?>

