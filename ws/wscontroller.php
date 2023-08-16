<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function Apimail($to,$subject,$message){

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);

$mail->IsSMTP();
$mail->Host = "mail.ndisone.com.au";

// $from = "rahul@ndisone.com.au";
$from = "ndisonec@ndisone.com.au";
$mail->isHTML(true);

 try{

    $mail->IsSMTP();
    $mail->Host = "mail.ndisone.com.au";

    $mail->SetFrom("$from", "$from");
    $mail->AddAddress("$to");

    $mail->Subject = "$subject";
    $mail->Body = "$message";
    $checkm = $mail->Send();

    echo "";

}catch(Exception $e){

    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}

}

function get_participant_info($request){
global $conn;

 $user_type = array();

 $result = mysqli_query($conn,"SELECT * FROM " . TBL . "user_type WHERE status='1' ORDER BY id");

 if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {

  $user_type[] = $row;

  }
}

$nd_plan_managed = array();

 $result = mysqli_query($conn,"SELECT * FROM " . TBL . "nd_plan_managed ORDER BY plan_managed_id");

 if(mysqli_num_rows($result) > 0){

  while($row = mysqli_fetch_assoc($result)) {

  $nd_plan_managed[] = $row;

  }
} 

$par_age_range = array();

 $result = mysqli_query($conn,"SELECT * FROM " . TBL . "par_age_range ORDER BY age_range_id");

 if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {

  $par_age_range[] = $row;

  }
} 

$pa_identify_as = array();

 $result = mysqli_query($conn,"SELECT * FROM " . TBL . "pa_identify_as ORDER BY pa_identify_as_id");

 if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {

  $pa_identify_as[] = $row;

  }
} 

$relation_wi_par = array();

 $result = mysqli_query($conn,"SELECT * FROM " . TBL . "relation_wi_par ORDER BY relation_wi_par_id");

 if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {

  $relation_wi_par[] = $row;

  }
} 

$w_n_services = array();

 $result = mysqli_query($conn,"SELECT * FROM " . TBL . "w_n_services ORDER BY w_n_services_id");

 if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {

  $w_n_services[] = $row;

  }
}

$contact_method = array();

 $result = mysqli_query($conn,"SELECT * FROM " . TBL . "contact_method ORDER BY contact_method_id");

 if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {

  $contact_method[] = $row;

  }
}  

$response['message'] = "Participant Info";
$response['status']= 1;
$response['data'] = array(
                          'user_type'=>$user_type,
                          'w_n_services'=>$w_n_services,
                          'plan_managed'=>$nd_plan_managed,
                          'par_age_range'=>$par_age_range,
                          'contact_method'=>$contact_method,
                          'pa_identify_as'=>$pa_identify_as,
                          'relation_wi_par'=>$relation_wi_par,
                         );

return $response;

} 

function support_worker($request){
global $conn;

 $user_type = array();

 $result = mysqli_query($conn,"SELECT * FROM " . TBL . "user_type WHERE status='1' ORDER BY id");

 if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {

  $user_type[] = $row;

  }
}

$support_offer = array();

 $result = mysqli_query($conn,"SELECT * FROM " . TBL . "support_offer ORDER BY supp_offer_id ");

 if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {

  $support_offer[] = $row;

  }
}


$qualifications = array();

 $result = mysqli_query($conn,"SELECT * FROM " . TBL . "qualifications ORDER BY qualifications_id");

 if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {

  $qualifications[] = $row;

  }
}

$sw_travel_distance = array();

 $result = mysqli_query($conn,"SELECT * FROM " . TBL . "sw_travel_distance ORDER BY sw_travel_distance_id");

 if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {

  $sw_travel_distance[] = $row;

  }
}

$sw_about_us = array();

 $result = mysqli_query($conn,"SELECT * FROM " . TBL . "sw_about_us ORDER BY sw_about_us_id");

 if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {

  $sw_about_us[] = $row;

  }
}

$support_preference = array();

 $result = mysqli_query($conn,"SELECT * FROM " . TBL . "support_preference ORDER BY supp_pre_id");

 if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {

  $support_preference[] = $row;

  }
}


