<?php
include "header.php";

include "facebook_config.php"; //Facebook Config File

include "google_config.php"; //Facebook Config File


if (isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])) {

    header("Location: dashboard");
}




// if (!isset($_COOKIE['user_id'])) {
//     echo "'user_id' is not Created!";
//     unset($_COOKIE['user_id']);
//    // die;
// }else{
//     $user_id = $_COOKIE['user_id'];
//     // $reg_status =  $_COOKIE['reg_status'];

// $login = mysqli_query($conn, "SELECT * FROM " . TBL . "users  WHERE user_id = '$user_id' ");
// $user_row = mysqli_fetch_array($login);
// if($reg_status != $user_row['register_status']){
// header('Location: login?login=register');
// exit();   
// }
// }

?>
<style>
input, select {
 padding: 5px;
 border: 1px solid #ccc;
}
.colorBackground.empty {
 background-color: white;
}

/* CSS for non-empty input fields */
.colorBackground.has-value {
 background-color: #66ff99;
}

</style>

<!-- START -->
<!--PRICING DETAILS-->
<section class="<?php if ($footer_row['admin_language'] == 2) {
    echo "lg-arb";
} ?> login-reg">
    <div class="container">
        <div class="row">
            <div class="add-list-ste">
                <div class="add-list-ste-inn">
                    <ul>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="login-main add-list">
                <div class="log-bor">&nbsp;</div>
                <span class="steps"><?php echo $BIZBOOK['STEP2']; ?></span>
                <div class="log">
                    <div class="login">
                        <h4>Registration Details</h4>
                        <?php
                        // if (isset($_SESSION['register_status_msg'])) {
                        //     include "page_level_message.php";
                        //     unset($_SESSION['register_status_msg']);
                        // }
                        ?>
                        <form action="register_update_sp_form.php" class="second_form" id="second_form"
                              name="second_form" method="post" enctype="multipart/form-data">
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="number" name="register_num" id="register_num"class="colorBackground form-control"
                                                placeholder="Registration Number" required="required">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="list_type" id="list_type" class="colorBackground form-control"
                                                >
                                            <option value="" >Listing Type </option>
                                                <option  value="0">Company/Orgnaisation</option>
                                                <option  value="1">Personal /Individual</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="reg_type" id="reg_type" class="colorBackground form-control"
                                                required="required">
                                            <option value="" >You are registerting as </option>
                                                <option  value="0">NDIS Provider</option>
                                                <option  value="1">NDIS Participant</option>
                                                <option  value="2">Support Worker</option>
                                                <option  value="3">Support Coordinator</option>
                                                <option  value="4">Real Estate Agency</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="company_name" name="company_name" type="text"
                                                required="required" class="colorBackground form-control"
                                                placeholder="Company Name ">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="position" id="position"class="colorBackground form-control"
                                                placeholder="Your Position" required="required">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select onChange="getSubCategory(this.value);" name="category_id" id="category_id" class="colorBackground form-control" required="required">
                                            <option value="">Select Category</option>
                                            <?php
                                            foreach (getAllCategories() as $categories_row) {
                                                ?>
                                                <option
                                                    value="<?php echo $categories_row['category_id']; ?>"><?php echo $categories_row['category_name']; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select  data-placeholder="Select Sub Category" name="sub_category_id[]" id="sub_category_id" multiple class="colorBackground chosen-select form-control" required="required">
                                            <option value="">Select Sub Category</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED END-->
                            <!-- <div class="row">
                            <div class="col-md-12">
                            <div class="form-group ">

                            </div>
                            </div>
                                </div>  -->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Provider Stamp</label>
                                        <div class="fil-img-uplo">
                                            <span class="dumfil">Upload a file</span>
                                            <input type="file" name="provider_stamp" accept="image/*,.jpg,.jpeg,.png" class="form-control valid" id="provider_stamp">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" name="ser_provider_detail" class="btn btn-primary">Submit Details</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--END PRICING DETAILS-->



<?php
include "footer.php";
?>
<script>
const customInputs = document.querySelectorAll('.colorBackground');
function handleInputChange(event) {
const inputField = event.target;
if (inputField.value.trim() === '') {
inputField.classList.add('empty');
inputField.classList.remove('has-value');
} else {
inputField.classList.add('has-value');
inputField.classList.remove('empty');
}
}

customInputs.forEach(input => {
input.addEventListener('input', handleInputChange);
// Check initial values on page load
if (input.value.trim() === '') {
input.classList.add('empty');
} else {
input.classList.add('has-value');
}
});

const workAvailSelect = document.getElementById('work_avail');

function handleSelectChange() {
if (workAvailSelect.value.trim() === '') {
workAvailSelect.classList.add('empty');
} else {
workAvailSelect.classList.remove('empty');
}
}

workAvailSelect.addEventListener('change', handleSelectChange);
// Check initial value on page load
if (workAvailSelect.value.trim() === '') {
workAvailSelect.classList.add('empty');
}
</script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/select-opt.js"></script>
<script type="text/javascript">var webpage_full_link = '<?php echo $webpage_full_link;?>';</script>
<script type="text/javascript">var login_url = '<?php echo $LOGIN_URL;?>';</script>
<script src="js/custom.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/custom_validation.js"></script>

<script>
    function getSubCategory(val) {
        $.ajax({
            type: "POST",
            url: "sub_category_process.php",
            data: 'category_id=' + val,
            success: function (data) {
                $("#sub_category_id").html(data);
                $('#sub_category_id').trigger("chosen:updated");
            }
        });
    }
</script>

<?php
if (isset($_GET["page"])) {
    ?>
    <?php
    if (isset($_POST['SubmitButton'])) { // Check if form was submitted

        if (!empty($_FILES['inputText']['name'])) {
            $file = rand(1000, 100000) . $_FILES['inputText']['name'];
            $file_loc = $_FILES['inputText']['tmp_name'];
            $file_size = $_FILES['inputText']['size'];
            $file_type = $_FILES['inputText']['type'];
            $folder = "images/listings/";
            $new_size = $file_size / 1024;
            $new_file_name = strtolower($file);
            $event_image = str_replace(' ', '-', $new_file_name);
            //move_uploaded_file($file_loc, $folder . $event_image);
            $inputText1 = compressImage($event_image, $file_loc, $folder, $new_size);
            $inputText = $inputText1;
        }
    }
    ?>
    <form action="#" enctype="multipart/form-data" method="post">
        <input type="file" name="inputText"/>
        <input type="submit" name="SubmitButton"/>
    </form>
    <?php
}
?>
</body>
</html>