<?php

/**
 * Created by Vignesh.
 * User: Vignesh
 */
if (file_exists('config/info.php')) {
    include('config/info.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['verification_submit'])) {


        $_SESSION['verification_link'] = $_POST["verification_link"];        
        $_SESSION['verification_code'] = $_POST["verification_code"];        



        $verification_link = $_POST["verification_link"];
        $verification_code = $_POST["verification_code"];
        $register_status  = 2 ;
        //$activate = mysqli_query($conn, "SELECT * FROM " . TBL . "users  WHERE verification_link = '$verification_link'");
        
        $activate = mysqli_query($conn,"SELECT * FROM " . TBL . "users  WHERE user_id = ".$_COOKIE['user_id']);
        if (mysqli_num_rows($activate) > 0) {
            $activate_row = mysqli_fetch_array($activate);
            if ($verification_code == $activate_row['verification_code']) {
                $user_id = $activate_row['user_id'];
                // if ( $activate_row['user_type'] == 'General' ) {
                // $upqry = "UPDATE " . TBL . "users
				// 	  SET verification_code = '', verification_link = '',verification_status = 0,register_status = 1	
				// 	  WHERE user_id = ".$_COOKIE['user_id'];
                $upqry = "UPDATE " . TBL . "users
					  SET verification_status = 0,register_status = 2	
					  WHERE user_id = ".$_COOKIE['user_id'];

                $upres = mysqli_query($conn, $upqry);
                // }
                $cookie_user_id = "user_id";    // echo $_COOKIE['user_id']; die;
                
                $check_user = mysqli_query($conn, "SELECT * FROM " . TBL . "users  WHERE user_id = '$_COOKIE[$cookie_user_id]'");
 
                if (mysqli_num_rows($check_user) > 0) {
                    $user_row = mysqli_fetch_array($check_user);
                    // // reg status
                   setcookie("reg_status", $user_row['register_status'], time() + (86400 * 30), "/"); 
                    if ($user_row['user_type'] == 'General') {
                        $_SESSION['status_msg'] = "";
                        $_SESSION['login_status_msg'] = 1;
                        $_SESSION['user_code'] = $user_row['user_code'];
                        $_SESSION['user_name'] = $user_row['first_name'];
                        $_SESSION['user_id'] = $_COOKIE[$cookie_user_id];
                        // echo "<pre>";print_r($user_row['user_code']);
                        // echo "<pre>";print_r($user_row['user_name']);
                        // echo "<pre>";print_r($_COOKIE[$cookie_user_id]);
                        // die;
                        header("location: dashboard");
                        // header('Location: login');
                    } else if ($user_row['user_type'] == 'Participant') {

                        $_SESSION['status_msg'] = "";
                        $_SESSION['login_status_msg'] = 1;
                        header('Location: login_participant?login=register');
                        //$_SESSION['user_code'] = $user_row['user_code'];
                        //$_SESSION['user_name'] = $user_row['first_name'];
                        //$_SESSION['user_id'] = $_COOKIE[$cookie_user_id];
                        // header('Location: activate-congratu');
                    } else if ($user_row['user_type'] == 'Support Worker') {
                        $_SESSION['status_msg'] = "Congratulations ! We are offering two years free subscription plan for all Support Workers whether you are working as a Sole Trader or Under the agency";
                        $_SESSION['login_status_msg'] = 1;
                        $_SESSION['user_type'] = $user_row['user_type'];
                        //$_SESSION['user_name'] = $user_row['first_name'];
                        //$_SESSION['user_id'] = $_COOKIE[$cookie_user_id];
                        $_COOKIE['user_id'] = $user_row['user_id'];

                        $_COOKIE['user_id'] = $_COOKIE[$cookie_user_id];
//update_verification_status();
                        // header('Location: registration_sw_form_free_congo');
                        header('Location: activate-congratu');
                        // header('Location: registration_sw_form2_plan');
                    } else if ($user_row['user_type'] == 'NDIS service experts') {
                        $_SESSION['status_msg'] = "";
                        $_SESSION['login_status_msg'] = 1;
                        $_SESSION['user_code'] = $user_row['user_code'];
                        $_SESSION['user_id'] = $user_row['user_id'];
                        //$_SESSION['user_name'] = $user_row['first_name'];
                        // header("location: dashboard");
                        header('Location: pricing-details');
                    }  else if ($user_row['user_type'] == 'Service provider') {
                        $_SESSION['status_msg'] = "";
                        $_SESSION['login_status_msg'] = 1;
                        $_SESSION['user_code'] = $user_row['user_code'];
                        $_SESSION['user_id'] = $user_row['user_id'];
                        //$_SESSION['user_name'] = $user_row['first_name'];
                        // header('Location: registration_sp_form');
                        header('Location: pricing-details');
                    } else if ($user_row['user_type'] == 'Support coordinator') {
                        $_SESSION['status_msg'] = "";
                        $_SESSION['login_status_msg'] = 1;
                        $_SESSION['user_code'] = $user_row['user_code'];
                        $_SESSION['user_type'] = $user_row['user_type'];
                        $_SESSION['user_id']   = $user_row['user_id'];
                        //$_SESSION['user_name'] = $user_row['first_name'];
                        $_COOKIE['user_id']   = $user_row['user_id'];
                        // $_SESSION['user_id'] = $_COOKIE[$cookie_user_id];
                        // header('Location: registration_sc_form');
                        //header('Location: activate-congratu');
                        
                        header('Location: register_ask_question');
                    } else {
                        $_SESSION['status_msg'] = $BIZBOOK['ACTIVATION_EMAIL_VERIFICATION_SUCCESS_MESSAGE'];
                        $_SESSION['login_status_msg'] = 1;
                        header('Location: login');
                    }
                } else {
                    $_SESSION['status_msg'] = $BIZBOOK['ACTIVATION_EMAIL_VERIFICATION_SUCCESS_MESSAGE'];
                    $_SESSION['login_status_msg'] = 1;
                    header('Location: login');
                }
                // header('Location: login');
                exit();
            } else {
                $_SESSION['status_msg'] = $BIZBOOK['ACTIVATION_EMAIL_VERIFICATION_FAILURE_MESSAGE'];
                header('Location: activate?q=' . $verification_link);
                exit();
            }
        }
    }
} else {
    $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];
    $_SESSION['login_status_msg'] = 1;
    header('Location: login');
}