$supp_worker_type = array();

 $result = mysqli_query($conn,"SELECT * FROM " . TBL . "supp_worker_type ORDER BY supp_worker_type_id");

 if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {

  $supp_worker_type[] = $row;

  }
}

$pet_friendly = array();

 $result = mysqli_query($conn,"SELECT * FROM " . TBL . "pet_friendly ORDER BY pet_fri_id");

 if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {

  $pet_friendly[] = $row;

  }
}

$availability_time = array();

   $result = mysqli_query($conn,"SELECT * FROM " . TBL . "availability_time ORDER BY avail_time_id");

 if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {

  $availability_time[] = $row;

  }
}


$response['message'] = "Support Worker Info";
$response['status']= 1;
$response['data'] = array(
	                      'user_type'=>$user_type,
	                      'support_offer'=>$support_offer,
	                      'qualifications'=>$qualifications,
	                      'sw_travel_distance'=>$sw_travel_distance,
	                      'sw_about_us'=>$sw_about_us,
	                      'support_preference'=>$support_preference,
	                      'supp_worker_type'=>$supp_worker_type,
	                      'pet_friendly'=>$pet_friendly,
	                      'availability_time'=>$availability_time
	                     );

return $response;

} 

function language_list($request){
global $conn;

$sw_languages = array();

 $result = mysqli_query($conn,"SELECT * FROM " . TBL . "languages ORDER BY id");

 if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {

  $sw_languages[] = $row;

  }
}

$response['message'] = "Language List";
$response['status']= 1;
$response['data'] = array('languages'=>$sw_languages);

return $response;

} 


function participant_registration($request){

global $conn;  

$user_id  =  $request->user_id;
$first_name  =   $request->first_name;
$last_name  =  $request->last_name;	
$email_id  =  $request->email_id;
$mobile_number  =   $request->mobile_number;
$password  =   md5($request->password); 
$user_type  =  $request->user_type;
$user_address  =  $request->user_address;
$user_city  =  $request->user_city;
$user_country  =  $request->user_country;
$user_state  =  $request->user_state;
$user_zip_code  =  $request->user_zip_code;
$user_latitude  =  $request->user_latitude;
$user_longitude  =  $request->user_longitude;
$user_slug = $request->first_name; 
$w_n_services  =   $request->w_n_services;
$n_p_managed  =  $request->n_p_managed; 
$service_location  =  $request->service_location;
$service_latitude  =  $request->service_latitude;
$service_longitude  =  $request->service_longitude;
$relation_w_p  =   $request->relation_w_p;
$p_first_name  =  $request->p_first_name; 
$p_last_name  =  $request->p_last_name;
$age_range  =   $request->age_range;
$p_contact_method  =  $request->p_contact_method; 
$p_identify_as  =  $request->p_identify_as;
$language_spoken  =   $request->language_spoken;
$interpreter_r  =  $request->interpreter_r;
$ndis_number = $request->ndis_number; 

$user_code = '';
$register_mode = "Direct";
$user_status = "Inactive";
$curDate = date('Y-m-d H:i:s');

if(empty($first_name) || empty($password) || empty($user_type)){ 

$response['message'] = "Name, Password and User Type Is Required";
$response['status']= 0;
$response['data'] = array();
return $response;
exit;  

}

if(empty($email_id) || empty($mobile_number)){

$response['message'] = "Email Id and Mobile Number Is Required";
$response['status']= 0;
$response['data'] = array();
return $response;
exit;

}


//$upqry = "UPDATE " . TBL . "users SET first_name='" . $first_name . "', last_name='" . $last_name . "', email_id='" . $email_id . "', mobile_number='" . $mobile_number . "', password='" . $password . "', user_type='" . $user_type . "', w_n_services='" . $w_n_services . "', n_p_managed='" . $n_p_managed . "', service_location='" . $service_location . "', relation_w_p='" . $relation_w_p . "', p_first_name='" . $p_first_name . "', p_last_name='" . $p_last_name . "', age_range='" . $age_range . "', p_contact_method='" . $p_contact_method . "', p_identify_as='" . $p_identify_as . "', language_spoken='" . $language_spoken . "', interpreter_r='" . $interpreter_r . "', ndis_number='" . $ndis_number . "', last_name='" . $last_name . "' WHERE user_id = $user_id";

  $checkreg = mysqli_query($conn,"SELECT * FROM " . TBL . "users WHERE email_id = '$email_id'");

  if(mysqli_num_rows($checkreg) > 0) {

   $regmsg = "You have already registered";

  }else{

 $upqry = "INSERT INTO " . TBL . "users (first_name, last_name, email_id, mobile_number, password, user_type, user_address, user_city, user_country, user_state, user_zip_code, user_latitude, user_longitude, w_n_services, n_p_managed, service_location, service_latitude, service_longitude, relation_w_p, p_first_name, p_last_name, age_range, p_contact_method, p_identify_as, language_spoken, interpreter_r, ndis_number, user_status, register_mode, user_cdt, user_slug) VALUES ('$first_name', '$last_name','$email_id','$mobile_number', '$password', '$user_type', '$user_address', '$user_city', '$user_country', '$user_state', '$user_zip_code', '$user_latitude', '$user_longitude','$w_n_services', '$n_p_managed','$service_location','$service_latitude','$service_longitude','$relation_w_p', '$p_first_name', '$p_last_name','$age_range', '$p_contact_method','$p_identify_as','$language_spoken', '$interpreter_r', '$ndis_number', '$user_status', '$register_mode', '$curDate', '$user_slug')";

  $upres = mysqli_query($conn, $upqry);

  $LID = mysqli_insert_id($conn);

  $lastID = $LID;

  $user_code = 'USER'.$lastID; 

  $upucode = "UPDATE " . TBL . "users SET user_code='" . $user_code . "' WHERE user_id = '$lastID'";

  $upucoderes = mysqli_query($conn, $upucode);

  $regmsg = "Registration Successful";

  }

$result = mysqli_query($conn,"SELECT * FROM " . TBL . "users WHERE email_id = '$email_id'");

$row = mysqli_fetch_assoc($result);

$response['message'] = $regmsg;
$response['status']= 1;
$response['data'] = array('participant'=>$row);

return $response;

} 

