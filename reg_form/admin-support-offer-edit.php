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
                            <span class="udb-inst">Edit this Support offer</span>
                            <div class="log log-1">
                                <div class="login">
                                    <h4>Edit this Support offer</h4>
                                    <?php include "../page_level_message.php"; ?>
                                    <?php
                                    $supp_offerid = $_GET['row'];
                                    $supp_offer_a_row = getSupportOffer($supp_offerid);
                                    ?>
                                    <form action="update_support_offer.php" class="supp_offer_form" id="supp_offer_form" name="supp_offer_form"
                                          method="post" enctype="multipart/form-data">
                                          <input type="hidden" id="sup_off_id" value="<?php echo $supp_offer_a_row['supp_offer_id']; ?>"
                                               name="sup_off_id" class="validate">
                                        <div class="inn">
                                            <ul>
                                                <li>                                  
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="tit">Offer Title*</label>
                                                                <input type="text" name="offer_title" id="offer_title"
                                                                       class="form-control" required value="<?php echo $supp_offer_a_row['offer_title']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="tit">Offer Name*</label>  
                                                                <input type="text" required="required"  id="offer_name" class="form-control"  name="offer_name" value="<?php echo $supp_offer_a_row['offer_name']; ?>">                                  
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="form-group">
                                                <button type="submit" name="offer_submit" class="btn btn-primary">Update
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