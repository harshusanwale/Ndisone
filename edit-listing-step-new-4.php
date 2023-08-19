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

//Get & Process Listing Data

if ($_GET['row'] == NULL && empty($_GET['row'])) {

    header("Location: db-all-listing");
}

if (!isset($_SESSION['listing_codea']) || empty($_SESSION['listing_codea'])) {
    $listing_codea = $_GET['row'];
} else {
    $listing_codea = $_SESSION['listing_codea'];
}

?>
<!-- START -->
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
                            <a href="edit-listing-step-new-1?row=<?php echo $listing_codea; ?>">
                                <span><?php echo $BIZBOOK['STEP1']; ?></span>
                                <b><?php echo $BIZBOOK['BASIC_INFO']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="edit-listing-step-new-2?row=<?php echo $listing_codea; ?>">
                                <span><?php echo $BIZBOOK['STEP2']; ?></span>
                                <b>Service Offered</b>
                            </a>
                        </li>
                        <li>
                            <a href="edit-listing-step-new-3?row=<?php echo $listing_codea; ?>">
                                <span><?php echo $BIZBOOK['STEP3']; ?></span>
                                <b>Locations</b>
                            </a>
                        </li>
                        <li>
                            <a href="edit-listing-step-new-4?row=<?php echo $listing_codea; ?>" class="act">
                                <span><?php echo $BIZBOOK['STEP4']; ?></span>
                                <b>Work Hours</b>
                            </a>
                        </li>
                        <li>
                            <a href="edit-listing-step-new-5?row=<?php echo $listing_codea; ?>">
                                <span><?php echo $BIZBOOK['STEP5']; ?></span>
                                <b><?php echo $BIZBOOK['OTHER']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="edit-listing-step-new-6">
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
                        <?php
                        $listings_a_row = getListing($listing_codea);
                        ?>
                        <form action="listing_update_new.php" class="listing_form_4" id="listing_form_4"
                              name="listing_form_4" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="src_path" value="edit-4"
                                   name="src_path" class="validate">
                            <input type="hidden" id="listing_codea" value="<?php echo $listing_codea; ?>"
                                   name="listing_codea" class="validate">
                            <input type="hidden" id="listing_code"
                                   value="<?php echo $listings_a_row['listing_code']; ?>"
                                   name="listing_code" class="validate">
                            <input type="hidden" id="listing_id" value="<?php echo $listings_a_row['listing_id']; ?>"
                                   name="listing_id" class="validate">
                            <!-- <input type="hidden" id="gallery_image_old"
                                   value="<?php echo $listings_a_row['gallery_image']; ?>" name="gallery_image_old"
                                   class="validate"> -->

                            <!--FILED END-->
                            <h4>Working Hours</h4>
                            <?php
                                $data = json_decode($listings_a_row['work_hours'],true);
                                // print_r($listings_a_row['work_hours']);die;
                                $days_1 = $data;

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
                             $si1++ ;} ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <a href="edit-listing-step-new-3?row=<?php echo $listing_codea; ?>">
                                        <button type="button"
                                                class="btn btn-primary"><?php echo $BIZBOOK['PREVIOUS']; ?></button>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="listing_submit"
                                            class="btn btn-primary"><?php echo $BIZBOOK['SAVE_AND_EXIT']; ?></button>
                                </div>
                                <div class="col-md-12">
                                    <a href="edit-listing-step-new-5?row=<?php echo $listing_codea; ?>"
                                       class="skip"><?php echo $BIZBOOK['SKIP_THIS']; ?> >></a>
                                </div>
                                <div class="col-md-12">
                                    <a href="dashboard" class="skip"><?php echo $BIZBOOK['GO_TO_USER_DASHBOARD']; ?>
                                        >></a>
                                </div>
                            </div>
                            <!--FILED END-->
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
<script type="text/javascript">var webpage_full_link = '<?php echo $webpage_full_link;?>';</script>
<script type="text/javascript">var login_url = '<?php echo $LOGIN_URL;?>';</script>
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