function get_otp($request){

global $conn;  

$email_id  =  $request->email_id;
$mobile_number  =   $request->mobile_number;
$curDate = date('Y-m-d H:i:s');

if(empty($email_id) && empty($mobile_number)){

$response['message'] = "Email Id Or Mobile Number Is Required";
$response['status']= 0;
$response['data'] = array();
return $response;
exit;

}


 $checkemail = mysqli_query($conn,"SELECT * FROM " . TBL . "users WHERE email_id='$email_id' || mobile_number='$mobile_number'");

 if(mysqli_num_rows($checkemail) > 0){

  $response['message'] = "Email id or mobile number already exists";
  $response['status']= 0;
  $response['data'] = array();

 }else{


$digits = 5;

if(!empty($email_id)){

$verification_code = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);

  $to = $email_id;
  $subject = "OTP Send Successful";
  $message = "Your verification OTP is : ".$verification_code;
  Apimail($to,$subject,$message); 

}else{ $verification_code = ''; }

if(!empty($mobile_number)){

$mobile_verify_code = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);

/* send sms code here */

}else{ $mobile_verify_code = ''; }


  $checkotp = mysqli_query($conn,"SELECT * FROM " . TBL . "api_otptemp WHERE email_id='$email_id' || mobile_number='$mobile_number'");

  if(mysqli_num_rows($checkotp) > 0){ 

  if(!empty($email_id) && !empty($mobile_number)){	

  $upqrye = "UPDATE " . TBL . "api_otptemp SET email_id='" . $email_id . "' WHERE mobile_number = '$mobile_number'";

  $uprese = mysqli_query($conn, $upqrye);	

  $upqrym = "UPDATE " . TBL . "api_otptemp SET mobile_number='" . $mobile_number . "' WHERE email_id = '$email_id'";

  $upresm = mysqli_query($conn, $upqrym);	

  }

  if(!empty($email_id)){  

  $upqry = "UPDATE " . TBL . "api_otptemp SET verification_code='" . $verification_code . "' WHERE email_id = '$email_id'";

  $upres = mysqli_query($conn, $upqry);

  }else{ $verification_code==''; }

  if(!empty($mobile_number)){  

  $mupqry = "UPDATE " . TBL . "api_otptemp SET mobile_verify_code='" . $mobile_verify_code . "' WHERE mobile_number = '$mobile_number'";

  $mupres = mysqli_query($conn, $mupqry);

  /* send sms code hear */

  }else{ $mobile_verify_code==''; }

  $msgotp = "OTP Resend Successful";

  }else{ 

  $qry = "INSERT INTO " . TBL . "api_otptemp (email_id, mobile_number, verification_code, mobile_verify_code, created_at) VALUES ('$email_id', '$mobile_number', '$verification_code', '$mobile_verify_code', '$curDate')";

  $res = mysqli_query($conn, $qry);

  $msgotp = "OTP Create Successful";

}


