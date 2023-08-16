<?php

$ReqApi = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

$headers = apache_request_headers();

if(!isset($headers['Content-Type'])){ echo "Content type application/json is required"; exit;}

if(!isset($headers['ndisone'])){ echo "Authentication is required"; exit; }else{

if($headers['ndisone']!='Votive@2023'){

echo "403,Authentication faild"; exit;

}

}


if(file_exists('db.php'))
{
    include('db.php');
}

if(file_exists('wscontroller.php'))
{
    include('wscontroller.php');
}

header("Access-Control-Allow-Origin: https://ndisone.com.au");
header("Content-type:application/json");

$data = json_decode(file_get_contents("php://input"));

if($ReqApi=="get_participant_info"){

$response = get_participant_info($data);

echo json_encode($response);

}elseif($ReqApi=="support_worker"){

$response = support_worker($data);

echo json_encode($response);

}elseif($ReqApi=="language_list"){

$response = language_list($data);

echo json_encode($response);

}elseif($ReqApi=="participant_registration"){

$response = participant_registration($data);

echo json_encode($response);

}elseif($ReqApi=="get_otp"){

$response = get_otp($data);

echo json_encode($response);

}elseif($ReqApi=="verify_otp"){

$response = verify_otp($data);

echo json_encode($response);

}elseif($ReqApi=="sworker_registration"){

$response = sworker_registration($data);

echo json_encode($response);

}elseif($ReqApi=="general_registration"){

$response = general_registration($data);

echo json_encode($response);

}elseif($ReqApi=="NDIS_registration"){

$response = NDIS_registration($data);

echo json_encode($response);

}else{

$response['message'] = "API Not Valid";
$response['status']= 0;
$response['data'] = array();

echo json_encode($response);

}



?>