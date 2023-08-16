<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['lang_submit'])) {
        $langid = $_POST["langid"];

        // Common Language Option Details
        $lang_name = $_POST["lang_name"];

        $lang_code = $_POST["lang_code"];
        //************  Language Option name  Already Exist Check Starts ***************

        $lang_name_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "languages  WHERE language_name='" . $lang_name . "' AND id  != $langid ");
        if (mysqli_num_rows($lang_name_exist_check) > 0) {
            $_SESSION['status_msg'] = "The Given language option name $lang_name is Already Exist Try Other!!!";

            header("Location:edit_sw_language.php?row=$langid");
            exit;
        }
        
		//************ Language Option name Already Exist Check Ends ***************
        
        // Update language Option  Part starts
        $lang_qry = "UPDATE  " . TBL . "languages SET language_name='" . $lang_name . "',language_code='" . $lang_code . "', language_udt ='" . $curDate . "' where id ='" . $langid . "'";
        
        $lang_res = mysqli_query($conn, $lang_qry);

        if($lang_res){
            $_SESSION['status_msg'] = "Your language option  has been Updated Successfully!!!";
            header('Location: admin_all_sw_languages.php');
            exit;  
        }else{
            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

             header("Location: edit_sw_language.php?row=$langid");
        }

    }
}else{
    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
    header('Location: admin_all_sw_languages.php');
}