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
                            <span class="udb-inst">Add Pet friendly option</span>
                            <div class="log log-1">
                                <div class="login">
                                    <h4>Add Pet friendly option</h4>
                                    <?php include "../page_level_message.php"; ?>
                                    <span class="add-list-add-btn petfri-add-btn" data-toggle="tooltip" title="Click to make additional pet friendly">+</span>
						        	<span class="add-list-rem-btn petfri-rem-btn" data-toggle="tooltip" title="Click to remove last pet friendly">-</span>
                                    <form action="insert_pet_friend.php" class="pet_friendly_form" id="pet_friendly_form" name="pet_friendly_form"
                                          method="post" enctype="multipart/form-data">
                                        <div class="inn">
                                            <ul>
                                                <li>                                  
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="tit">Pet friendly option*</label>
                                                                <input type="text" name="pet_frie[]" id="pet_frie"
                                                                       class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="form-group">
                                                <button type="submit" name="pet_frie_submit" class="btn btn-primary">Submit
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