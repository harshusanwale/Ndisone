<?php 
include "header.php";

if (isset($_COOKIE['user_id'])) {

    $user_id = $_COOKIE['user_id'];
} else {

    $redirect_url = $webpage_full_link . 'login';  //Redirect Url

    header("Location: $redirect_url");  //Redirect When No Listing Found in Table
    exit();
}

$activation = mysqli_query($conn, "SELECT * FROM " . TBL . "users  WHERE user_id = ".$user_id);

if (mysqli_num_rows($activation) > 0) {

    $activation_row = mysqli_fetch_array($activation);

    if ($verification_link == $activation_row['verification_link']) {

        $user_name = $activation_row['first_name'];
        $mobile_number = $activation_row['mobile_number'];
    } else {

        $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];
        $_SESSION['login_status_msg'] = 1;

        header('Location: login');
        exit();
    }
} else {

    $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];
    $_SESSION['login_status_msg'] = 1;

    header('Location: login');
    exit();
}

?>





<style>
    .templ-acti {
        background: #1a1452;
        /* border: 1px solid #40de4d; */
        padding: 35px 100px;
        margin-top: 40px;
        float: left;
        width: 100%;
        border-radius: 5px;
    }

    .cre-dup-form-show {
        display: block;
    }
</style>
<!-- START -->
<!-- START -->
<!--PRICING DETAILS-->
<section class="<?php if ($footer_row['admin_language'] == 2) {
                    echo "lg-arb";
                } ?> login-reg">
    <div class="container">
        <div class="row">
            <div class="col-md-4 m-auto">
              <div class="congr-box">
         <img src="images/congrate.png" class="congratulation-bar">

         <center><h3> Congratulation!!</h3></center>

         <p> We are offering two years free subscription plan for all Support Workers whether you are working as a Sole Trader or Under the agency </p>
    
    <div class="nex-blo">
  
    <a href='login_participant?login=register'>NEXT</a>      
         
     </div>
</div>
</div>
</div>
    </div>
</section>
<!--END PRICING DETAILS-->

<?php
include "footer.php";
?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript">
    var webpage_full_link = '<?php echo $webpage_full_link; ?>';
</script>
<script type="text/javascript">
    var login_url = '<?php echo $LOGIN_URL; ?>';
</script>
<script src="js/custom.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/custom_validation.js"></script>
</body>

</html>