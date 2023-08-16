<?php
function RegStatusCheck($segment,$id){
global $conn;

$sql = "SELECT * FROM  " . TBL . "users where user_id='" . $id . "'";
$rs = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($rs);
// print_r($row);die;
// return $row;
if($row['user_type'] == 'Support Worker'){
if($row['register_status'] == 1 && $segment == 'activate'){
//echo "<script>window.location.href='activate.php'</script>"; 
$page =  1 ;
}elseif($row['register_status'] == 2 && $segment == 'activate-congratu'){
//echo "<script>window.location.href='activate-congratu'</script>";   
$page =  2 ;
}elseif($row['register_status'] == 3){
$page =  3 ;  
}

//header('Location:registration_sw_form');   
// }elseif($row['register_status'] == 4){
// //header('Location:pricing-details');   
// }elseif($row['register_status'] == 5){
// //header('Location:registration_sw_form3_plan_payment');   
// }elseif($row['register_status'] == 6){
return $page;  
}

}



?>