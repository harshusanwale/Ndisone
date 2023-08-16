
<?php
include "header.php";

// if (!isset($_COOKIE['user_id'])) {
//     echo "'user_id' is not Created!";
//     unset($_COOKIE['user_id']);
//    // die;
// }else{
//     $regpage = $_COOKIE['reg_status'];
// $pageno = 4;
// if($pageno == $regpage){
// ?>
<!-- START -->
<!--PRICING DETAILS-->
<section class="<?php if ($footer_row['admin_language'] == 2) {
    echo "lg-arb";
} ?> pri">
    <div class="">
        <div class="">
            <div class="tit">
                <h2>
                    <span><?php echo $BIZBOOK['PRICING_TITLE_2']; ?></span></h2>
                <p><?php echo $BIZBOOK['PRICING_SUB_TITLE_2']; ?></p>
            </div>


<table class="fixed_headers">
  <thead style="box-shadow: 2px 5px 8px #ededed;">
    <tr>
      <th style="vertical-align: bottom !important;">
        <div class="c2 ">
          <h3>
Role
</h3><p>Business Listings</p>
      </div>
   
      </th>








                    


<?php
$si = 1;
foreach (getAllPlanType() as $plan_type_row) {
    ?>

 <th class="bx-bn">

        
     <div class="c2 ab">
        <h4><?php if ($plan_type_row['plan_type_name']  == 'Free') { ?>
                <p>General User</p>
            <?php } elseif ($plan_type_row['plan_type_name']  == 'Standard') { ?>
                <p>Start up Business</p>
            <?php } elseif ($plan_type_row['plan_type_name']  == 'Premium') { ?>
                <p>Medium Business</p>
            <?php } elseif ($plan_type_row['plan_type_name']  == 'Premium Plus') {  ?>
                <p>Medium to Enterprise</p>
                <?php
            }else{ ?>
<p>Best for Multi-site Agency</p>
<?php
            } ?>
        </h4>
        <div class="rp-pay">
          <h2>
<?php echo $footer_row['currency_symbol'] . '' .  number_format((float)$plan_type_row['plan_type_price'], 2, '.', '') ;  ?> <span>Monthly </span></h2>
<h2><?php echo $footer_row['currency_symbol'] . '' .  number_format((float)$plan_type_row['plan_type_price'] * 12, 2, '.', '') ;  ?> <span>Yearly  </span></h2>
<?php
$discounted_price = $plan_type_row['plan_type_price'] * 12;
$final_discounted_price = $discounted_price - $discounted_price / 5;
?>

<h2><?php echo $footer_row['currency_symbol'] . '' .  number_format((float)$final_discounted_price, 2, '.', '') ;  ?> <span>Yearly 20% off  </span></h2>    
<a href="#"> <?php if($plan_type_row['plan_type_name']  == 'Free') { ?> Free <?php } ?>
    <?php if($plan_type_row['plan_type_name']  == 'Standard') { ?> Bronze <?php } ?>
    <?php if($plan_type_row['plan_type_name']  == 'Premium') { ?> Silver <?php } ?>
    <?php if($plan_type_row['plan_type_name']  == 'Premium Plus') { ?> Gold <?php } ?>
    <?php if($plan_type_row['plan_type_name']  == 'Premium Plus Plus') { ?> Diamond <?php } ?>
</a>
</div>

      </div>

      </th>

    <?php
         $si++;
    }
                    ?>

<!--

      <th>

        
     <div class="c2 ab">
        <h4> General User</h4>
        <div class="rp-pay">
          <h2>
$00.00   <span>Monthly </span></h2>
<h2>$00.00 <span>Yearly  </span></h2>
<h2>$00.00 <span>Yearly 20% off  </span></h2>
<a href="#"> free</a>
</div>

      </div>

      </th>



      <th> 

       <div class="c2">
        <h4> Start up Business</h4>
         <div class="rp-pay">
          <h2>
