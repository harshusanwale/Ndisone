<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

# Prevent warning. #
error_reporting(0);
ob_start();
session_start();

define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'ndisonec_bizuser');
define('DB_PASSWORD', 'Bizbook@2023');
define('DB_NAME', 'ndisonec_biz');

$base_url = "https://ndisone.com.au/development/";  
$conn = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD)
or die('Unable to connect to MySQL');
# Select a database to work with. #
$selected = mysqli_select_db($conn, DB_NAME)
or die('Unable to connect to Database');
 # Session start. #
$timezone = "Asia/Calcutta";
if (function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$curDate = date('Y-m-d H:i:s');
# TABLE PREFIX #
define('TBL', 'vv_');
