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
                            <span class="udb-inst">Edit this Range Option</span>
                            <div class="log log-1">
                                <div class="login">
                                    <h4>Edit this Range Option</h4>
                                    <?php include "../page_level_message.php"; ?>
                                    <?php
                                    $rangeid = $_GET['row'];
                                    $range_a_row = getRange($rangeid);
                                    ?>
                                    <form action="update-age-range.php" class="range_form" id="range_form" name="range_form"
                                          method="post" enctype="multipart/form-data">
                                          <input type="hidden" id="rangeid" value="<?php echo $range_a_row['age_range_id']; ?>"
                                               name="rangeid" class="validate">
                                        <div class="inn">
                                            <ul>
                                                <li>                                  
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="tit">Age Range Name*</label>
                                                                <input type="text" name="range" id="range"
                                                                       class="form-control" required value="<?php echo $range_a_row['age_range_name']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="tit">Age Range max</label>
                                                                <input type="text" name="range_max" id="age_range"
                                                                       class="form-control" required value="<?php echo $range_a_row['range_max']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="tit">Age Range min</label>
                                                                <input type="text" name="range_min" id="age_range"
                                                                       class="form-control" required value="<?php echo $range_a_row['range_min']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="form-group">
                                                <button type="submit" name="range_submit" class="btn btn-primary">Update
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