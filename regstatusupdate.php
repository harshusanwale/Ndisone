<?php
if (file_exists('config/info.php')) {
    include('config/info.php');
}
// Update status 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$sql = "SELECT * FROM  " . TBL . "users where user_id='" . $_COOKIE['user_id'] . "'";
$rs = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($rs);

if(!empty($row['register_status'])){
$regstatus = $row['register_status'];
$newregstatus = ++$regstatus ;
// setcookie("reg_status", $newregstatus, time() + (86400 * 30), "/"); 
// $upqry = "UPDATE " . TBL . "users
//         SET register_status = $newregstatus	
//         WHERE user_id = ".$_COOKIE['user_id'];
// $upres = mysqli_query($conn,$upqry);
if($newregstatus == 3){
$redirect_url = $webpage_full_link . 'registration_sw_form';  //Redirect Url
header("Location: $redirect_url");
}
}
}
?>