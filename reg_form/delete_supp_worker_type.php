<?php
include "header.php";
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
                            <span class="udb-inst">Delete this Support worker type</span>
                            <div class="log log-1">
                                <div class="login">
                                    <h4>Delete this  Support worker type</h4>
                                    <?php include "../page_level_message.php"; ?>
                                    <?php
                                    $sw_type_id = $_GET['row'];
                                    $sw_type_a_row = getSWType($sw_type_id);
                                    ?>
                                    <form action="trash_supp_worker_type.php" class="supp_worker_type_form" id="supp_worker_type_form" name="supp_worker_type_form"
                                          method="post" enctype="multipart/form-data">
                                          <input type="hidden" id="sw_type_id" value="<?php echo $sw_type_a_row['supp_worker_type_id']; ?>"
                                               name="sw_type_id" class="validate">
                                        <div class="inn">
                                            <ul>
                                                <li>                                  
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="tit">Type Name*</label>
                                                                <input type="text" name="type_name" id="type_name"
                                                                       class="form-control" required value="<?php echo $sw_type_a_row['type_name']; ?>" readonly="readonly">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="form-group">
                                                <button type="submit" name="type_submit" class="btn btn-primary">Delete
                                                    Now
                                                </button>
                                            </div>
                                        </div>
                                    </form>

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
<script src="../js/select-opt.js"></script>
<script src="js/admin-custom.js"></script>
<script src="../js/select-opt.js"></script>
<script src="ckeditor/ckeditor.js"></script>
<!-- <script>
    CKEDITOR.replace('job_description');
</script>
<script>
    function getJobSubCategory(val) {
        $.ajax({
            type: "POST",
            url: "../job_sub_category_process.php",
            data: 'category_id=' + val,
            success: function (data) {
                $("#sub_category_id").html(data);
                $('#sub_category_id').trigger("chosen:updated");
            }
        });
    }
</script> -->
<!-- <script>
    var slider = document.getElementById("salsli");
    var output = document.getElementById("salout");
    output.innerHTML = slider.value;

    slider.oninput = function () {
        output.innerHTML = this.value + "K";
    }
</script>
<script>
    function updateTextInput(val) {
        document.getElementById('textInput').value = val;
    }
</script> -->
</body>

</html>