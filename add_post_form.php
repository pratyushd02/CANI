
<?php
session_start();
include('./includes/db.php');
if(!isset($_SESSION['first'])){
	header('location: ./login.php');
}
$id = $_GET["id"];
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
        <h2 style="margin-top:5%; margin-left:1%" >Add a new Post</h2>
        <div class="blog-input pt-5">
            <form action="./includes/add_post.php" method="post" class="form-inline" enctype="multipart/form-data" style="margin-left:3%;">
                <div class="float-start justify-content-center ms-auto">
                <div class="form-group">
                        <label for="postTitle">Post title</label> <br>
                        <input type="text" style="color:white;" name="title" id="title"  class="form-control bg-dark" placeholder="Enter title" >
                    </div>
                    <div class="form-group">
                        <label for="inlinetextai" style="font-size: 20px; font-weight: 400; margin-bottom: 10px;">AI
                            used to generate
                            <span style="color: #0d6efd; font-size: 22px; font-weight: 500;">Text</span></label>
                        <input type="text" style="color:white;" name="toolcontent" id="toolcontent" class="form-control bg-dark" placeholder="Enter AI">
                    </div>
                    <div class="form-group">
                        <label for="inlineimageai" style="font-size: 20px; font-weight: 400; margin-bottom: 10px;">AI
                            used to generate
                            <span style="color: #0d6efd; font-size: 22px; font-weight: 500;">Image</span></label>
                        <input type="text" style="color:white;" name="toolimage" id="toolimage" class="form-control bg-dark" placeholder="Enter AI">
                    </div>
                    <div class="form-group">
                        <label for="ptext" style="font-size: 20px; font-weight: 400; margin-bottom: 10px;">Prompt used
                            to generate <span
                                style="color: #E966A0; font-size: 22px; font-weight: 500;">Text</span></label>
                        <input type="text" name="contentprompt" id="contentprompt" class="form-control bg-dark ta" 
                            placeholder="Enter Promt for text">
                    </div>
                    <div class="form-group">
                        <label for="itext" style="font-size: 20px; font-weight: 400; margin-bottom: 10px;">Prompt used
                            to generate <span
                                style="color: #E966A0; font-size: 22px; font-weight: 500;">Image</span></label>
                        <input type="text" class="form-control bg-dark ta" name="imageprompt" id="imageprompt" 
                            placeholder="Enter Promt for image" style="width: 450px;">
                    </div>
                    <div class="form-group">
                        <label for="post-desc" style="font-size: 20px; font-weight: 400; margin-bottom: 10px;">Post Description</label>
                        <textarea name="postcont" id="post-desc" cols="30" rows="10" style="width: 100%"
                            placeholder="Enter post Description"></textarea>
                </div>
                
                
                <div class="float-end justify-content-center">
                    <div class="file-drop-area">
                    <label for="post-desc" style="font-size: 20px; font-weight: 400; margin-bottom: 10px;">Upload Image</label>
                        <input type="file" id="post-img" style="width: 100%" name="post_ima" />
                        <!-- <input class="file-input" type="file" name="post_ima" id="post-img" accept="image/png, image/jpg, image/jpeg">
                        <script>$(document).on('change', '.file-input', function () {


                                var filesCount = $(this)[0].files.length;

                                var textbox = $(this).prev();

                                if (filesCount === 1) {
                                    var fileName = $(this).val().split('\\').pop();
                                    textbox.text(fileName);
                                } else {
                                    textbox.text(filesCount + ' files selected');
                                }
                            });</script> -->
                    </div>
                    <input type="hidden" value=<?php $id ?> id="topic" name="topic" >
                <input type="submit" class="btn btn-primary">
                </div>
                </div>
            </form>
        </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<!-- <div class="form-area flex align-items-center justify-content-center" style="height: 100vh;">
                <form action="./includes/add_post.php" method="POST" enctype="multipart/form-data">
                    <p>Create a new post your</p>
                    <div class="input-box">
                        <label for="postTitle">Post title</label> <br>
                        <input type="text" name="title" id="title" placeholder="Enter title" style="width: 100%">
                    </div>
                    <div class="input-box">
                        <label for="post-desc">Post Description</label>
                        <textarea name="postcont" id="post-desc" cols="30" rows="10" style="width: 100%"
                            placeholder="Enter post Description"></textarea>
                    </div>
                    <div class="input-box">
                        <label for="post-img">Post image</label>
                        <input type="file" id="post-img" style="width: 100%" name="post_ima" />
                    </div>
                    <div class="input-box">
                        <label for="postpromptcontent">Prompt for Content</label>
                        <input type="text" name="contentprompt" id="contentprompt" placeholder="Enter prompt for content"
                            style="width: 100%">
                    </div>
                    <div class="input-box">
                        <label for="postpromptimage">Prompt for Image</label>
                        <input type="text" name="imageprompt" id="imageprompt" placeholder="Enter prompt for image"
                            style="width: 100%">
                    </div>
                    <div class="input-box">
                        <label for="aiToolContent">AI Tool for content</label>
                        <input type="text" name="toolcontent" id="toolcontent" placeholder="Enter Tool used to generate content"
                            style="width: 100%">
                    </div>
                    <div class="input-box">
                        <label for="aiToolImage">AI Tool for Image</label>
                        <input type="text" name="toolimage" id="toolimage" placeholder="Enter Tool used to generate image"
                            style="width: 100%">
                    </div>
                    <input type="hidden" value=<?php //$id ?> id="topic" name="topic" >
                    <div class=" flex justify-content-space-between">
                        <input class="primary_btn" type="submit" value="Add new post" />
                        <button class="primary_btn" type="reset">&circlearrowright;</button>
                    </div>
                </form>
            </div> -->