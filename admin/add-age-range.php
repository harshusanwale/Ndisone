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
                            <span class="udb-inst">Add new Range Option</span>
                            <div class="log log-1">
                                <div class="login">
                                    <h4>Add New Range Option</h4>
                                    <?php include "../page_level_message.php"; ?>
                                    <span class="add-list-add-btn agerange-add-btn" data-toggle="tooltip" title="Click to make additional range">+</span>
						        	<span class="add-list-rem-btn agerange-rem-btn" data-toggle="tooltip" title="Click to remove last range">-</span>
                                    <form action="insert-age-range.php" class="range_form" id="range_form" name="range_form"
                                          method="post" enctype="multipart/form-data">
                                        <div class="inn">
                                            <ul>
                                                <li>                                  
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="tit">Age Range Name*</label>
                                                                <input type="text" name="range[]" id="range"
                                                                       class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="tit">Age Range max</label>
                                                                <input type="text" name="range_max[]" id="age_range"
                                                                       class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="tit">Age Range min</label>
                                                                <input type="text" name="range_min[]" id="age_range"
                                                                       class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="form-group">
                                                <button type="submit" name="range_submit" class="btn btn-primary">Submit
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
<!-- <script src="../js/select-opt.js"></script> -->
<script src="js/admin-custom.js"></script>
<!-- <script src="../js/select-opt.js"></script> -->
<script src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">    
</script>
</body>

</html>