$9.00 <span>Monthly </span></h2>
<h2>$108.00 <span>Yearly  </span></h2>
<h2>$86.00 <span>Yearly 20% off  </span></h2>
<a href="#"> Bronze</a>
</div>
<p>
For Support Worker /Sole Trader</p>
      </div></th>




       <th>
        <div class="c2">
        <h4> Medium Business</h4>
         <div class="rp-pay">
          <h2>
$19.00 <span>Monthly </span></h2>
<h2>$228.00 <span>Yearly  </span></h2>
<h2>$182.40 <span>Yearly 20% off  </span></h2>

<a href="#"> Silver</a>
</div>

      </div>

  </th>



      <th> <div class="c2">
        <h4> Medium to Enterprise</h4>
         <div class="rp-pay">
          <h2>
$31.00 <span>Monthly </span></h2>
<h2>$372.00 <span>Yearly  </span></h2>
<h2>$297.60 <span>Yearly 20% off  </span></h2>
<a href="#"> Gold</a>
</div>

      </div></th>




      <th> <div class="c2">
        <h4>Best for Multi-site Agency
</h4>
 <div class="rp-pay">
 <h2>$49.00 <span>Monthly </span></h2>
<h2>$588.00 <span>Yearly  </span></h2>
<h2>$470.40 <span>Yearly 20% off  </span></h2>
<a href="#"> Diamond</a>
</div>


<p> Made for enterprises 
Multi-site Agency / NDIS Service Experts</p>

      </div></th>



-->







    </tr>
  </thead>
  <tbody>
     <tr>
      <td><p class="bn-head"> Business Listings</p></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>







    <tr>
      <td>Number of Categories Listings / Registration Groups</td>

      <!--
      <td><img src="images/icon/close.png"></td>      
      <td>1</td>
         <td>5</td>
      <td>15</td>
      <td>Unlimited</td>
  -->

<?php
                    $si = 1;
                    foreach (getAllPlanType() as $plan_type_row) {
                        ?>
<?php if ($plan_type_row['plan_type_listing_count'] == 1000) {
                                                echo "<td>Unlimited</td>";
                                            } else {
                                                echo "<td>".$plan_type_row['plan_type_listing_count']."</td>";
                                            } ?> 


    <?php
         $si++;
    }
?>                                            

    </tr>

    <tr>
           <td>Business Locations</td>
    <!--<td><img src="images/icon/close.png"></td>-->

<?php
     $si = 1;
     foreach (getAllPlanType() as $plan_type_row) {
     ?>
<?php if ($plan_type_row['plan_type_duration'] >= 7) {
     echo "<td>". $plan_type_row['plan_type_duration'] / 12 . ' ' . "year(s)" . "</td>";
     } else {
     echo "<td>". $plan_type_row['plan_type_duration'] . ' ' . "month(s)"."</td>";
     } ?> 

    <?php
         $si++;
    }
?>
    </tr>

    <tr>
           <td>Search Results</td>
<?php
     $si = 1;
     foreach (getAllPlanType() as $plan_type_row) {
     ?>
<?php if ($plan_type_row['plan_type_event_count'] == 1000) {
      echo "<td>"."Unlimited"."</td>";
     } else {
     echo "<td>".  $plan_type_row['plan_type_event_count']   ."</td>";
     } ?> 

    <?php
         $si++;
    }
?>
    </tr>

    <tr>
           <td>SEO - Social Media links</td>
<?php
     $si = 1;
     foreach (getAllPlanType() as $plan_type_row) {
     ?>
<?php if ($plan_type_row['plan_type_blog_count'] == 1000) {
      echo "<td>"."Unlimited"."</td>";
     } else {
     echo "<td>".  $plan_type_row['plan_type_blog_count']   ."</td>";
     } ?> 

    <?php
         $si++;
    }
?>
    </tr>


 <tr>
           <td><p class="bn-head">  Leads </p></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>



    <tr>
           <td>Email Notification - Organic Lead</td>
