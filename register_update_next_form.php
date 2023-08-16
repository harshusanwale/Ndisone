<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */


if (file_exists('test_mail.php')) {
    include('test_mail.php');
}

if (file_exists('config/info.php')) {
    include('config/info.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (isset($_POST['register_sw_next_submit'])) {
        // echo "<pre>";print_r("yes");die;
        header('Location: registration_sw_form');
        exit();
    }
}