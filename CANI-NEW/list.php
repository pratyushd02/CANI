<?php
session_start();
include('./includes/db.php');
if(!isset($_SESSION['first'])){
    header('location: ./login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- --------- Bootstrap CDN ------------------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/list.css">
    <link rel="stylesheet" href="./css/nav.css">
    <title>CANI-HOME</title>
</head>

<body>
    <nav class="nav">
        <div class="nav-menu flex-row">
            <div class="nav-brand">
                <a href="#" class="text-gray">CANI</a>
            </div>
            <div class="toggle-collapse">
                <div class="toggle-icons">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
            <div>
                <ul class="nav-items">
                    <li class="nav-link">
                        <a href="#">Home</a>
                    </li>
                    <li class="nav-link">
                        <a href="#">Category</a>
                    </li>
                    <li class="nav-link">
                        <a href="#">About</a>
                    </li>
                    <li class="nav-link">
                        <a href="#">Contact US</a>
                    </li>
                </ul>
            </div>
            <div class="social text-gray" style="margin-bottom: 10px;">
                <?php echo $_SESSION['first'] ?>
                <button class="btn" style="padding: 13px 16px; margin-bottom: 5px; border-radius: 5px;">
                    <a href="./includes/logout.php">Log out</a>
                </button>
            </div>
        </div>
    </nav>
    <section class="top-1" style=" margin-top: 5%;">
        <div class="container">
            <?php
            $all_post = mysqli_query($conn,"SELECT * FROM user_post ORDER BY likes DESC LIMIT 1");
            $post_num = mysqli_num_rows($all_post);
            while ($post = mysqli_fetch_array($all_post)):
       ?>
            <div class="top1-2">
                <div class="float-start" style="width: 50%;">
                    <img src="./img/<?php echo $post['post_image'] ?>" alt="<?php echo $post['post_title'] ?>"
                        class="blog1" style="width: 530px; border-radius: 30px;">
                </div>
                <div class="float-end" style="width: 50%;">
                    <h1>
                        <?php echo $post['post_title'] ?>
                    </h1>
                    <p>
                        <?php echo $post['post_content'] ?>
                    </p>
                    <button class="top-1-btn"> continue reading
                    </button>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </section>
    <section class="blogs">
        <?php
        $all_topic = mysqli_query($conn, "SELECT * FROM topic ORDER BY id");
        $topic_num = mysqli_num_rows($all_topic);
        if($topic_num > 0){
            while ($topic = mysqli_fetch_array($all_topic)){
                if($topic["id"] == $_GET["id"]){
                    $_SESSION["topic"] = $topic["topic"];
                    echo $topic["topic"],"<br><br><br>";
                }
            }
        } 
        $id = $_GET["id"];
        $all_post = mysqli_query($conn,"SELECT * FROM user_post WHERE topic_id=$id ORDER BY id DESC LIMIT 3 ");
            $post_num = mysqli_num_rows($all_post);
            if($post_num > 0):
            echo  '<div class="container">';
            echo  '<div class="row">';
            while ($post = mysqli_fetch_array($all_post)):
                $post_id = $post['id'];
        ?>
        <div class="col-4 col-12 col-sm-6 col-md-6 col-lg-4 bcard">
            <div class="img_wrap">
                <?php if($post['post_image']): ?>
                <img class="card-img-top" src="./img/<?php echo $post['post_image'] ?>"
                    alt="<?php echo $post['post_title'] ?>">
                <?php else: ?>
                <img src="./img/code-blog.png" alt="Code Blog">
                <?php endif; ?>
                <p class="img__description">
                    <?php echo $post['post_title'] ?> <br>
                    <?php echo $post['likes'] ; ?> Likes
                    <?php $comments_count = mysqli_query($conn,"SELECT COUNT(id) FROM user_comment  WHERE comment_post_id='$post_id' "); 
                    $row = $comments_count->fetch_row();
                    echo '('.$row[0].')'; 
                    ?> Comments <br>
                    <a href="single.php?post-id=<?php echo $post_id; ?>" class="btn btn-primary">READ MORE</a>
                </p>
            </div>
        </div>
        <?php endwhile; ?>
        </div>
        </div>
        <?php else: ?>
        <?php include('./template-part/no_post_found.php') ?>
        <?php  endif; ?>
    </section>
    <footer class="footer">
        <div class="container" style="display: flex; align-items: center; text-align: center;">

            <div class="follow" data-aos="fade-left" data-aos-delay="200">
                <h2>Follow us</h2>
                <p>Let's connect!</p>
                <div>
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="move-up">
            <span><i class="fas fa-arrow-circle-up fa-2x"></i></span>
        </div>
    </footer>
</body>

</html>