<?php
     $si = 1;
     foreach (getAllPlanType() as $plan_type_row) {
     ?>
<?php if ($plan_type_row['plan_type_job_count'] == 1000) {
      echo "<td>"."Unlimited"."</td>";
     } else {
     echo "<td>".  $plan_type_row['plan_type_job_count']   ."</td>";
     } ?> 

    <?php
         $si++;
    }
?>
    </tr>


    <tr>
           <td>Email Push Notification - Email Query</td>
     
<?php
     $si = 1;
     foreach (getAllPlanType() as $plan_type_row) {
     ?>
<?php if ($plan_type_row['plan_type_coupon_count'] == 1000) {
      echo "<td>"."Unlimited"."</td>";
     } else {
     echo "<td>".  $plan_type_row['plan_type_coupon_count']   ."</td>";
     } ?> 

    <?php
         $si++;
    }
?>
    </tr>


<tr>
           <td>Post and manage service requests</td>
     <td>Unlimited</td>
      <td>Unlimited </td>
      <td>Unlimited</td>
      <td>Unlimited</td>
      <td>Unlimited</td>
    </tr>



    <tr>
           <td>Sponsored listing / Business Promotion</td>
<?php
     $si = 1;
     foreach (getAllPlanType() as $plan_type_row) {
     ?>
<?php if ($plan_type_row['plan_type_direct_lead'] == 1) {
      echo "<td>".$BIZBOOK['PRICING_GET_DIRECT_LEADS']."</td>";
     } else {
     echo "<td>"; ?><img src="images/icon/close.png"> <?php echo"</td>";
     } ?> 

    <?php
         $si++;
    }
?>
    </tr>




    <tr>
      <td>Number of Categories Listings / Registration Groups</td>
<?php
     $si = 1;
     foreach (getAllPlanType() as $plan_type_row) {
     ?>
<?php if ($plan_type_row['plan_type_email_notification'] == 1) {
      echo "<td>".$BIZBOOK['PRICING_EMAIL_NOTIFICATION']."</td>";
     } else {
     echo "<td>"; ?><img src="images/icon/close.png"> <?php echo"</td>";
     } ?> 

    <?php
         $si++;
    }
?>
    </tr>
      <tr>
      <td>Number of Categories Listings / Registration Groups</td>
<?php
     $si = 1;
     foreach (getAllPlanType() as $plan_type_row) {
     ?>
<?php if ($plan_type_row['plan_type_verified'] == 1) {
      echo "<td>".$BIZBOOK['PRICING_VERIFIED_LISTING']."</td>";
     } else {
     echo "<td>"; ?><img src="images/icon/close.png"> <?php echo"</td>";
     } ?> 

    <?php
         $si++;
    }
?>
    </tr>
      <tr>
      <td>Number of Categories Listings / Registration Groups</td>
<?php
     $si = 1;
     foreach (getAllPlanType() as $plan_type_row) {
     ?>
<?php if ($plan_type_row['plan_type_trusted'] == 1) {
      echo "<td>".$BIZBOOK['PRICING_TRUSTED_LISTING']."</td>";
     } else {
     echo "<td>"; ?><img src="images/icon/close.png"> <?php echo"</td>";
     } ?> 

    <?php
         $si++;
    }
?>
    </tr>
      <tr>
      <td>Number of Categories Listings / Registration Groups</td>
<?php
     $si = 1;
     foreach (getAllPlanType() as $plan_type_row) {
     ?>
<?php if ($plan_type_row['plan_type_offers'] == 1) {
      echo "<td>".$BIZBOOK['SPECIAL_OFFERS']."</td>";
     } else {
     echo "<td>"; ?><img src="images/icon/close.png"> <?php echo"</td>";
     } ?> 

    <?php
         $si++;
    }
