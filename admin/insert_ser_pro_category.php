<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

include "config/info.php";
if (isset($_POST['category_submit'])) {

    if($_POST['category_name'] != NULL){
        $cnt = count($_POST['category_name']);
        }

// *********** if Count of category name is zero means redirect starts ********

    if ($cnt == 0) {
        header('Location: add-ser-pro-category.php');
        exit;
    }

// *********** if Count of category name is zero means redirect ends ********

    for ($i = 0; $i < $cnt; $i++) {

        $category_name = $_POST['category_name'][$i];

        // $category_status = "Active";

        // $category_filter_pos_id = 1;


//************ Category Name Already Exist Check Starts ***************


        $category_name_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "service_provider_categories  WHERE category_name='" . $category_name . "' ");

        if (mysqli_num_rows($category_name_exist_check) > 0) {


            $_SESSION['status_msg'] = "The Given Category name $category_name is Already Exist Try Other!!!";

            header('Location: add-ser-pro-category.php');
            exit;
           
        }

//************ Category Name Already Exist Check Ends ***************

        $sql = mysqli_query($conn, "INSERT INTO  " . TBL . "service_provider_categories (category_name,category_upt,category_cdt)
        VALUES ('$category_name', '$curDate', '$curDate')");

    
        $LID = mysqli_insert_id($conn);
        $lastID = $LID;

        switch (strlen($LID)) {
            case 1:
                $LID = '00' . $LID;
                break;
            case 2:
                $LID = '0' . $LID;
                break;
            default:
                $LID = $LID;
                break;
        }

        $CATID = 'CAT' . $LID;

        $upqry = mysqli_query($conn, "UPDATE " . TBL . "service_provider_categories
					  SET category_code = '$CATID' 
					  WHERE id = $lastID");

    }


    if ($upqry) {

        $_SESSION['status_msg'] = "Category(s) has been Added Successfully!!!";


        header('Location: admin-ser-pro-category.php');
        exit;

    } else {


        $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

        header('Location: add-ser-pro-category.php');
        exit;
    }

}
?>