$response['message'] = $msgotp;
$response['status']= 1;
$response['data'] = array('EmailOTP'=>$verification_code,'MobileOTP'=>$mobile_verify_code);

}

return $response;

} 

function verify_otp($request){

global $conn;  

$email_id  =  $request->email_id;
$mobile_number  =   $request->mobile_number;
$email_otp = $request->email_otp;
$mobile_otp = $request->mobile_otp;

if(empty($email_id) || empty($mobile_number) || empty($email_otp) || empty($mobile_otp)){

$response['message'] = "Email Id Or Mobile Number Is Required With OTP";
$response['status']= 0;
$response['data'] = array();
return $response;
exit;

}


  $result = mysqli_query($conn,"SELECT * FROM " . TBL . "api_otptemp WHERE email_id='$email_id' && mobile_number='$mobile_number'");

  $row = mysqli_fetch_assoc($result);

 if($row['verification_code']==$email_otp && $row['mobile_verify_code']==$mobile_otp){

  $response['message'] = "OTP verification successful"; 
  $response['status']= 1;
  $response['data'] = array();
   
 }else{

  $response['message'] = "OTP Not Valid";
  $response['status']= 0;
  $response['data'] = array();  

} 

return $response;

} 

function sworker_registration($request){

global $conn;  

//$user_id  =  $request->user_id;
$first_name  =   $request->first_name;
$last_name  =  $request->last_name; 
$email_id  =  $request->email_id;
$mobile_number  =   $request->mobile_number;
$password  =  md5($request->password); 
$user_type  =  $request->user_type;

$user_slug = $request->first_name; 
$user_address = $request->user_address;
$user_city = $request->user_city; 
$user_country = $request->user_country;
$user_zip_code = $request->user_zip_code;
$type_of_support_work = $request->type_of_support_work;
$ABN_number = $request->ABN_number; 
$how_did_you_hear_about_us = $request->how_did_you_hear_about_us;
$birth_year = $request->birth_year; 
$age = $request->age; 
$location = $request->location; 
$happy_to_travel = $request->happy_to_travel; 
$language = $request->language; 
$about_me = $request->about_me; 
$availability_time = $request->availability_time; 
$pet_friendly = $request->pet_friendly; 
$gender = $request->gender; 
$position = $request->position; 
$showering = $request->showering; 
$qualifications = $request->qualifications; 
$support_prefer = $request->support_prefer; 
$work_avail = $request->work_avail;
$user_code = '';
$register_mode = "Direct";
$user_status = "Inactive";
$curDate = date('Y-m-d H:i:s');

if(empty($first_name) || empty($password) || empty($user_type)){ 

$response['message'] = "Name, Password and User Type Is Required";
$response['status']= 0;
$response['data'] = array();
return $response;
exit;  

}

if(empty($email_id) || empty($mobile_number)){

$response['message'] = "Email Id and Mobile Number Is Required";
$response['status']= 0;
$response['data'] = array();
return $response;
exit;

}

  $checkreg = mysqli_query($conn,"SELECT * FROM " . TBL . "users WHERE email_id = '$email_id'");

  if(mysqli_num_rows($checkreg) > 0) {

   $regmsg = "You have already registered";

  }else{

      
 $upqry = "INSERT INTO " . TBL . "users (user_code, first_name, last_name, email_id, mobile_number, password, user_type, user_status, register_mode, user_cdt, user_slug, user_address, user_city, user_country, user_zip_code, type_of_support_work, ABN_number, how_did_you_hear_about_us, birth_year, age, location, happy_to_travel, language, about_me, availability_time, pet_friendly, gender, position, showering, qualifications, support_prefer, work_avail) VALUES ('$user_code', '$first_name', '$last_name','$email_id','$mobile_number', '$password', '$user_type', '$user_status', '$register_mode', '$curDate', '$user_slug', '$user_address', '$user_city', '$user_country', '$user_zip_code', '$type_of_support_work', '$ABN_number', '$how_did_you_hear_about_us', '$birth_year', '$age', '$location', '$happy_to_travel', '$language', '$about_me', '$availability_time', '$pet_friendly', '$gender', '$position', '$showering', '$qualifications', '$support_prefer', '$work_avail')";

  $upres = mysqli_query($conn, $upqry);

  $LID = mysqli_insert_id($conn);

  $lastID = $LID;

  $user_code = 'USER'.$lastID; 

  $upucode = "UPDATE " . TBL . "users SET user_code='" . $user_code . "' WHERE user_id = '$lastID'";

  $upucoderes = mysqli_query($conn, $upucode);

  $regmsg = "Registration Successful";

  }

$result = mysqli_query($conn,"SELECT * FROM " . TBL . "users WHERE email_id = '$email_id'");

$row = mysqli_fetch_assoc($result);

$response['message'] = $regmsg;
$response['status']= 1;
$response['data'] = array('support_worker'=>$row);

return $response;

} 


