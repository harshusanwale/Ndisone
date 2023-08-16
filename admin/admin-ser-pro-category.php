<?php
include "header.php";
?>

?>
    <!-- START -->
    <section>
        <div class="ad-com">
            <div class="ad-dash leftpadd">
                <div class="ud-cen">
				<div class="log-bor">&nbsp;</div>
				<span class="udb-inst">Service Provider Category</span>
                <div class="ud-cen-s2 hcat-cho">
                    <h2>Service Provider Category</h2>
                    <?php include "../page_level_message.php"; ?>
                    <div class="ad-int-sear">
                        <input type="text" id="pg-sear" placeholder="Search this page..">
                    </div>
                    <a href="add-ser-pro-category.php" class="db-tit-btn">Add New Service Provider Category</a>
                    <table class="responsive-table bordered" id="pg-resu">
							<thead>
								<tr>
									<th>No</th>
                                    <th>Category Name</th>
									<th>Created date</th>
                                    <th>Sub Cate</th>
									<th>Edit</th>
                                    <th>View Sub Cate</th>
									<th>Delete</th>
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
                                    <td><a href="edit-ser-pro-category.php?row=<?php echo $row['id']; ?>" class="db-list-edit">Edit</a></td>
                                    <td><a href="admin-ser-pro-subcategory.php?cat=<?php echo $row['id']; ?>" class="db-list-edit">View</a></td>
                                    <td><a href="ser-pro-category-delete.php?row=<?php echo $row['id']; ?>" class="db-list-edit">Delete</a></td>
                                </tr>
                                <?php
                                $si++;
                            }
                            ?>
							</tbody>
						</table>
                </div>
            </div>

            </div>
        </div>
    </section>
    <!-- END -->    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="js/admin-custom.js"></script> <script src="../js/select-opt.js"></script>
</body>

</html>