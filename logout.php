<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */
# Prevent warning. #
error_reporting(0);
ob_start();
session_start();
if (file_exists('config/info.php')) {
    include('config/info.php');
}
unset($_SESSION['user_code']);
unset($_SESSION['user_name']);
unset($_SESSION['user_id']);
unset($_SESSION['user_type']);
if((!isset($_SESSION['user_code']) || empty($_SESSION['user_code'])) && (!isset($_SESSION['user_name']) ||  empty($_SESSION['user_name']) && (!isset($_SESSION['user_id']) ||  empty($_SESSION['user_id'])) && (!isset($_SESSION['user_type']) ||  empty($_SESSION['user_type']))) )
{
    header("Location: ".$webpage_full_link);
    exit();
}
//
//session_start();
//if(session_destroy())
//{
//    header("Location: index");
//}
?>