?>
    </tr>
      <tr>
      <td>Number of Categories Listings / Registration Groups</td>
      <?php
     $si = 1;
     foreach (getAllPlanType() as $plan_type_row) {
     ?>
        <?php echo "<td>".$BIZBOOK['USER_DASHBOARD'] ."</td>"; ?>
     <?php
         $si++;
    }  ?>
    </tr>
      <tr>
      <td>Number of Categories Listings / Registration Groups</td>
      <?php
     $si = 1;
     foreach (getAllPlanType() as $plan_type_row) {
     ?>
<?php if ($plan_type_row['plan_type_photos_count'] == 1000) {
      echo "<td>Unlimited</td>";
     } else {
     echo "<td>".  $plan_type_row['plan_type_photos_count']   ."</td>";
     } ?> 

    <?php
         $si++;
    }
?>
    </tr>

          <tr>
      <td>Number of Categories Listings / Registration Groups</td>
      <?php
     $si = 1;
     foreach (getAllPlanType() as $plan_type_row) {
     ?>
<?php if ($plan_type_row['plan_type_videos_count'] == 1000) {
        echo "<td>Unlimited</td>";
     } else {
     echo "<td>".  $plan_type_row['plan_type_videos_count']   ."</td>";
     } ?> 

    <?php
         $si++;
    }
?>
    </tr>

          <tr>
      <td>Number of Categories Listings / Registration Groups</td>
      

      <?php
     $si = 1;
     foreach (getAllPlanType() as $plan_type_row) {
     ?>
<?php if ($plan_type_row['plan_type_social'] == 1) {
      echo "<td>".$BIZBOOK['PRICING_SOCIAL_SHARE']."</td>";
     } else {
     echo "<td>"; ?><img src="images/icon/close.png"> <?php echo"</td>";
     } ?> 

    <?php
         $si++;
    }
?>
    </tr>

          <tr>
      <td>Number of Categories Listings / Registration Groups</td>
      
      <?php
     $si = 1;
     foreach (getAllPlanType() as $plan_type_row) {
     ?>
<?php if ($plan_type_row['plan_type_ratings'] == 1) {
      echo "<td>".$BIZBOOK['PRICING_REVIEW_CONTROL']."</td>";
     } else {
     echo "<td>"; ?><img src="images/icon/close.png"> <?php echo"</td>";
     } ?> 

    <?php
         $si++;
    }
?>

    </tr>

          <tr>
      <td>Number of Categories Listings / Registration Groups</td>      

      <?php
     $si = 1;
     foreach (getAllPlanType() as $plan_type_row) {
     ?>
        <?php echo "<td>".$BIZBOOK['CREATE_DUPLICATE_LISTING_LABEL'] ."</td>"; ?>
     <?php
         $si++;
    }  ?>


    </tr>

          <tr>
      <td>Number of Categories Listings / Registration Groups</td>
      

        <?php
     $si = 1;
     foreach (getAllPlanType() as $plan_type_row) {
     ?>
        <?php echo "<td>".$BIZBOOK['PRICING_ADMIN_TIPS'] ."</td>"; ?>
     <?php
         $si++;
    }  ?>
    </tr>

   
  </tbody>
</table>

<div class="col-md-12">
<div class="get-stst">
    <!--
    <div class="c5a">
    <a href="login">Get Started</a>
    </div>
    <div class="c5a">
    <a href="login">Get Started</a>
    </div>
    <div class="c5a">
    <a href="login">Get Started</a>
    </div>
    <div class="c5a">
    <a href="login">Get Started</a>
    </div>
    <div class="c5a">
    <a href="login">Get Started</a>
    </div>
    -->

    <?php
        foreach (getAllPlanType() as $plan_type_row) {
        ?>
        <div class="c5a">
            <?php if($plan_type_row['plan_type_name'] != 'Free') {?>
            <a href="register_update_sw_form2.php?user_plan=<?php echo $plan_type_row['plan_type_id'] ?>" >Get Started</a>
            <?php } else {
            ?> <a href="dashboard" >Get Started</a> <?php  //echo  $_SESSION['status_msg'];  
            }?>
        </div>
        <?php
        }
    ?>

