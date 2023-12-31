<?php
session_start();
include('./includes/db.php');
if(!isset($_SESSION['first'])){
	header('location: ./login.php');
}
include('./template-part/main_header.php') ;
$full_name = $_SESSION['first'].' '.$_SESSION['last'];
$login_user_pic = $_SESSION['image'];
$login_user_email = $_SESSION['email'];
?>
<!---Add post section start--->
<?php if($_SESSION['email'] == "admin@email.com") : ?>
<a href="home.php"><button class="primary_btn add_post_form_open_btn">&plus;</button></a>
<section class="add-post-form-area" >
    <button class="primary_btn add_post_form_close_btn">&cross;</button>
    <div class="main-content">
        <div class="form-area flex align-items-center justify-content-center" style="height: 100vh;">
            
        </div>
    </div>
<?php endif; ?>
</section>
<!---Add post section end--->
<!---profile main section start--->
<section>
    <div class="main-content flex justify-content-center post-area" >
        <?php
            $all_post = mysqli_query($conn,"SELECT * FROM user_post WHERE user_email='$login_user_email' ORDER BY id DESC");
            $post_num = mysqli_num_rows($all_post);
            if($post_num > 0):
            while ($post = mysqli_fetch_array($all_post)):
                $post_id = $post['id'];
            ?>
        <div class="post" style="background-color:pink">
            <div class="autor-info flex" >
                    <?php if($post['user_picture']): ?>
                        <img class="autor-img" src="./img/<?php echo $post['user_picture'] ?>" alt="<?php echo $post['user_name'] ?>">
                    <?php else: ?>
                        <img class="autor-img" src="./img/avatar.png" alt="<?php echo $post['user_name'] ?>">
                    <?php endif; ?>
                <div>
                    <h4 class="author-title"><span class="author-title">
                            <?php echo $post['user_name'] ?>
                        </span></h4>
                    <p>
                        <?php echo $post['post_date'] ?>
                    </p>
                </div>
                <div class="action-buttons flex">
                    <a href="edit-form.php?edit=<?php echo $post_id; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="includes/delete.php?delete=<?php echo $post_id; ?>"><i class="fa-solid fa-trash"></i></a>
                </div>
            </div>
            <?php if($post['post_image']): ?>
                <img src="./img/<?php echo $post['post_image'] ?>" alt="<?php echo $post['post_title'] ?>">
            <?php else: ?>
                <img src="./img/code-blog.png" alt="Code Blog">
            <?php endif; ?>
            <h2 class="title">
                <?php echo $post['post_title'] ?>
            </h2>
            <p class='slice'>
                <?php echo $post['post_content'] ?>
            </p>
            <a href="single.php?post-id=<?php echo $post_id; ?>" class="primary_btn">Read more</a>
            <div class="comment-form flex align-items-center">
                    <?php if($login_user_pic): ?>
                        <img class="autor-img" src="./img/<?php echo $login_user_pic ?>" alt="<?php echo $full_name ?>">
                    <?php else: ?>
                        <img class="autor-img" src="./img/avatar.png" alt="<?php echo $full_name ?>">
                    <?php endif; ?>
                <form class="flex" style="width: 100%"
                    action="includes/comment.php?profile=<?php echo $_SESSION['first']; ?>" method="POST">
                    <input type="text" name="comment" placeholder="Leave a comment" style="width: 100%" required>
                    <input type="hidden" name="comment-postid" value="<?php echo $post_id; ?>" />
                    <button style="margin-left:5px;" class="primary_btn" type="submit"><i
                            class="fa-solid fa-arrow-right-to-bracket"></i></button>
                </form>
            </div>
            <hr />
            <h3 class="title" style="margin: 1rem 0;">Comments -
                    <?php $comments_count = mysqli_query($conn,"SELECT COUNT(id) FROM user_comment  WHERE comment_post_id='$post_id'"); 
                        $row = $comments_count->fetch_row();
                        echo '<span>('.$row[0].')</span>'; 
                    ?>
            </h3>
            <?php
                $all_comment = mysqli_query($conn,"SELECT * FROM user_comment WHERE comment_post_id='$post_id' ORDER BY id DESC");
                $comment_num = mysqli_num_rows($all_comment);
                if($comment_num > 0):
                while ($comm_fetch = mysqli_fetch_array($all_comment) ): ?>
            <div class="comments flex align-items-center">
                    <?php if($comm_fetch['user_pic']): ?>
                        <img class="autor-img" src="./img/<?php echo $comm_fetch['user_pic'] ?>" alt="<?php echo $comm_fetch['user_name'] ?>">
                    <?php else: ?>
                        <img class="autor-img" src="./img/avatar.png" alt="<?php echo $comm_fetch['user_name'] ?>">
                    <?php endif; ?>
                <div>
                    <h5 class="title"><span>
                            <?php echo $comm_fetch['user_name']; ?>
                        </span></h5>
                    <p>
                        <?php echo $comm_fetch['comment']; ?>
                    </p>
                </div>
            </div>
            <?php endwhile; ?>
            <?php else: ?>
            <div class="comments flex align-items-center justify-content-center">
                <h5 class="title">No comments have been posted yet</h5>
            </div>
            <?php endif; ?>
        </div>
        <?php endwhile; ?>
        <?php else: ?>
        <?php include('./template-part/no_post_found_profile.php') ?>
        <?php  endif; ?>
    </div>
</section>
<!---profile main section end--->
<?php include('./template-part/footer.php') ?>