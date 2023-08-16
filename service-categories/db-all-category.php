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
        <span class="udb-inst">SERVICE CATEGORY</span>
        <?php include('../config/user_activation_checker.php'); ?>
        <div class="ud-cen-s2">
            <h2>Category Details</h2>
            <?php include "../page_level_message.php"; ?>
            <!-- <a href="create-job" class="db-tit-btn"><?php echo $BIZBOOK['ADD_NEW_JOB']; ?></a> -->
            <table class="responsive-table bordered">
                <thead>
                <tr>
                    <th><?php echo $BIZBOOK['S_NO']; ?></th>
                    <th>Category Name</th>
                    <th>Created date</th>
                    <th>Sub Cate</th>
                    <th>View Sub Cate</th>
                    <!-- <th><?php echo $BIZBOOK['VIEWS']; ?></th>
                    <th><?php echo $BIZBOOK['EDIT']; ?></th>
                    <th><?php echo $BIZBOOK['DELETE']; ?></th>
                    <th><?php echo $BIZBOOK['PREVIEW']; ?></th> -->
                </tr>
                </thead>
                <tbody>
                <?php
                    $si=1;
                    foreach (getAllProCategory() as $row) {
                        $category_id = $row['id'];
                        $category_sub_category_count = getCountProSubCategoryCategory($category_id);
                        ?>
                        <tr>
                            <td><?php echo $si; ?></td>
                            <td><b class="db-list-rat"><?php echo $row['category_name']; ?></b></td>
                            <td><?php echo dateFormatconverter($row['category_cdt']); ?></td>
                            <td><span class="db-list-ststus"><?php echo $category_sub_category_count; ?></span></td>
                            <td><a href="db-all-subcategory.php?cat=<?php echo $row['id']; ?>" class="db-list-edit">View</a></td>
                            <!-- <td><a href="edit-ser-pro-category.php?row=<?php echo $row['id']; ?>" class="db-list-edit">Edit</a></td>
                            <td><a href="admin-ser-pro-subcategory.php?cat=<?php echo $row['id']; ?>" class="db-list-edit">View</a></td>
                            <td><a href="ser-pro-category-delete.php?row=<?php echo $row['id']; ?>" class="db-list-edit">Delete</a></td> -->
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