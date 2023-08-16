<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['category_submit'])) {

        $category_id = $_POST['category_id'];
        $category_name = $_POST['category_name'];
         
//************ Category Name Already Exist Check Starts ***************


        $category_name_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "service_provider_categories  WHERE category_name='" . $category_name . "' AND id != $category_id ");
        if (mysqli_num_rows($category_name_exist_check) > 0) {


            $_SESSION['status_msg'] = "The Given Category name is Already Exist Try Other!!!";

            header('Location: edit-ser-pro-category.php?row=' . $category_id);
            exit;


        }
        
//************ Category Name Already Exist Check Ends ***************

        // function checkListinggCategorySlug($link, $category_id, $counter = 1)
        // {
        //     global $conn;
        //     $newLink = $link;
        //     do {
        //         $checkLink = mysqli_query($conn, "SELECT category_id FROM " . TBL . "categories WHERE category_slug = '$newLink' AND category_id != '$category_id'");
        //         if (mysqli_num_rows($checkLink) > 0) {
        //             $newLink = $link . '' . $counter;
        //             $counter++;
        //         } else {
        //             break;
        //         }
        //     } while (1);

        //     return $newLink;
        // }

        // $category_name1 = trim(preg_replace('/[^A-Za-z0-9]/', ' ', $category_name));
        // $category_slug = checkListinggCategorySlug($category_name1, $category_id);
    
        $sql = mysqli_query($conn, "UPDATE  " . TBL . "service_provider_categories SET category_name='" . $category_name . "', category_upt='" . $curDate . "'
        where id='" . $category_id . "'");

        if ($sql) {
            $_SESSION['status_msg'] = "Category has been Updated Successfully!!!";
            header('Location: admin-ser-pro-category.php');
            exit;
        } else {
            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
            header('Location: edit-ser-pro-category.php?row=' . $category_id);
            exit;
        }

    }
} else {

    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

    header('Location: admin-all-category.php');
    exit;
}
?>