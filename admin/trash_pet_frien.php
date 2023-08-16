<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['pet_fri_submit'])) {
        $petfriid = $_POST["petfriid"];

        //Pet friendly  Delete Part Starts        
        $petfri_qry =
            " DELETE FROM  " . TBL . "pet_friendly  WHERE pet_fri_id='" . $petfriid . "'";

        $petfri_res = mysqli_query($conn,$petfri_qry);


        if ($petfri_res) {

            $_SESSION['status_msg'] = "Pet friendly Option has been Permanently Deleted!!!";


            header('Location: admin_all_pet_frie.php');
        } else {

            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

            header('Location: delete_pet_frien?row=' . $petfriid);
        }
        //Pet friendly Delete Part Ends   
    }
}else{
        $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

        header('Location: admin_all_pet_frie.php');
}