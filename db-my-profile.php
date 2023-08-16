<?php
include "header.php";

if (file_exists('config/user_authentication.php')) {
    include('config/user_authentication.php');
}

include "dashboard_left_pane.php";

?>
<!--CENTER SECTION-->
<div class="ud-main">
    <div class="ud-main-inn ud-no-rhs">
        <div class="ud-cen">
            <div class="log-bor">&nbsp;</div>
            <span class="udb-inst"><?php echo $BIZBOOK['USER_PROFILE']; ?></span>
            <?php include('config/user_activation_checker.php'); ?>
            <div class="ud-cen-s2">
                <h2><?php echo $BIZBOOK['PROFILE_DETAILS']; ?></h2>
                <?php include "page_level_message.php"; ?>
                <a href="db-my-profile-edit" class="db-tit-btn"><?php echo $BIZBOOK['EDIT_MY_PROFILE']; ?></a>
                <a href="db-payment" class="db-tit-btn db-tit-btn-1"><?php echo $BIZBOOK['UPGRADE']; ?></a>
                <?php
                $user_details_row = getUser($_SESSION['user_id']);

                //To calculate the expiry date from user created date starts

                $start_date_timestamp = strtotime($user_details_row['user_cdt']);
                $plan_type_duration = $user_plan_type['plan_type_duration'];

                $expiry_date_timestamp = strtotime("+$plan_type_duration months", $start_date_timestamp);

                $expiry_date = date("Y-m-d h:i:s", $expiry_date_timestamp);

                //To calculate the expiry date from user created date ends

                ?>
                <table class="responsive-table bordered">
                    <tbody>
                        <tr>
                            <td><?php echo $BIZBOOK['PROFILE_EXPIRY_LISTING_EXP']; ?></td>
                            <td><?php if ($user_details_row['user_type'] == "Service provider") {
                                    if ($user_details_row['user_cdt'] == '0000-00-00 00:00:00') {
                                        echo 'N/A';
                                    } else {
                                        echo dateFormatconverter($expiry_date);
                                    }
                                } else {
                                    echo "Unlimited";
                                } ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $BIZBOOK['NAME']; ?></td>
                            <td><?php echo $user_details_row['first_name']; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $BIZBOOK['EMAIL_ID']; ?></td>
                            <td><?php echo $user_details_row['email_id']; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $BIZBOOK['PROFILE_PASSWORD']; ?></td>
                            <td><?php echo "*********" ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $BIZBOOK['MOBILE_NUMBER']; ?></td>
                            <td><?php echo $user_details_row['mobile_number']; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $BIZBOOK['PROFILE_PICTURE']; ?></td>
                            <td><img src="images/user/<?php if (($user_details_row['profile_image'] == NULL) || empty($user_details_row['profile_image'])) {
                                                            echo "1.jpg";
                                                        } else {
                                                            echo $user_details_row['profile_image'];
                                                        } ?>" alt="" loading="lazy"></td>
                        </tr>
                        <tr>
                            <td><?php echo $BIZBOOK['PROFILE_PICTURE_COVER']; ?></td>
                            <td><img src="<?php if (($user_details_row['cover_image'] == NULL) || empty($user_details_row['cover_image'])) {
                                                echo "images/home4.jpg";
                                            } else {
                                                echo "images/user/" . $user_details_row['cover_image'];
                                            } ?>" alt="" loading="lazy"></td>
                        </tr>
                        <tr>
                            <td><?php echo $BIZBOOK['PROFILE_IDPROOF']; ?></td>
                            <td><?php if (($user_details_row['profile_id_proof'] == NULL) || empty($user_details_row['profile_id_proof'])) {
                                    echo "N/A";
                                } else { ?><img src="<?php echo "images/user/" . $user_details_row['profile_id_proof']; ?>" alt="" loading="lazy"><?php } ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $BIZBOOK['CITY']; ?></td>
                            <td><?php if ($user_details_row['user_city'] == NULL) {
                                    echo "N/A";
                                } else {
                                    echo $user_details_row['user_city'];
                                } ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $BIZBOOK['JOIN_DATE']; ?></td>
                            <td><?php echo dateFormatconverter($user_details_row['user_cdt']); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $BIZBOOK['VERIFIED']; ?></td>
                            <td><?php if ($user_details_row['user_status'] == "Active") {
                                    echo "Yes";
                                } else {
                                    echo "No";
                                } ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $BIZBOOK['PREMIUM_SERVICE_PROVIDER']; ?></td>
                            <td><?php if ($user_details_row['user_type'] == "Service provider") {
                                    echo "Yes";
                                } else {
                                    echo "No";
                                } ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $BIZBOOK['PROFILE_LINK']; ?></td>
                            <td><a href="<?php echo $PROFILE_URL . urlModifier($user_details_row['user_slug']); ?>" target="_blank"><?php echo $PROFILE_URL . urlModifier($user_details_row['user_slug']); ?></a></td>
                        </tr>
                        <tr>
                            <td><?php echo $BIZBOOK['FACEBOOK']; ?></td>
                            <td><?php echo $user_details_row['user_facebook']; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $BIZBOOK['TWITTER']; ?></td>
                            <td><?php echo $user_details_row['user_twitter']; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $BIZBOOK['YOUTUBE']; ?></td>
                            <td><?php echo $user_details_row['user_youtube']; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $BIZBOOK['USER_WEBSITE']; ?></td>
                            <td><?php echo $user_details_row['user_website']; ?></td>
                        </tr>
                        <?php if ($user_details_row['user_type'] == 'Support coordinator') { ?>
                            <tr>
                            <td>Access methods</td>
                            <td><?php echo $user_details_row['access_methods']; ?></td>
                           </tr>     
                           
                           <tr>
                            <td>Age groups</td>
                            <td><?php echo $user_details_row['age_groups']; ?></td>
                           </tr>  

                           <tr>
                            <td>Registration number</td>
                            <td><?php echo $user_details_row['registration_no']; ?></td>
                           </tr>
                           
                           <tr>
                            <td>Service Locations</td>
                            <td><?php echo $user_details_row['service_location']; ?></td>
                           </tr>

                           <tr>
                            <td>Provider trading name</td>
                            <td><?php echo $user_details_row['provider_trading_name']; ?></td>
                           </tr> 

                           <tr>
                            <td>Registered companys name (if different)</td>
                            <td><?php echo $user_details_row['registered_companys_name']; ?></td>
                           </tr>

                           <tr>
                            <td>Business contact number</td>
                            <td><?php echo $user_details_row['business_contact_number']; ?></td>
                           </tr>

                           <tr>
                            <td>Business email address</td>
                            <td><?php echo $user_details_row['business_email_address']; ?></td>
                           </tr>
                           <tr>
                            <td>Accredited provider stamp</td>
                            <td><img src="<?php if (($user_details_row['accredited_provider_stamp'] == NULL) || empty($user_details_row['accredited_provider_stamp'])) {
                                                echo "images/home4.jpg";
                            } else {
                                echo "images/provider_stamp/" . $user_details_row['accredited_provider_stamp'];
                            } ?>" alt="" loading="lazy"></td>
                           </tr>

                        <?php } ?>


                        <?php if ($user_details_row['user_type'] == 'Participant') { ?>
                            <tr>
                                <td><?php echo "Who needs services !"; ?></td>
                                <td><?php echo $user_details_row['w_n_services']; ?></td>
                            </tr>
                           <?php if (!empty($user_details_row['p_age_range']) && $user_details_row['p_age_range'] != null) { ?>                            
                            <tr>
                                <td><?php echo "Participant Age Range"; ?></td>
                                <td><?php echo $user_details_row['p_age_range']; ?></td>
                            </tr>
                           <?php } ?>                              
                            <tr>
                                <td><?php echo "How is your NDIS plan managed?"; ?></td>
                                <td><?php echo $user_details_row['n_p_managed']; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo "Your Service location"; ?></td>
                                <td><?php echo $user_details_row['service_location']; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo "Relationship with the participant"; ?></td>
                                <td><?php echo $user_details_row['relation_w_p']; ?></td>
                            </tr>

                            <?php if (!empty($user_details_row['age_range']) && $user_details_row['age_range'] != null) { ?>
                                <tr>
                                    <td><?php echo "Participant First Name"; ?></td>
                                    <td><?php echo $user_details_row['p_first_name']; ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo "Participant Last Name"; ?></td>
                                    <td><?php echo $user_details_row['p_last_name']; ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo "Age Range"; ?></td>
                                    <td><?php echo $user_details_row['age_range']; ?></td>
                                </tr>
                            <?php } ?>



                            <tr>
                                <td><?php echo "Prefer Contact Method"; ?></td>
                                <td><?php echo $user_details_row['p_contact_method']; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo "Participant Identify as"; ?></td>
                                <td><?php echo $user_details_row['p_identify_as']; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo "language is spoken at home"; ?></td>
                                <td><?php echo $user_details_row['language_spoken']; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo "Interpreter required"; ?></td>
                                <td><?php echo $user_details_row['interpreter_r']; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo "NDIS Number"; ?></td>
                                <td><?php echo $user_details_row['ndis_number']; ?></td>
                            </tr>

                        <?php } ?>


                        <tr>
                            <td>
                                <a href="db-my-profile-edit" class="db-pro-bot-btn"><?php echo $BIZBOOK['EDIT_MY_PROFILE']; ?></a>
                                <a href="db-payment" class="db-pro-bot-btn"><?php echo $BIZBOOK['UPGRADE']; ?></a>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
        include "dashboard_right_pane.php";
        ?>