</div>
</div>

<br>

<br>

<br>
<br>



            <!-- <div>
                <ul>
                    <li style="width: 20%;float: left;position: relative;top: 159px;">
   <div class="pri-box">
      <div class="c2">
      <h3> Role </h3>
       
      </div>
      <div class="c3">
          
  <h4>Business Listings</h4>
         
       
      </div>
      <div class="c4">
        
            <a href="#"> Number of Categories Listings / Registration Groups</a>
            <a href="#"> Business Locations</a>
            <a href="#"> Search Results</a>
            <a href="#"> SEO - Social Media links</a>
            <a href="#"> Ad Summary</a>
            <a href="#"> Sponsored listing / Business Promotion</a>
             <a href="#"> <b> Leads</b></a>
              <a href="#"> Email Notification - Organic Lead</a>
               <a href="#"> Email Push Notification - Email Query</a>
                <a href="#"> Post and manage service requests</a>
                 <a href="#"> Connect with clients directly</a>
                  <a href="#"> <b>Job </b></a>
                   <a href="#"> Job Posting ( Listing Expire in 30 days)</a>
                    <a href="#"> Apply for Job</a>
                    <a href="#"><b>Accessible Housing</b></a>

                    <a href="#"> Rental Property ( 60 days expiry) </a>
                    <a href="#"> SDA/MTA/SIL Vacancy for all sites</a>
                    <a href="#">Holiday Destinations - Expiry 1 year  </a>
                    <a href="#"> NDIS Property for sale ( 90 days expirty) </a>
                    <a href="#"><b> MarketPlace - All Products </b>  </a>
                    <a href="#"> Product Listing -eCommerece </a>
                    <a href="#"> Modified Vehicle for Sale ( 30 days expiry) </a>
                    <a href="#"><b> Support Workers / Support Coorindator </b>  </a>
                    <a href="#"> View profile and Contact  </a>
                    <a href="#"> Upload Profile </a>
                    <a href="#"> Looking for a Job </a>
                    <a href="#"> <b> NDIS Service Experts</b> </a>
                    <a href="#">Service Expert Profile Page  </a>
                    <a href="#"> Multiple Locations </a>
                    <a href="#">  Special Offer / Coupons</a>
                    <a href="#"><b> Events </b>  </a>
                    <a href="#"> Free Event - Seminar - Training  </a>
                    <a href="#"> Paid  Event - Seminar - Training  </a>
                    <a href="#">Free e-Learning   </a>
                    <a href="#"> Paid e-Learning </a>
                    <a href="#">  <b> Blogs</b></a>
                    <a href="#"> Blog Post </a>
                    <a href="#"> Newsletters </a>
                    <a href="#"> <b> Value added</b> </a>
                    <a href="#"> Like Listing </a>
                    <a href="#"> Followings </a>
                    <a href="#"> Post Review and feedback - After login only </a>
                    <a href="#"> Send enquiry from the listing page </a>
                    <a href="#"> User Dashboard </a>
                    <a href="#"> Profile Page </a>
                    <a href="#"> Join Newsletter </a>
                    <a href="#"> Add Users </a>
                    <a href="#"> Review </a>
                    <a href="#"> Accredited Logo </a>
                    <a href="#"><del> Service Listing - Number of sites</del> </a>
                    <a href="#"> <del>Business Promotions /Feature listing </del> </a>
                    <a href="#"> <del>List Categories - Service Types </del> </a>
                      <a href="#"> <del>Points - Understand how it works </del> </a>

                   

      </div>
     
   </div>