function general_registration($request){

global $conn;  

$user_id  =  $request->user_id;
$first_name  =   $request->first_name;
$last_name  =  $request->last_name; 
$email_id  =  $request->email_id;
$mobile_number  =   $request->mobile_number;
$password  =   md5($request->password); 
$user_type  =  $request->user_type;
$user_slug = $request->first_name; 
$w_n_services  =   $request->w_n_services;
$n_p_managed  =  $request->n_p_managed; 
$service_location  =  $request->service_location;
$relation_w_p  =   $request->relation_w_p;
$p_first_name  =  $request->p_first_name; 
$p_last_name  =  $request->p_last_name;
$age_range  =   $request->age_range;
$p_contact_method  =  $request->p_contact_method; 
$p_identify_as  =  $request->p_identify_as;
$language_spoken  =   $request->language_spoken;
$interpreter_r  =  $request->interpreter_r;
$ndis_number = $request->ndis_number; 

$user_code = '';
$register_mode = "Direct";
$user_status = "Inactive";
$curDate = date('Y-m-d H:i:s');

if(empty($first_name) || empty($password) || empty($user_type)){ 

$response['message'] = "Name, Password and User Type Is Required";
$response['status']= 0;
$response['data'] = array();
return $response;
exit;  

}

if(empty($email_id) || empty($mobile_number)){

$response['message'] = "Email Id and Mobile Number Is Required";
$response['status']= 0;
$response['data'] = array();
return $response;
exit;

}

  $checkreg = mysqli_query($conn,"SELECT * FROM " . TBL . "users WHERE email_id = '$email_id'");

  if(mysqli_num_rows($checkreg) > 0) {

   $regmsg = "You have already registered";

  }else{

 $upqry = "INSERT INTO " . TBL . "users (first_name, last_name, email_id, mobile_number, password, user_type, w_n_services, n_p_managed, service_location, relation_w_p, p_first_name, p_last_name, age_range, p_contact_method, p_identify_as, language_spoken, interpreter_r, ndis_number, user_status, register_mode, user_cdt, user_slug) VALUES ('$first_name', '$last_name','$email_id','$mobile_number', '$password', '$user_type','$w_n_services', '$n_p_managed','$service_location','$relation_w_p', '$p_first_name', '$p_last_name','$age_range', '$p_contact_method','$p_identify_as','$language_spoken', '$interpreter_r', '$ndis_number', '$user_status', '$register_mode', '$curDate', '$user_slug')";

  $upres = mysqli_query($conn, $upqry);

  $LID = mysqli_insert_id($conn);

  $lastID = $LID;

  $user_code = 'USER'.$lastID; 

  $upucode = "UPDATE " . TBL . "users SET user_code='" . $user_code . "' WHERE user_id = '$lastID'";

  $upucoderes = mysqli_query($conn, $upucode);

  $regmsg = "Registration Successful";

  }

$result = mysqli_query($conn,"SELECT * FROM " . TBL . "users WHERE email_id = '$email_id'");

$row = mysqli_fetch_assoc($result);

$response['message'] = $regmsg;
$response['status']= 1;
$response['data'] = array('general_registration'=>$row);

return $response;

} 


