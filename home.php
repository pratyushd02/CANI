
<?php
session_start();
include('./includes/db.php');
if(!isset($_SESSION['first'])){
	header('location: ./login.php');
}
include('./template-part/main_header.php') ;
$full_name = $_SESSION['first'].' '.$_SESSION['last'];
$login_user_pic = $_SESSION['image'];

if( isset( $_POST['delete'] ) ) {

    $did = $_POST['id'];
    $query="Delete From topic where id=$did";  
    mysqli_query($conn,$query);
    }
    
?>


  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">
<section style="background-color: #151515;
    font-family: 'Montserrat', sans-serif;
    color: #e5e5e2; height:100%; height:100vh;">
    <div class="main-content flex justify-content-center post-area">
        
        <?php
            $all_topic = mysqli_query($conn,"SELECT * FROM topic ORDER BY id ");
            $topic_num = mysqli_num_rows($all_topic);
            if($topic_num > 0 && $_SESSION['email'] == "admin@email.com"){
            
            while ($topic = mysqli_fetch_array($all_topic)){
                echo "
                <div class='col-lg-3 col-md-4 col-sm-12 col-xs-12' style='width:50%;' >
                <div class='card bg-dark'>   
                    <div class='card-body'>  
                        <h6 class='card-content'>  {$topic['topic']} 
                        <a href='list.php?id={$topic['id']}' class='btn btn-primary' style='float: right;'>Explore</a> 
                    </h6>
                    </div>
                    <form method='POST'>
                    <input type=hidden name=id value=".$topic['id']." >
                    <input type=submit value=Delete name=delete style='color:black'>
                    </form>
                </div>
                </div>";
            }
            
            }
            elseif($topic_num > 0 && $_SESSION['email'] != "admin@email.com"){
                while ($topic = mysqli_fetch_array($all_topic)){
                    echo "
                    <div class='col-lg-3 col-md-4 col-sm-12 col-xs-12' style='width:50%;' >
                    <div class='card bg-dark'>   
                        <div class='card-body'>  
                            <h6 class='card-content'>  {$topic['topic']} 
                            <a href='list.php?id={$topic['id']}' class='btn btn-primary' style='float: right;'>Explore</a> 
                        </h6>
                        </div>
                    </div>
                    </div>";
                }
            }
            ?>
    </div>
    <?php if($_SESSION['email'] == "admin@email.com") : ?>
            <?php  echo " <span style='float:right; margin-right:5%;' class='btn btn-warning'> <a style='text-decoration:none;' href='upload_topic.php'> Upload </a> <span>"; ?>
        <?php endif; ?>
</section>



<!---Home main section end--->
<?php include('./template-part/footer.php') ?>
