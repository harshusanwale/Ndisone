<?php
include "header.php";
?>

<!-- <?php if($footer_row['admin_listing_show'] != 1 || $admin_row['admin_category_options'] != 1){
    header("Location: profile.php");
}
?> -->
    <!-- START -->
    <section>
        <div class="ad-com">
            <div class="ad-dash leftpadd">
                 <section class="login-reg">
		<div class="container">
			<div class="row">
                <div class="login-main add-list add-ncate">
                     <div class="log-bor">&nbsp;</div>
                    <span class="udb-inst">Edit Registration Group</span>
                    <div class="log log-1">
                        <div class="login">
                            <h4>Edit Registration Group</h4>
                            <?php include "../page_level_message.php"; ?>
                            <?php
                            $reg_group_id = $_GET['row'];
                            $reg_group_a_row = getRegGroup($reg_group_id);
                            ?>
                             <form name="reg_group_form" id="reg_group_form" method="post" action="update_reg_group.php" class="cre-dup-form cre-dup-form-show" enctype="multipart/form-data">
                             <input type="hidden" class="validate" id="group_id" name="group_id" value="<?php echo $reg_group_a_row['id']; ?>" required="required">
  
                             <ul>
                                     <li>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group"> 
                                                  <input type="text" id="group_name" name="group_name" class="form-control" placeholder="Registration Group name *" required value="<?php echo $reg_group_a_row['name'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                     </li>
                                 </ul>
                                <button type="submit" name="reg_group_submit" class="btn btn-primary">Submit</button>
                            </form>
                            <div class="col-md-12">
                                    <a href="admin-all-regis-group.php" class="skip">Go to All  Registration Group>></a>
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