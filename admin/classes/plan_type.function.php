<?php


function update_verification_status()
{ 
    
   global $conn;
   //$my_user = getUser($_SESSION['user_id']);
   echo $upqry_new = "UPDATE " . TBL . "users
   SET verification_status = verification_status + 1  WHERE user_id = ".$_SESSION['user_id'] ." and  user_type ='".$_SESSION['user_type'] ."'"; 
   die;
 //$upres = mysqli_query($conn,$upqry_new);

}




function onsuccess_create_session($verification_link1,$verification_code1)

{
    global $conn;
 
        $verification_link = $verification_link1;
        $verification_code = $verification_code1;
        
        $activate = mysqli_query($conn,"SELECT * FROM " . TBL . "users  WHERE verification_link = '$verification_link'");
        if (mysqli_num_rows($activate) > 0) {
            $activate_row = mysqli_fetch_array($activate);
                if ($verification_code == $activate_row['verification_code']) {
                    $user_id_new = $activate_row['user_id'];
                    $upqry_new = "UPDATE " . TBL . "users
					  SET verification_code = '', verification_link = '',verification_status = 0
					  WHERE user_id = ".$user_id_new; 
                    $upres = mysqli_query($conn,$upqry_new);
                    $_SESSION['user_name'] =  $activate_row['first_name'];
             }   
          } 
        unset($_SESSION['verification_link']);
        unset($_SESSION['verification_code']);                       
    
}



function getAllPlanType()

{

    global $conn;



    $sql = "SELECT * FROM " . TBL . "plan_type WHERE plan_type_status='Active' ORDER BY plan_type_id ASC";

    $rs = mysqli_query($conn, $sql);

    return $rs;



}



function getPlanType($arg)

{

    global $conn;



    $sql = "SELECT * FROM " . TBL . "plan_type WHERE plan_type_status='Active' AND plan_type_id = '$arg' ";

    $rs = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($rs);

    return $row;



}







?>