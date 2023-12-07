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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CANI</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="./css/all.css">


    <!-- --------- Owl-Carousel ------------------->
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">

    <!-- ------------ AOS Library ------------------------- -->
    <link rel="stylesheet" href="./css/aos.css">

    <!-- Custom Style   -->
    <link rel="stylesheet" href="./css/Style.css">

</head>

<body>

    <!-- ----------------------------  Navigation ---------------------------------------------- -->

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
            <div class="social text-gray" style = "margin-bottom: 10px;">
                <?php echo $_SESSION['first'] ?>
                <button class="btn" style="padding: 13px 16px; margin-bottom: 5px; border-radius: 5px;">
                    <a href="./includes/logout.php">Log out</a>
                </button>
            </div>
        </div>
    </nav>

    <!-- ------------x---------------  Navigation --------------------------x------------------- -->

    <!----------------------------- Main Site Section ------------------------------>

    <main>

        <!------------------------ Site Title ---------------------->


        <!------------x----------- Site Title ----------x----------->

        <!-- --------------------- Blog Carousel ----------------- -->

        <section>
            <div class="blog">
                <div class="container">
                    <h2 style="text-align: center; color: #3f4954; margin-top: 40px;">Todays Categories</h2>
                    <div class="owl-carousel owl-theme blog-post">
                        <!-- <div class="blog-content" data-aos="fade-right" data-aos-delay="200">
                            <img src="./assets/Blog-post/post-1.jpg" alt="post-1">
                            <div class="blog-title">
                                <h3>London Fashion week's continued the evolution</h3>
                                <button class="btn btn-blog">Fashion</button>
                                <span>2 minutes</span>
                            </div>
                        </div>
                        <div class="blog-content" data-aos="fade-in" data-aos-delay="200">
                            <img src="./assets/Blog-post/post-3.jpg" alt="post-1">
                            <div class="blog-title">
                                <h3>London Fashion week's continued the evolution</h3>
                                <button class="btn btn-blog">Fashion</button>
                                <span>2 minutes</span>
                            </div>
                        </div>
                        <div class="blog-content" data-aos="fade-left" data-aos-delay="200">
                            <img src="./assets/Blog-post/post-2.jpg" alt="post-1">
                            <div class="blog-title">
                                <h3>London Fashion week's continued the evolution</h3>
                                <button class="btn btn-blog">Fashion</button>
                                <span>2 minutes</span>
                            </div>
                        </div>
                        <div class="blog-content" data-aos="fade-right" data-aos-delay="200">
                            <img src="./assets/Blog-post/post-5.png" alt="post-1">
                            <div class="blog-title">
                                <h3>London Fashion week's continued the evolution</h3>
                                <button class="btn btn-blog">Fashion</button>
                                <span>2 minutes</span>
                            </div>
                        </div> -->
                        <?php
                        $all_topic = mysqli_query($conn,"SELECT * FROM topic ORDER BY id LIMIT 10 ");
                        $topic_num = mysqli_num_rows($all_topic);
                        while ($topic = mysqli_fetch_array($all_topic)){
                            echo "
                            <div class='blog-content' data-aos-delay='200'>
                                <div class='blog-title'>  
                                        <h3>{$topic['topic']}</h3>
                                        <button class='btn btn-blog'><a href='list.php?id={$topic['id']}'>Explore</a> </button>
                                </div>
                            </div>";
                        }
                        ?>
                    </div>
                    <div class="owl-navigation">
                        <span class="owl-nav-prev"><i class="fas fa-long-arrow-alt-left"></i></span>
                        <span class="owl-nav-next"><i class="fas fa-long-arrow-alt-right"></i></span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ----------x---------- Blog Carousel --------x-------- -->

        <!-- ---------------------- Site Content -------------------------->

        <section class="container">
            <div class="site-content">
                <div class="posts">
                    <!-- <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                        <div class="post-image">
                            <div>
                                <img src="./assets/Blog-post/blog1.png" class="img" alt="blog1">
                            </div>
                            <div class="post-info flex-row">
                                <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span>
                                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;January 14, 2019</span>
                                <span>2 Commets</span>
                            </div>
                        </div>
                        <div class="post-title">
                            <a href="#">Why should boys have all the fun? it's the women who are making india an
                                alcohol-loving contry</a>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque voluptas deserunt beatae
                                adipisci iusto totam placeat corrupti ipsum, tempora magnam incidunt aperiam tenetur a
                                nobis, voluptate, numquam architecto fugit. Eligendi quidem ipsam ducimus minus magni
                                illum similique veniam tempore unde?
                            </p>
                            <button class="btn post-btn">Read More &nbsp; <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                    <hr>
                    <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                        <div class="post-image">
                            <div>
                                <img src="./assets/Blog-post/blog2.png" class="img" alt="blog1">
                            </div>
                            <div class="post-info flex-row">
                                <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span>
                                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;January 16, 2019</span>
                                <span>7 Commets</span>
                            </div>
                        </div>
                        <div class="post-title">
                            <a href="#">Why should boys have all the fun? it's the women who are making india an
                                alcohol-loving contry</a>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque voluptas deserunt beatae
                                adipisci iusto totam placeat corrupti ipsum, tempora magnam incidunt aperiam tenetur a
                                nobis, voluptate, numquam architecto fugit. Eligendi quidem ipsam ducimus minus magni
                                illum similique veniam tempore unde?
                            </p>
                            <button class="btn post-btn">Read More &nbsp; <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                    <hr>
                    <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                        <div class="post-image">
                            <div>
                                <img src="./assets/Blog-post/blog3.png" class="img" alt="blog1">
                            </div>
                            <div class="post-info flex-row">
                                <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span>
                                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;January 19, 2019</span>
                                <span>5 Commets</span>
                            </div>
                        </div>
                        <div class="post-title">
                            <a href="#">New data recording system to better analyse road accidents</a>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque voluptas deserunt beatae
                                adipisci iusto totam placeat corrupti ipsum, tempora magnam incidunt aperiam tenetur a
                                nobis, voluptate, numquam architecto fugit. Eligendi quidem ipsam ducimus minus magni
                                illum similique veniam tempore unde?
                            </p>
                            <button class="btn post-btn">Read More &nbsp; <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                    <hr>
                    <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                        <div class="post-image">
                            <div>
                                <img src="./assets/Blog-post/blog4.png" class="img" alt="blog1">
                            </div>
                            <div class="post-info flex-row">
                                <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span>
                                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;January 21, 2019</span>
                                <span>12 Commets</span>
                            </div>
                        </div>
                        <div class="post-title">
                            <a href="#">New data recording system to better analyse road accidents</a>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque voluptas deserunt beatae
                                adipisci iusto totam placeat corrupti ipsum, tempora magnam incidunt aperiam tenetur a
                                nobis, voluptate, numquam architecto fugit. Eligendi quidem ipsam ducimus minus magni
                                illum similique veniam tempore unde?
                            </p>
                            <button class="btn post-btn">Read More &nbsp; <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div> -->
                    <?php
                    $all_topic = mysqli_query($conn,"SELECT * FROM user_post ORDER BY likes DESC ");
                    $topic_num = mysqli_num_rows($all_topic);
                    while ($topic = mysqli_fetch_array($all_topic)){
                        echo "
                        <div class='post-content' data-aos='zoom-in' data-aos-delay='200'>
                            <div class='post-image'>
                                <div>
                                    <img src='./img/{$topic['post_image']}' class='img' alt='blog1' height='550px'>
                                </div>
                                <div class='post-info flex-row'>
                                    <span><i class='fas fa-heart text-gray'></i>&nbsp;&nbsp;{$topic['likes']} likes</span>
                                    <span><i class='fas fa-calendar-alt text-gray'></i>&nbsp;&nbsp;{$topic['post_date']}</span>
                                </div>
                            </div>
                            <div class='post-title'>
                                <a href='#'>{$topic['post_title']}</a>
                                <p>{$topic['post_content']}
                                </p>
                                <button class='btn post-btn'><a href='single.php?post-id={$topic['id']}'>Read More</a> &nbsp; 
                                <i class='fas fa-arrow-right'></i></button>
                            </div>
                        </div>
                        ";
                    }
                    ?>
                <!-- <aside class="sidebar">
                    <div class="category">
                        <h2>Popular Category</h2>
                        <ul class="category-list">
                            <!-- <li class="list-items" data-aos="fade-left" data-aos-delay="100">
                                <a href="#">Software</a>
                                <span>(05)</span>
                            </li>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="200">
                                <a href="#">Techonlogy</a>
                                <span>(02)</span>
                            </li>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="300">
                                <a href="#">Lifestyle</a>
                                <span>(07)</span>
                            </li>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="400">
                                <a href="#">Shopping</a>
                                <span>(01)</span>
                            </li>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="500">
                                <a href="#">Food</a>
                                <span>(08)</span>
                            </li> -->
                            <?php
                            $all_topic = mysqli_query($conn,"SELECT * FROM topic ORDER BY id ");
                            $topic_num = mysqli_num_rows($all_topic);
                            while ($topic = mysqli_fetch_array($all_topic)){
                                echo "
                                <li class = 'list-items' data-aos = 'fade-left' data-aos-delay = '400'>
                                    <a href = '#'>{$topic['topic']}</a>
                                </li>";
                            }
                            ?>
                        </ul>
                    </div>
                </aside> 
            </div>
        </section>
        <div class="blog">
                    <div class="container">
                        <h2 style="text-align: center; color: #3f4954; margin-top: 40px;">All Categories</h2>
                        <div class="owl-carousel owl-theme blog-post">
                            <!-- <div class="blog-content" data-aos="fade-right" data-aos-delay="200">
                                <img src="./assets/Blog-post/post-1.jpg" alt="post-1">
                                <div class="blog-title">
                                    <h3>London Fashion week's continued the evolution</h3>
                                    <button class="btn btn-blog">Fashion</button>
                                    <span>2 minutes</span>
                                </div>
                            </div>
                            <div class="blog-content" data-aos="fade-in" data-aos-delay="200">
                                <img src="./assets/Blog-post/post-3.jpg" alt="post-1">
                                <div class="blog-title">
                                    <h3>London Fashion week's continued the evolution</h3>
                                    <button class="btn btn-blog">Fashion</button>
                                    <span>2 minutes</span>
                                </div>
                            </div>
                            <div class="blog-content" data-aos="fade-left" data-aos-delay="200">
                                <img src="./assets/Blog-post/post-2.jpg" alt="post-1">
                                <div class="blog-title">
                                    <h3>London Fashion week's continued the evolution</h3>
                                    <button class="btn btn-blog">Fashion</button>
                                    <span>2 minutes</span>
                                </div>
                            </div>
                            <div class="blog-content" data-aos="fade-right" data-aos-delay="200">
                                <img src="./assets/Blog-post/post-5.png" alt="post-1">
                                <div class="blog-title">
                                    <h3>London Fashion week's continued the evolution</h3>
                                    <button class="btn btn-blog">Fashion</button>
                                    <span>2 minutes</span>
                                </div>
                            </div> -->
                            <?php
                            $all_topic = mysqli_query($conn,"SELECT * FROM topic ORDER BY topic ");
                            $topic_num = mysqli_num_rows($all_topic);
                            while ($topic = mysqli_fetch_array($all_topic)){
                                echo "
                                <div class='blog-content' data-aos-delay='200'>
                                    <div class='blog-title'>  
                                            <h3>{$topic['topic']}</h3>
                                            <button class='btn btn-blog'><a href='list.php?id={$topic['id']}'>Explore</a> </button>
                                    </div>
                                </div>";
                            }
                            ?>
                        </div>
                        <div class="owl-navigation">
                            <span class="owl-nav-prev"><i class="fas fa-long-arrow-alt-left"></i></span>
                            <span class="owl-nav-next"><i class="fas fa-long-arrow-alt-right"></i></span>
                        </div>
                    </div>
                </div>

        <!-- -----------x---------- Site Content -------------x------------>

    </main>

    <!---------------x------------- Main Site Section ---------------x-------------->


    <!-- --------------------------- Footer ---------------------------------------- -->

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
    <!-- -------------x------------- Footer --------------------x------------------- -->

    <!-- Jquery Library file -->
    <script src="./js/Jquery3.4.1.min.js"></script>

    <!-- --------- Owl-Carousel js ------------------->
    <script src="./js/owl.carousel.min.js"></script>

    <!-- ------------ AOS js Library  ------------------------- -->
    <script src="./js/aos.js"></script>

    <!-- Custom Javascript file -->
    <script src="./js/main.js"></script>
</body>

</html>