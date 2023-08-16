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
                            <span class="udb-inst">Delete this About us option</span>
                            <div class="log log-1">
                                <div class="login">
                                    <h4>Delete this About us option</h4>
                                    <?php include "../page_level_message.php"; ?>
                                    <?php
                                    $aboutus_id = $_GET['row'];
                                    $aboutus_a_row = getAboutusOption($aboutus_id);
                                    ?>
                                    <form action="trash_sw_about_us.php" class="sw_about_us_form" id="sw_about_us_form" name="sw_about_us_form"
                                          method="post" enctype="multipart/form-data">
                                          <input type="hidden" id="aboutus_id" value="<?php echo $aboutus_a_row['sw_about_us_id']; ?>"
                                               name="aboutus_id" class="validate">
                                        <div class="inn">
                                            <ul>
                                                <li>                                  
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="tit">Option Name*</label>
                                                                <input type="text" name="option_name" id="option_name"
                                                                       class="form-control" required value="<?php echo $aboutus_a_row['sw_about_us_name']; ?>" readonly="readonly">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="form-group">
                                                <button type="submit" name="option_submit" class="btn btn-primary">Delete
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