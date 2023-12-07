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
    <link rel="stylesheet" href="../css/all.css">


    <!-- --------- Owl-Carousel ------------------->
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">

    <!-- ------------ AOS Library ------------------------- -->
    <link rel="stylesheet" href="../css/aos.css">

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
            <div class="social text-gray" style="margin-bottom: 10px;">
                <?php echo $_SESSION['first'] ?>
                <button class="btn" style="padding: 13px 16px; margin-bottom: 10px; border-radius: 5px;">
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
                    <h2 style="text-align: center; color: #3f4954; margin-top: 40px;">All Categories</h2>
                    <div class="owl-carousel owl-theme blog-post">


                        <?php
                    $all_topic = mysqli_query($conn,"SELECT * FROM topic ORDER BY id ");
                    $topic_num = mysqli_num_rows($all_topic);
                    while ($topic = mysqli_fetch_array($all_topic)){
                        echo "
                        <div class='blog-content' data-aos='fade-right' data-aos-delay='200'>
                        <div class='blog-title'>  
                                <h3>{$topic['topic']}</h3>
                                <button class='btn btn-blog'><a href='list.php?id={$topic['id']}'>Explore</a> </button>
                        </div>
                        </div>";
                    }
                    ?>


                    </div>
                </div>
        </section>

        <!-- ----------x---------- Blog Carousel --------x-------- -->



    </main>

    <!---------------x------------- Main Site Section ---------------x-------------->


    <!-- --------------------------- Footer ---------------------------------------- -->

    <footer class="footer" style="margin-top: 5%;">
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