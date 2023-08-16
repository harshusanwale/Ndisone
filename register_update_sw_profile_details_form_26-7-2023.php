<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */


if (file_exists('config/info.php')) {
    include('config/info.php');
}

if(!isset($_COOKIE['user_id'])) {
    echo "'user_id' is not Created!";
    unset($_COOKIE['user_id']);
    die;
} else {
    $user_id = $_COOKIE['user_id'];
    // unset($_COOKIE['user_id']);

        $login = mysqli_query($conn, "SELECT * FROM " . TBL . "users  WHERE user_id = '$user_id'");
        if (mysqli_num_rows($login) > 0) {
            $login_row = mysqli_fetch_array($login);
            // echo "<pre>";print_r($login_row);die;
            $first_name = $login_row['first_name'];
            $last_name = $login_row['last_name'];
            $email_id = $login_row['email_id'];
            $mobile_number = $login_row['mobile_number'];
        }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(!isset($_COOKIE['user_id'])) {
        echo "'user_id' is not Created!";
        unset($_COOKIE['user_id']);
        die;
    }

    if (isset($_POST['support_worker_submit'])) {

//        echo "<pre>"; print_r($_POST);  die;


        $workexp = $_POST['workexp'];
        $day = $_POST['day'];
        $all = $_POST;


if(  $_POST["day"] ) { 

        $day = $_POST["day"];



        $countDay = count($all["day"]);

        foreach($day as $days){
            $slot[$days]['day'] = $days;
            $slot[$days]['count'] = count($all[$days]);
            $slot[$days]['data'] = $all[$days];

        }
        $jsonslot = json_encode($slot);

    }        
    else{
        $jsonslot =  "['0']";
    }


if( $_POST['workexp']   ) { 
    $workexp = $_POST['workexp'];
        $jsonworkexp = json_encode($workexp);
}    
else{
    $jsonworkexp = "['0']";
}

if(  $_POST["showering"] ) { 

        $showering = json_encode($_POST['showering']);
}
else{
    $showering = "['0']";
}


if(  $_POST["qualifications"] ) { 
        $qualifications = json_encode($_POST['qualifications']);
}
else{
    $qualifications = "['0']";
}

        // echo "<pre>";print_r($_POST);
        // echo "<pre>";print_r($jsonslot);
        // echo "<pre>";print_r($jsonworkexp);
        // echo "<pre>";print_r($showering);
        // echo "<pre>";print_r($qualifications);

        // echo $_COOKIE['user_id'];die;

        $upqry = "UPDATE " . TBL . "users SET
                            user_address = '".$_POST['address']."',
                            user_city = '".$_POST['city']."',
                            user_country = '".$_POST['country']."',
                            user_zip_code = '".$_POST['post_code']."',
                            type_of_support_work = '".$_POST['type_of_support_work']."',
                            ABN_number = '".$_POST['ABN_number']."',
                            how_did_you_hear_about_us = '".$_POST['how_did_you_hear_about_us']."',
                            birth_year = '".$_POST['birth_year']."',
                            age = '".$_POST['age']."',
                            location = '".$_POST['location']."',
                            happy_to_travel = '".$_POST['happy_to_travel']."',
                            language = '".$_POST['language']."',
                            about_me = '".$_POST['about_me']."',
                            availability_time = '".$jsonslot."',
                            showering = '".$showering."',
                            qualifications = '".$qualifications."',
                            position = '".$jsonworkexp."',
                            pet_friendly = '".$_POST['pet_friendly']."',
                            gender = '".$_POST['gender']."',
                            company_name = '".$_POST['company_name']."',
                            work_from = '".$_POST['work_from']."',
                            work_to = '".$_POST['work_to']."',
                            exp_year_month = '".$_POST['exp_year_month']."',
                            support_prefer = '".$_POST['support_prefer']."',
                            work_avail = '".$_POST['work_avail']."'
                            WHERE user_id = ".$_COOKIE['user_id'];


                $upres = mysqli_query($conn,$upqry);

                $_SESSION['user_code'] = $login_row['user_code'];
                //$_SESSION['user_name'] = $login_row['first_name'];
                $_SESSION['user_id'] = $_COOKIE['user_id'];

                //header("Location: dashboard");
                header('Location: pricing-details');

    }


    if (isset($_POST['support_worker_skip_submit'])) {

        $_SESSION['user_code'] = $login_row['user_code'];
        //$_SESSION['user_name'] = $login_row['first_name'];
        $_SESSION['user_id'] = $_COOKIE['user_id'];

        header("Location: dashboard");
    }

    // if (isset($_POST['register_sw_form2_submit'])) {

    //     $user_plan = $_POST["user_plan"];

    //     $plan_type = "SELECT * FROM " . TBL . "plan_type WHERE plan_type_status='Active' AND plan_type_id = '$user_plan'";

    //     $rs_plan_type = mysqli_query($conn, $plan_type);
    //     $plan_type_row = mysqli_fetch_array($rs_plan_type);

    //     $user_points = $plan_type_row['plan_type_points'];

    //     $cookie_user_id = "user_id";
    //     $lastID = $_COOKIE[$cookie_user_id];

    //     $upqry = "UPDATE " . TBL . "users
	// 				  SET user_plan = '$user_plan', user_points = '$user_points'
	// 				  WHERE user_id = $lastID";

    //     $upres = mysqli_query($conn, $upqry);

    //     if ($upres) {
    //         $_SESSION['status_msg'] = "Plan Selected Successfully";  // Success Message in session
    //         header('Location: registration_sw_form3_plan_payment?login=register');
    //         exit();
    //     } else {
    //         $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];
    //         $_SESSION['register_status_msg'] = 1;
    //         header('Location: login?login=register');
    //         exit();
    //     }

    // } else {

    //     $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];
    //     $_SESSION['register_status_msg'] = 1;

    //     header('Location: login?login=register');
    //     exit();
    // }
    // header('Location: login?login=register');
    //  exit();

} else {

    $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];
    $_SESSION['register_status_msg'] = 1;

    header('Location: login?login=register');
    exit();

}