function NDIS_registration($request){

global $conn;  

$user_id  =  $request->user_id;
$first_name  =   $request->first_name;
$last_name  =  $request->last_name; 
$email_id  =  $request->email_id;
$mobile_number  =   $request->mobile_number;
$password  =   md5($request->password); 
$user_type  =  $request->user_type;
$user_slug = $request->first_name; 
$w_n_services  =   $request->w_n_services;
$n_p_managed  =  $request->n_p_managed; 
$service_location  =  $request->service_location;
$relation_w_p  =   $request->relation_w_p;
$p_first_name  =  $request->p_first_name; 
$p_last_name  =  $request->p_last_name;
$age_range  =   $request->age_range;
$p_contact_method  =  $request->p_contact_method; 
$p_identify_as  =  $request->p_identify_as;
$language_spoken  =   $request->language_spoken;
$interpreter_r  =  $request->interpreter_r;
$ndis_number = $request->ndis_number; 

$user_code = '';
$register_mode = "Direct";
$user_status = "Inactive";
$curDate = date('Y-m-d H:i:s');

if(empty($first_name) || empty($password) || empty($user_type)){ 

$response['message'] = "Name, Password and User Type Is Required";
$response['status']= 0;
$response['data'] = array();
return $response;
exit;  

}

if(empty($email_id) || empty($mobile_number)){

$response['message'] = "Email Id and Mobile Number Is Required";
$response['status']= 0;
$response['data'] = array();
return $response;
exit;

}

  $checkreg = mysqli_query($conn,"SELECT * FROM " . TBL . "users WHERE email_id = '$email_id'");

  if(mysqli_num_rows($checkreg) > 0) {

   $regmsg = "You have already registered";

  }else{

 $upqry = "INSERT INTO " . TBL . "users (first_name, last_name, email_id, mobile_number, password, user_type, w_n_services, n_p_managed, service_location, relation_w_p, p_first_name, p_last_name, age_range, p_contact_method, p_identify_as, language_spoken, interpreter_r, ndis_number, user_status, register_mode, user_cdt, user_slug) VALUES ('$first_name', '$last_name','$email_id','$mobile_number', '$password', '$user_type','$w_n_services', '$n_p_managed','$service_location','$relation_w_p', '$p_first_name', '$p_last_name','$age_range', '$p_contact_method','$p_identify_as','$language_spoken', '$interpreter_r', '$ndis_number', '$user_status', '$register_mode', '$curDate', '$user_slug')";

  $upres = mysqli_query($conn, $upqry);

  $LID = mysqli_insert_id($conn);

  $lastID = $LID;

  $user_code = 'USER'.$lastID; 

  $upucode = "UPDATE " . TBL . "users SET user_code='" . $user_code . "' WHERE user_id = '$lastID'";

  $upucoderes = mysqli_query($conn, $upucode);

  $regmsg = "Registration Successful";

  }

$result = mysqli_query($conn,"SELECT * FROM " . TBL . "users WHERE email_id = '$email_id'");

$row = mysqli_fetch_assoc($result);

$response['message'] = $regmsg;
$response['status']= 1;
$response['data'] = array('NDIS_registration'=>$row);

return $response;

} 

?>