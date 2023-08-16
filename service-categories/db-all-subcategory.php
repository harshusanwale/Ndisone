<?php
include "ser-category-info.php";
include "../header.php";

if (file_exists('../config/user_authentication.php')) {
    include('../config/user_authentication.php');
}

if (file_exists('../config/general_user_authentication.php')) {
    include('../config/general_user_authentication.php');
}

if (file_exists('../config/job_page_authentication.php')) {
    include('../config/ser_category_page_authentication.php');
}

include "../dashboard_left_pane.php";


?>
    <!--CENTER SECTION-->
    <div class="ud-main">
   <div class="ud-main-inn ud-no-rhs">
    <div class="ud-cen">
        <div class="log-bor">&nbsp;</div>
        <span class="udb-inst">SERVICE SUB CATEGORY</span>
        <?php include('../config/user_activation_checker.php'); ?>
        <div class="ud-cen-s2">
            <h2>Sub Category Details</h2>
            <?php include "../page_level_message.php"; ?>
            <!-- <a href="create-job" class="db-tit-btn"><?php echo $BIZBOOK['ADD_NEW_JOB']; ?></a> -->
            <table class="responsive-table bordered">
                <thead>
                <tr>
                    <th><?php echo $BIZBOOK['S_NO']; ?></th>
                    <th>Sub Category Name</th>
                    <th>Main Category Name</th>
                    <th>Created date</th>
                    <!-- <th><?php echo $BIZBOOK['VIEWS']; ?></th>
                    <th><?php echo $BIZBOOK['EDIT']; ?></th>
                    <th><?php echo $BIZBOOK['DELETE']; ?></th>
                    <th><?php echo $BIZBOOK['PREVIEW']; ?></th> -->
                </tr>
                </thead>
                <tbody>
                <?php
                    $si=1;

                    if(isset($_GET['cat'])){
                        $qry = getProCategorySubCategories($_GET['cat']);

                    }else{
                        $qry = getAllProSubCategories();
                    }
                    foreach ($qry as $row) {
                            
                        $sub_category_id = $row['id'];
                        $category_id = $row['category_id'];

                        // $category_listing_count = getCountSubCategoryListing($sub_category_id);
                        
                        $cat_sql_row = getProCategory($category_id);

                        ?>
                        <tr>
                            <td><?php echo $si; ?></td>
                            <td><b class="db-list-rat"><?php echo $row['sub_category_name']; ?></b></td>
                            <td><b class="db-list-rat"><?php echo $cat_sql_row['category_name']; ?></b></td>
                            <td><?php echo dateFormatconverter($row['sub_category_cdt']); ?></td>
                        </tr>
                        <?php
                        $si++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
include "../dashboard_right_pane.php";
?>