</li>
                    <?php
                    $si = 1;
                    foreach (getAllPlanType() as $plan_type_row) {
                        ?>
                        <li>
                            <div class="pri-box">
                                <div class="c2">
                                    <h4><?php echo $plan_type_row['plan_type_name']; ?> plan</h4>

                                    <?php if ($plan_type_row['plan_type_id'] == 1) { ?>
                                        <p><?php echo $BIZBOOK['PRICING_GETTING_STARTED']; ?></p>
                                    <?php } elseif ($plan_type_row['plan_type_id'] == 2) { ?>
                                        <p><?php echo $BIZBOOK['PRICING_PERFECT_SMALL_TEAMS']; ?></p>
                                    <?php } elseif ($plan_type_row['plan_type_id'] == 3) { ?>
                                        <p><?php echo $BIZBOOK['PRICING_BEST_VALUE_LARGE']; ?></p>
                                    <?php } else { ?>
                                        <p><?php echo $BIZBOOK['PRICING_MADE_ENTERPRISES']; ?></p>
                                        <?php
                                    } ?>

                                </div>
                                <div class="c3">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="form-check-inline pric-radio">
                                            <label class="customradio"><span class="radiotextsty"></span><input type="radio" name="radio"><span class="checkmark"></span>
                                          </label></div>

                                     
                                    <h2>
                                       $00.00 <span>Monthly </span>

                                    </h2>
                                     </div>
                                         
                                         <div class="d-flex align-items-center justify-content-center">
                                        <div class="form-check-inline pric-radio">
                                            <label class="customradio"><span class="radiotextsty"></span><input type="radio" name="radio"><span class="checkmark"></span>
                                          </label></div>
                                    <h2>
                                        $00.00 <span>Yearly </span>

                                    </h2>
                                     </div>



                                      

                                        <div class="d-flex align-items-center justify-content-center">
                                        <div class="form-check-inline pric-radio">
                                            <label class="customradio"><span class="radiotextsty"></span><input type="radio" name="radio"><span class="checkmark"></span>
                                          </label></div>
                                        <h2>$00.00 <span>Yearly 20% off </span></h2>


                                      </div>

                                       
                                    <?php if ($plan_type_row['plan_type_id'] == 1) { ?>
                                        <p><?php echo $BIZBOOK['PRICING_SINGLE_USER']; ?></p>
                                    <?php } elseif ($plan_type_row['plan_type_id'] == 2) { ?>
                                        <p><?php echo $BIZBOOK['PRICING_STARTUP_BUSINESS']; ?></p>
                                    <?php } elseif ($plan_type_row['plan_type_id'] == 3) { ?>
                                        <p><?php echo $BIZBOOK['PRICING_MEDIUM_BUSINESS']; ?></p>
                                    <?php } else { ?>
                                        <p><?php echo $BIZBOOK['PRICING_MADE_ENTERPRISES']; ?></p>
                                        <?php
                                    } ?>

                                    <a href="<?php
                                    if (isset($_SESSION['user_id'])) {
                                        echo "db-plan-change";
                                    } else {
                                        echo "login";
                                    } ?>"><?php echo $BIZBOOK['ADD_LISTING']; ?></a>
                                </div>
                                <div class="c4">
                                 
                                 <div class="mt-4"> <a href="#" class="text-center"> <img src="images/icon/check.png" width="15"></a></div>

                                  <div class="mt-4"> <a href="#" class="text-center"> <img src="images/icon/check.png" width="15"></a></div>
                                   <div class="mt-4"> <a href="#" class="text-center"> <img src="images/icon/check.png" width="15"></a></div>
                                    <div class="mt-4"> <a href="#" class="text-center"> <img src="images/icon/check.png" width="15"></a></div>
                                     <div class="mt-4"> <a href="#" class="text-center"> <img src="images/icon/check.png" width="15"></a></div>
                                      <div class="mt-4"> <a href="#" class="text-center"> <img src="images/icon/check.png" width="15"></a></div>
                                       <div class="mt-4"> <a href="#" class="text-center"> <img src="images/icon/check.png" width="15"></a></div>
                                        <div class="mt-4"> <a href="#" class="text-center"> <img src="images/icon/check.png" width="15"></a></div>




                                </div>
                                <div class="c5">
                                    <a href="<?php
                                    if (isset($_SESSION['user_id'])) {
                                        echo "db-plan-change";
                                    } else {
                                        echo "login";
                                    } ?>"><?php echo $BIZBOOK['PRICING_GET_START']; ?></a>
                                </div>
                            </div>
                        </li>


                        <?php
                        $si++;
                    }
                    ?>

                   <li>
   <div class="pri-box">
      <div class="c2">
         <h4>Premium plan</h4>
         <p>Best value for large teams</p>
      </div>
      <div class="c3">
          <div class="d-flex align-items-center justify-content-center">
                                        <div class="form-check-inline pric-radio">
                                            <label class="customradio"><span class="radiotextsty"></span><input type="radio" name="radio"><span class="checkmark"></span>
                                          </label></div>
                                    <h2>
                                        $00.00 <span>Yearly </span>

                                    </h2>
                                     </div>

           <div class="d-flex align-items-center justify-content-center">
                                        <div class="form-check-inline pric-radio">
                                            <label class="customradio"><span class="radiotextsty"></span><input type="radio" name="radio"><span class="checkmark"></span>
                                          </label></div>
                                    <h2>
                                        $588.00 <span>Yearly </span>

                                    </h2>
                                     </div>

                                        <div class="d-flex align-items-center justify-content-center">
                                        <div class="form-check-inline pric-radio">
                                            <label class="customradio"><span class="radiotextsty"></span><input type="radio" name="radio"><span class="checkmark"></span>
                                          </label></div>
                                    <h2>
                                        $470.00 <span>Yearly 20% off </span>

                                    </h2>
                                     </div>
         
         <p>Medium business</p>
         <a href="login">Add listing</a>
      </div>
      <div class="c4">
         
      </div>
      <div class="c5">
         <a href="login">Get Start</a>
      </div>
   </div>
