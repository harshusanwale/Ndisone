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
                            <span class="udb-inst">Edit this Support Preference Option</span>
                            <div class="log log-1">
                                <div class="login">
                                    <h4>Edit this Support Preference Option</h4>
                                    <?php include "../page_level_message.php"; ?>
                                    <?php
                                    $supppreid = $_GET['row'];
                                    $supppre_a_row = getSuppPre($supppreid);
                                    ?>
                                    <form action="update_supp_prefrence.php" class="supp_prefrence_form" id="supp_prefrence_form" name="supp_prefrence_form"
                                          method="post" enctype="multipart/form-data">
                                          <input type="hidden" id="supppreid" value="<?php echo $supppre_a_row['supp_pre_id']; ?>"
                                               name="supppreid" class="supppreid">
                                        <div class="inn">
                                            <ul>
                                                <li>                                  
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="tit">Support Preference Option*</label>
                                                                <input type="text" name="supp_pref" id="supp_pref"
                                                                       class="form-control" required value="<?php echo $supppre_a_row['support_prefer_name']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="form-group">
                                                <button type="submit" name="supp_pref_submit" class="btn btn-primary">Update
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