<?php
include "header.php";

if (file_exists('config/user_authentication.php')) {
    include('config/user_authentication.php');
}

if (file_exists('config/general_user_authentication.php')) {
    include('config/general_user_authentication.php');
}

if (file_exists('config/listing_page_authentication.php')) {
    include('config/listing_page_authentication.php');
}
//To check the listings count with current plan starts

$plan_type_listing_count = $user_plan_type['plan_type_listing_count'];
$listing_count_user = getCountUserListing($_SESSION['user_id']);

if($listing_count_user >= $plan_type_listing_count){

    $_SESSION['status_msg'] = $BIZBOOK['LISTINGS_LIMIT_EXCEED_MESSAGE'];

    header('Location: db-all-listing');
}
//To check the listings count with current plan ends

//Get & Process Listing Data
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {

if (isset($_POST['listing_submit'])) {


// Service Provided Details
    $_SESSION['location'] = $_POST["location"];
    // $_SESSION['service_1_price'] = $_POST["service_1_price"];
    // $_SESSION['service_1_detail'] = $_POST["service_1_detail"];
    // $_SESSION['service_1_view_more'] = $_POST["service_1_view_more"];


    // ************************  Offer Image Upload Starts  **************************

    // $all_service_1_image = $_FILES['service_1_image'];
    // $all_service_1_image2 = $_FILES['service_1_image']['name'];

    // for ($k = 0; $k < count($all_service_1_image2); $k++) {

    //     if (!empty($_FILES['service_1_image']['name'][$k])) {
    //         $file = rand(1000, 100000) . $_FILES['service_1_image']['name'][$k];
    //         $file_loc = $_FILES['service_1_image']['tmp_name'][$k];
    //         $file_size = $_FILES['service_1_image']['size'][$k];
    //         $file_type = $_FILES['service_1_image']['type'][$k];
    //         $allowed = array("image/jpeg", "image/pjpeg", "image/png", "image/gif", "image/webp", "image/svg", "application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template");
    //         if(in_array($file_type, $allowed)) {
    //             $folder = "images/services/";
    //             $new_size = $file_size / 1024;
    //             $new_file_name = strtolower($file);
    //             $event_image = str_replace(' ', '-', $new_file_name);
    //             //move_uploaded_file($file_loc, $folder . $event_image);
    //             $service_1_image1[] = compressImage($event_image, $file_loc, $folder, $new_size);
    //         }else{
    //             $service_1_image1[] = '';
    //         }
    //     }
    //     if($service_1_image1 != NULL){
    //         $service_1_image = implode(",", $service_1_image1);
    //         }else{
    //         $service_1_image = '';
    //         }
    // }
// ************************  Offer Image Upload ends  **************************
    // $_SESSION['service_1_image'] = $service_1_image;

}


?>
<style>
 .Monday,
.Tuesday,
.Wednesday,
.Thursday,
.Friday,
.Saturday,
.Sunday {
display: none;
}

.dinon {

display: block;

}

.diBlo {

display: none;

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
                        <li>
                            <a href="add-listing-step-1">
                                <span><?php echo $BIZBOOK['STEP1']; ?></span>
                                <b><?php echo $BIZBOOK['BASIC_INFO']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="add-listing-step-2">
                                <span><?php echo $BIZBOOK['STEP2']; ?></span>
                                <b><?php echo $BIZBOOK['SERVICES']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="add-listing-step-3">
                                <span><?php echo $BIZBOOK['STEP3']; ?></span>
                                <b><?php echo $BIZBOOK['SER-LOCATION']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="add-listing-step-4" class="act">
                                <span><?php echo $BIZBOOK['STEP4']; ?></span>
                                <b><?php echo $BIZBOOK['WPR_HOURS']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="#!">
                                <span><?php echo $BIZBOOK['STEP5']; ?></span>
                                <b><?php echo $BIZBOOK['OTHER']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="#!">
                                <span><?php echo $BIZBOOK['STEP6']; ?></span>
                                <b><?php echo $BIZBOOK['DONE']; ?></b>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="login-main add-list">
                <div class="log-bor">&nbsp;</div>
                <span class="steps"><?php echo $BIZBOOK['STEP4']; ?></span>
                <div class="log add-list-map">
                    <div class="login add-list-map">
                        <form action="add-listing-step-new-5.php" class="listing_form_4" id="listing_form_4"
                              name="listing_form_4" method="post" enctype="multipart/form-data">
                              
                              <input id="location" name="location" type="hidden"
                                   value="<?php echo $_SESSION['location']; ?>"
                                   required="required" class="validate">

                            <!--FILED START-->
                            <h4>Working Hours</h4>
                            <?php
                                $days_1 = $_SESSION['days'];

                                
                                $days_count = isset($days_1) ? count($days_1) : 0;
               
                                if($days_count == 2){
                                $si1 = 1;

                                foreach(getAllAvailTime() as $row2) {
                                   
                                $isChecked = isset($days_1[$row2['avail_time_name']]);
                                
                                $daySlots = $isChecked ? $days_1[$row2['avail_time_name']]['day'] : "";
                
                                $timeSlots = $isChecked ? $days_1[$row2['avail_time_name']]['data'] : [];

                                ?>
                                <ul>                    
                                <li>
                                    <div class="col-md-12">
                                        <div class="form-group chbox">
                                            <input type="checkbox" name="days[<?php echo  $row2['avail_time_name']?>][day]" value="<?php echo  $row2['avail_time_name']?>"  <?php if($daySlots == $row2['avail_time_name'] ) {echo  'checked' ; }else{echo '' ;}?> class="feature_check" id="<?php echo  $row2['avail_time_name'].$si1 ;?>" />
                                            <label for="<?php echo  $row2['avail_time_name'].$si1 ;?>"><?php echo  $row2['avail_time_name']?></label>
                                            <div class="<?php echo $row2['avail_time_name']?> <?php if($daySlots == $row2['avail_time_name']){echo "dinon";}?>">
                                                <span class="add-list-add-btn slots-add-btn slots-add" data-toggle="tooltip" title="Click to make additional Time Slot field">+</span>
                                                <span class="add-list-rem-btn slots-rem-btn slots-rev" data-toggle="tooltip" title="Click to remove last Time Slot field">-</span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                     $i = 0;
                                    foreach ($timeSlots as $timeSlot) {
                                    echo  '<li class="removeable">';
                                    echo  '<div class="row">';
                                    echo  '<div class="col-md-2">';
                                    echo  '</div>';
                                    echo  '<div class="col-md-4">';
                                    echo  '<input type="time" class="form-control" name="days['.$daySlots.'][data]['.$i.'][from]" value="' . $timeSlot['from'] . '">';
                                    echo  '</div>';
                                    echo  '<div class="col-md-4">';
                                    echo  '<input type="time" class="form-control" name="days['.$daySlots.'][data]['.$i.'][to]" value="' . $timeSlot['to'] . '">';
                                    echo  '</div>';
                                    echo  '</div>';
                                    echo  '</li>';
                                    $i++;
                                   }?>
                                </li>                            
                            </ul>
                            <?php 
                             $si1++ ;} 
                           }else{ ?>
                            <?php 
                             $si = 1;
                            foreach(getAllAvailTime() as $row) {?>
                            <ul>                    
                            <li>
                                <div class="col-md-12">
                                    <div class="form-group chbox">
                                        <input type="checkbox" name="days[<?php echo  $row['avail_time_name']?>][day]" value="<?php echo  $row['avail_time_name']?>" class="feature_check" id="<?php echo  $row['avail_time_name'].$si ;?>" />
                                        <label for="<?php echo  $row['avail_time_name'].$si ;?>"><?php echo  $row['avail_time_name']?></label>
                                        <div class="<?php echo  $row['avail_time_name']?>">
                                            <span class="add-list-add-btn slots-add-btn slots-add" data-toggle="tooltip" title="Click to make additional Time Slot field">+</span>
                                            <span class="add-list-rem-btn slots-rem-btn slots-rev" data-toggle="tooltip" title="Click to remove last Time Slot field">-</span>
                                        </div>
                                    </div>
                                </div>
                            </li>                            
                        </ul>
                        <?php $si++;
                            }  }?>
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="add-listing-step-3">
                                        <button type="button" class="btn btn-primary"><?php echo $BIZBOOK['PREVIOUS']; ?></button>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="listing_submit" class="btn btn-primary"><?php echo $BIZBOOK['NEXT']; ?></button>
                                </div>
                                <div class="col-md-12">
                                    <a href="add-listing-step-new-5" class="skip"><?php echo $BIZBOOK['SKIP_THIS']; ?> >></a>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--PROGRESSBAR START-->
                            <div class="progress biz-prog">
                                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width:80%">80%</div>
                            </div>
                            <!--PROGRESSBAR END-->
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
<?php
include "google_address_api.php";
?>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript">var webpage_full_link ='<?php echo $webpage_full_link;?>';</script>
<script type="text/javascript">var login_url ='<?php echo $LOGIN_URL;?>';</script>
<script type="text/javascript" src="js/imageuploadify.min.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('input[type="file"]').imageuploadify();
    })
</script>
<script>
    $(document).ready(function() {
        $('input[type="checkbox"]').click(function() {
            var inputValue = $(this).attr("value");
            $("." + inputValue).toggle();
            var currentUl = $(this).closest("ul");
            var currentLi = currentUl.closest("li");
            if (currentUl.children("li").length > 1) {
                currentUl.find("li[class=removeable").remove();
            }
        });
    });
</script>
</body>

</html>