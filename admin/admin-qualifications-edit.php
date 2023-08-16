<?php
include "header.php";
?>
<?php if ($footer_row['admin_listing_show'] != 1 ) {
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
                            <span class="udb-inst">Edit Qualifications</span>
                            <div class="log log-1">
                                <div class="login">
                                    <h4>Edit this Qualifications</h4>
                                    <?php include "../page_level_message.php"; ?>
                                    <?php
                                    $qualifications_id = $_GET['row'];
                                    $row = getQualifications($qualifications_id);

                                    ?>
                                    <form name="qualifications_form" id="qualifications_form" method="post"
                                          action="update_qualifications.php" enctype="multipart/form-data"
                                          class="cre-dup-form cre-dup-form-show">
                                        <input type="hidden" class="validate" id="qualifications_id" name="qualifications_id"
                                               value="<?php echo $row['qualifications_id']; ?>" required="required">

                                        <ul>
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <!-- <input type="text" name="qualifications_name[]" class="form-control" placeholder="qualifications name *" required> -->
                                                            <select  name="type" class="form-control"  required>
                                                            <option value="">Select Type</option>
                                                            <option <?php if ($row['type'] == "Certificates") { echo "selected"; } ?> value="Certificates">Certificates</option>
                                                            <option <?php if ($row['type'] == "Qualifications") { echo "selected"; } ?> value="Qualifications">Qualifications</option>
                                                            <option <?php if ($row['type'] == "Skills") { echo "selected"; } ?> value="Skills">Skills</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>

                                        <ul>
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" name="qualifications_name"
                                                                   value="<?php echo $row['qualifications_name']; ?>"
                                                                   class="form-control" placeholder="qualifications name *"
                                                                   required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <button type="submit" name="qualifications_submit" class="btn btn-primary">Update
                                        </button>
                                    </form>
                                    <div class="col-md-12">
                                        <a href="admin-all-qualifications.php" class="skip">Go to All qualifications >></a>
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