</li>
                </ul>
            </div> -->
        </div>
    </div>
</section>
<!--END PRICING DETAILS-->


<section>
    <div class="pop-ups pop-quo">
        <!-- The Modal -->
        <div class="modal fade" id="quote">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!-- Modal Header -->
                    <div class="quote-pop">
                        <h4><?php echo $BIZBOOK['LEAD-GET-QUOTE']; ?></h4>
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control"
                                       placeholder="<?php echo $BIZBOOK['LEAD-NAME-PLACEHOLDER']; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control"
                                       placeholder="<?php echo $BIZBOOK['ENTER_EMAIL_STAR']; ?>"
                                       pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"
                                       title="<?php echo $BIZBOOK['LEAD-INVALID-EMAIL-TITLE']; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"
                                       placeholder="<?php echo $BIZBOOK['LEAD-MOBILE-PLACEHOLDER']; ?>"
                                       pattern="[7-9]{1}[0-9]{9}"
                                       title="<?php echo $BIZBOOK['LEAD-INVALID-MOBILE-TITLE']; ?>" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="3"
                                          placeholder="<?php echo $BIZBOOK['LEAD-MESSAGE-PLACEHOLDER']; ?>"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary"><?php echo $BIZBOOK['SUBMIT']; ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include "footer.php"; 
// }else{
// $redirect_url = $webpage_full_link . 'registration_sw_form3_plan_payment';  //Redirect Url
// header("Location: $redirect_url");  //Redirect When No Listing Found in Table
// exit();   
// }}?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript">var webpage_full_link = '<?php echo $webpage_full_link;?>';</script>
<script type="text/javascript">var login_url = '<?php echo $LOGIN_URL;?>';</script>
<script src="js/custom.js"></script>
<script>
   $(document).on('click','#update', function() {
   $.ajax({
      type: "POST",
      url: "regstatusupdate.php",
    });
}); 
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