<?php
include "header.php";
?>
<!-- <?php if($footer_row['admin_listing_show'] != 1 || $admin_row['admin_country_options'] != 1){
    header("Location: profile.php");
}
?> -->
    <!-- START -->
    <section>
        <div class="ad-com">
            <div class="ad-dash leftpadd">
                <div class="ud-cen">
				<div class="log-bor">&nbsp;</div>
				<span class="udb-inst">Qualifications/Certificates/Skills</span>
                <div class="ud-cen-s2">
                    <h2>All Qualifications</h2>
                    <?php include "../page_level_message.php"; ?>
                    <div class="ad-int-sear">
                        <input type="text" id="pg-sear" placeholder="Search this page..">
                    </div>
                    <a href="admin-add-qualifications.php" class="db-tit-btn">Add new</a>
                    <table class="responsive-table bordered" id="pg-resu">
							<thead>
								<tr>
									<th>No</th>
                                    <th>Type</th>
                                    <th>Name</th>
									<th>Created date</th>
									<th>Status</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
                            <?php
                            $qi = 1;
                            foreach (getAllQualifications() as $row) {

                                $qualifications_id = $row['qualifications_id'];

                                // $country_listing_count = getCountCountryListing($qualifications_id);
                                //$country_listing_count = 'Active';

                                ?>
                                <tr>
                                    <td><?php echo $qi; ?></td>
                                    <td><b class="db-list-rat"><?php echo $row['type']; ?></b></td>
                                    <td><b class="db-list-rat"><?php echo $row['qualifications_name']; ?></b></td>
                                    <td><?php echo dateFormatconverter($row['created_at']); ?></td>
                                    <td><span class="db-list-ststus" data-toggle="tooltip"
                                              title="Total listings in this category"><?php if($row['status'] == 1){ echo "Active"; }else{ echo "In-active";}  ?></span></td>
                                    <td><a href="admin-qualifications-edit.php?row=<?php echo $row['qualifications_id']; ?>" class="db-list-edit">Edit</a></td>
                                    <td><a href="admin-qualifications-delete.php?row=<?php echo $row['qualifications_id']; ?>" class="db-list-edit">Delete</a></td>
                                </tr>
                                <?php
                               $qi++;
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