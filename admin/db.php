<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

# Prevent warning. #
error_reporting(0);
ob_start();

define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'ndisonec_bizuser');
define('DB_PASSWORD', 'Bizbook@2023');
define('DB_NAME', 'ndisonec_biz');

$webpage_full_link_url = "https://ndisone.com.au/development/";  #Important
// $webpage_full_link_url = "http://localhost/projects/jobs_demo/";  #Important Please Paste your WebPage Full URL (i.e https://bizbookdirectorytemplate.com/)


# Connection to the database. #
$conn = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD)
or die('Unable to connect to MySQL');

# Select a database to work with. #
$selected = mysqli_select_db($conn, DB_NAME)
or die('Unable to connect to Database');

session_start(); # Session start. #

$timezone = "Asia/Calcutta";
if (function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$curDate = date('Y-m-d H:i:s');

# TABLE PREFIX #
define('TBL', 'vv_');

$sql = "SELECT * FROM " . TBL . "footer WHERE footer_id = 1";
$rs = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($rs);

$webpage_full_link_db = $row['website_complete_url'];

if ($webpage_full_link_url) {

    $webpage_full_link = $webpage_full_link_url;
} else {

    $webpage_full_link = $webpage_full_link_db;
}