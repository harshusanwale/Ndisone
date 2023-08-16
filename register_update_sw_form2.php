<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */


if (file_exists('config/info.php')) {
    include('config/info.php');
}

// echo "<pre>";print_r($_POST);die;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['register_sw_form2_submit'])) {

        $user_plan = $_POST["user_plan"];

        $plan_type = "SELECT * FROM " . TBL . "plan_type WHERE plan_type_status='Active' AND plan_type_id = '$user_plan'";

        $rs_plan_type = mysqli_query($conn, $plan_type);
        $plan_type_row = mysqli_fetch_array($rs_plan_type);

        $user_points = $plan_type_row['plan_type_points'];

        $cookie_user_id = "user_id";
        $lastID = $_COOKIE[$cookie_user_id];

        $upqry = "UPDATE " . TBL . "users
					  SET user_plan = '$user_plan', user_points = '$user_points'
					  WHERE user_id = $lastID";
 
        $upres = mysqli_query($conn, $upqry);

        if ($upres) {
            $_SESSION['status_msg'] = "Plan Selected Successfully";  // Success Message in session
            header('Location: registration_sw_form3_plan_payment?login=register');
            exit();
        } else {
            $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];
            $_SESSION['register_status_msg'] = 1;
            header('Location: login?login=register');
            exit();
        }

    } else {

        $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];
        $_SESSION['register_status_msg'] = 1;

        header('Location: login?login=register');
        exit();
    }

} 

//satyajeet
elseif( $_GET['user_plan'] != null && $_GET['user_plan'] != ''){
    if( $_GET['user_plan'] != null && $_GET['user_plan'] != '') {
        $login = mysqli_query($conn, "SELECT * FROM " . TBL . "users  WHERE user_id = '$user_id' ");
        $user_row = mysqli_fetch_array($login);
        $user_plan = $_GET['user_plan'];

        $plan_type = "SELECT * FROM " . TBL . "plan_type WHERE plan_type_status='Active' AND plan_type_id = '$user_plan'";

        $rs_plan_type = mysqli_query($conn, $plan_type);
        $plan_type_row = mysqli_fetch_array($rs_plan_type);

        $user_points = $plan_type_row['plan_type_points'];

        $cookie_user_id = "user_id";
        $lastID = $_COOKIE[$cookie_user_id];
        $reg_status = $user_row['register_status'];
        $reg_status2 = ++$reg_status;

        $upqry = "UPDATE " . TBL . "users
					  SET user_plan = '$user_plan', user_points = '$user_points',register_status = $reg_status2
					  WHERE user_id = $lastID";
        
        // update reg status
       // setcookie("reg_status",$reg_status2, time() + (86400 * 30), "/"); 

        $upres = mysqli_query($conn, $upqry);

        if ($upres) {
            $_SESSION['status_msg'] = "Plan Selected Successfully";  // Success Message in session
            header('Location: registration_sw_form3_plan_payment?login=register');
            exit();
        } else {
            $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];
            $_SESSION['register_status_msg'] = 1;
            header('Location: login?login=register');
            exit();
        }

    } else {

        $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];
        $_SESSION['register_status_msg'] = 1;

        header('Location: login?login=register');
        exit();
    }
}
//satyajeet
else {
    $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];
    $_SESSION['register_status_msg'] = 1;
    header('Location: login?login=register');
    exit();
}