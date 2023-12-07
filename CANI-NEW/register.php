<?php 
session_start();
if(isset($_SESSION['first'])){
	header('location: ./Index.php');
}
include('./template-part/head_login.php') ?>
<!---form section start--->
<!---form area start--->
<section class="main-content">
    <div>
        <img src="assets/5396346.jpg" alt="" class="float-start">
    </div>
    <div class="container">
        <div class="login float-end">
            <h2 class="title" style="color: #e5e5e2;">Create a New Account!</h2>
            <div class="login-form">
                <form action="includes/log_in.php" method="POST">
                    <div class="mb-3">
                        <input type="text" name="username" class="form-control bg-dark" id="exampleUserName"
                            aria-describedby="emailHelp" placeholder="Enter Full Name"
                            style="margin-top: 20px; color: #e5e5e2;">
                    </div>
                    <div class="mb-3">
                        <input type="email" name="user-email" class="form-control bg-dark" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter e-mail"
                            style="margin-top: 20px; color: #e5e5e2;">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="user-password" class="form-control bg-dark" id="exampleInputPassword1"
                            placeholder="Password" style="margin-top: 20px; color: #e5e5e2;">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="user-password" class="form-control bg-dark" id="confirm Password"
                            placeholder="Confirm Password" style="margin-top: 20px; color: #e5e5e2;">
                    </div>
                    <p class="subtext" style="color: #e5e5e2;">Already have an account? <span style="color: #0d6efd; text-decoration: underline;"><a href="login.php">Login Now</a></span></p>
                    <button type="submit" class="btn" style="margin-top: 20px;" value="Log in">Register</button><br>
                    <!-- <a href="home.php"><button type="button" class="btn1 btn-outline-secondary">Back To Home</button></a> -->
                </form>
            </div>
        </div>
    </div>
</section>
<!-- <section class="main-content">
    <div class="form-area flex align-items-center justify-content-center">
        <form action="includes/log_in.php" method="POST"  style=" background-color:pink ; font-size:20px">
            <h2 class="">Login your account</h2>
            <div class="input-box" >
                <label for="email_address">Enter e-mail address <span>*</span></label>
                <input type="email" name="user-email" id="email_address" placeholder="Enter your e-mail"
                        style="width: 100%" required />
            </div>
            <div class="input-box">
                <label for="password">Enter Your password <span>*</span></label>
                <input name="user-password" type="password" placeholder="New password" id="password" style="width: 100%"
                        required />
            </div>
            <a href="getemail.php" style="font-size:18px">Forgot Password</a>
            <div class=" flex justify-content-space-between">
                <input class="primary_btn" type="submit" value="Log in" />
                <button class="primary_btn" type="reset">&circlearrowright;</button>
            </div>
        </form>
        
    </div>
</section> -->
<!---form area end--->
<!---form section end--->
