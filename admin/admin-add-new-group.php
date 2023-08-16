<?php
include "header.php";
?>

<?php if($footer_row['admin_listing_show'] != 1 || $admin_row['admin_category_options'] != 1){
    header("Location: profile.php");
}
?>
    <!-- START -->
    <section>
        <div class="ad-com">
            <div class="ad-dash leftpadd">
                 <section class="login-reg">
		<div class="container">
			<div class="row">
                <div class="login-main add-list add-ncate">
                     <div class="log-bor">&nbsp;</div>
                    <span class="udb-inst">New Registration Group</span>
                    <div class="log log-1">
                        <div class="login">
                            <h4>Add New Registration Group</h4>
                            <?php include "../page_level_message.php"; ?>
                            <span class="add-list-add-btn reg-group-add-btn" data-toggle="tooltip" title="Click to make additional category">+</span>
							<span class="add-list-rem-btn reg-group-rem-btn" data-toggle="tooltip" title="Click to remove last category">-</span>
                             <form name="category_form" id="category_form" method="post" action="insert-reg-group.php" class="cre-dup-form cre-dup-form-show" enctype="multipart/form-data">
                                 <ul>
                                     <li>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <input type="text" id="group_name" name="group_name[]" class="form-control" placeholder="Registration Group name *" required>
                                                </div>
                                            </div>
                                        </div>
                                     </li>
                                 </ul>
                                <button type="submit" name="reg_group_submit" class="btn btn-primary">Submit</button>
                            </form>
                            <div class="col-md-12">
                                    <a href="admin-all-category.php" class="skip">Go to All  Registration Group>></a>
                                </div>

                        </div>
                    </div>
                </div>
			</div>
		</div>
	</section>

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
    <script src="js/admin-custom.js"></script> 
<script src="../js/select-opt.js"></script>
</body>

</html>