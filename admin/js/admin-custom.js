$(document).ready(function () {
    "use strict";

    $('.ad-menu ul li a.mact').siblings().slideDown();
    $('.ad-menu ul li a').on('click', function () {
        if($(this).hasClass("mact")){
            $(".ad-menu ul li div").slideUp();
            $('.ad-menu ul li a').removeClass('mact');
        }
        else{
            $(".ad-menu ul li div").slideUp();
            $('.ad-menu ul li a').removeClass('mact');
            $(this).addClass('mact');
            $(this).siblings().slideDown();
        }
    });
    $('.mopen').on('click', function () {
        $(this).fadeOut();
        $('.mclose').fadeIn();
        $('.ad-menu-lhs').addClass('mshow');
        $('.ad-dash').addClass('leftpadd');
    });
    $('.mclose').on('click', function () {
        $(this).fadeOut();
        $('.mopen').fadeIn();
        $('.ad-menu-lhs').removeClass('mshow');
        $('.ad-dash').removeClass('leftpadd');
    });
    //CREATE DUPLICATE LISTING
    $('.cre-dup-btn').on('click', function () {
        $('.cre-dup-form').slideDown();
    });
    //SERVICES LIST ADD - APPEND
    $(".lis-ser-add-btn").click(function () {
        $(".add-list-ser ul li:last-child").after('<li><div class="row"> <div class="col-md-6"> <div class="form-group"> <label>Service name 1:</label> <input type="text" name="service_id[]" class="form-control" placeholder="Ex: Plumbile"> </div> </div> <div class="col-md-6"> <div class="form-group"> <label>Choose profile image</label> <input type="file" name="service_image[]" class="form-control"> </div> </div> </div></li>');
    });
    //SERVICES OFFER LIST REMOVE - APPEND
    $(".lis-ser-rem-btn").click(function () {
        $(".add-list-ser ul li:last-child").remove();
    });
    //SPECIAL OFFER LIST ADD - APPEND
    $(".lis-add-off").click(function () {
        $(".add-list-off ul li:last-child").after('<li><div class="row"> <div class="col-md-6"> <div class="form-group"> <input type="text" name="service_1_name[]" class="form-control" placeholder="Offer name *"> </div> </div> <div class="col-md-6"> <div class="form-group"> <input type="text" name="service_1_price[]" class="form-control" onkeypress="return isNumber(event)" placeholder="Price"> </div> </div> </div><div class="row"> <div class="col-md-12"> <div class="form-group"> <textarea class="form-control" name="service_1_detail[]" placeholder="Details about this offer"></textarea> </div> </div> </div><div class="row"> <div class="col-md-12"> <div class="form-group"> <label>Choose offer image</label> <input type="file" name="service_1_image[]" class="form-control"> </div> </div> </div><div class="row"> <div class="col-md-12"> <div class="form-group"> <input type="text" name="service_1_view_more[]" class="form-control"  placeholder="View More Link"></div></div></div></li>');
    });
    //SPECIAL OFFER LIST ADD - APPEND
    // $(".lis-add-off").click(function(){
    //     $(".add-list-off ul li:last-child").after('<li><div class="row"> <div class="col-md-6"> <div class="form-group"> <input type="text" class="form-control" placeholder="Offer name *"> </div> </div> <div class="col-md-6"> <div class="form-group"> <input type="text" class="form-control" placeholder="Price"> </div> </div> </div><div class="row"> <div class="col-md-12"> <div class="form-group"> <textarea class="form-control" placeholder="Details about this offer"></textarea> </div> </div> </div><div class="row"> <div class="col-md-12"> <div class="form-group"> <label>Choose offer image</label> <input type="file" class="form-control"> </div> </div> </div></li>');
    // });
    //SPECIAL OFFER LIST REMOVE - APPEND
    $(".lis-add-rem").click(function () {
        $(".add-list-off ul li:last-child").remove();
    });
    //SPECIAL OFFER LIST ADD - APPEND
    $(".lis-add-oad").click(function () {
        $(".add-lis-oth ul li:last-child").after('<li> <div class="row"> <div class="col-md-5"> <div class="form-group"> <input type="text" name="listing_info_question[]" class="form-control" placeholder="Type your information"> </div> </div><div class="col-md-2"> <div class="form-group"> <i class="material-icons">arrow_forward</i> </div> </div> <div class="col-md-5"> <div class="form-group"> <input type="text" name="listing_info_answer[]" class="form-control" placeholder="yes"> </div> </div> </div> </li>');
    });
    //SPECIAL OFFER LIST REMOVE - APPEND
    $(".lis-add-ore").click(function () {
        $(".add-lis-oth ul li:last-child").remove();
    });
    //LISTING CATEGORY ADD - APPEND
    $(".cate-add-btn").click(function () {
        $(".add-ncate ul li:last-child").after('<li> <div class="row"> <div class="col-md-12"> <div class="form-group"> <input type="text" id="category_name" name="category_name[]" class="form-control" placeholder="Category name *" required> </div> </div><div class="col-md-12"><div class="form-group"><label>Choose category image</label><input type="file" name="category_image[]" id="category_image" class="form-control" required></div></div></div></li>');
    });
    //Job CATEGORY ADD - APPEND
    $(".job-cate-add-btn").click(function () {
        $(".add-ncate ul li:last-child").after('<li> <div class="row"> <div class="col-md-12"> <div class="form-group"> <input type="text" id="category_name" name="category_name[]" class="form-control" placeholder="Category name *" required> </div> </div></div></li>');
    });
    //Expert Paymemt ADD - APPEND
    $(".expert-paymente-add-btn").click(function () {
        $(".add-ncate ul li:last-child").after('<li> <div class="row"> <div class="col-md-12"> <div class="form-group"> <input type="text" id="payment_name" name="payment_name[]" class="form-control" placeholder="Payment name *" required> </div> </div></div></li>');
    });
    //LISTING CATEGORY REMOVE - APPEND
    $(".cate-rem-btn").click(function () {
        $(".add-ncate ul li:last-child").remove();
    });
    //Job CATEGORY REMOVE - APPEND
    $(".job-cate-rem-btn").click(function () {
        $(".add-ncate ul li:last-child").remove();
    });
    //Job CATEGORY REMOVE - APPEND
    $(".expert-paymente-rem-btn").click(function () {
        $(".add-ncate ul li:last-child").remove();
    });
    //COUNTRY ADD - APPEND
    $(".count-add-btn").click(function () {
        $(".add-ncate ul li:last-child").after('<li> <div class="row"> <div class="col-md-12"> <div class="form-group"> <input type="text" class="form-control" name="country_name[]" placeholder="Country name *" required> </div> </div> </div> </li>');
    });
    //COUNTRY REMOVE - APPEND
    $(".count-rem-btn").click(function () {
        $(".add-ncate ul li:last-child").remove();
    });

    //REGISTRATION GROUP  ADD - APPEND
    $(".reg-group-add-btn").click(function () {
        $(".add-ncate ul li:last-child").after('<li> <div class="row"> <div class="col-md-12"> <div class="form-group"> <input type="text" id="group_name" name="group_name[]" class="form-control" placeholder="Registration Group name *" required> </div> </div></div></li>');
    });

    //REGISTRATION GROUP REMOVE - APPEND
    $(".reg-group-rem-btn").click(function () {
        $(".add-ncate ul li:last-child").remove();
    });


    //QUALIFICATION ADD - APPEND
    $(".qualifications-add-btn").click(function () {
        $(".add-ncate ul li:last-child").after('<li> <div class="row"> <div class="col-md-12"> <div class="form-group"> <input type="text" class="form-control" name="qualifications_name[]" placeholder="Qualifications/Certificates/Skills *" required> </div> </div> </div> </li>');
    });
    //QUALIFICATION REMOVE - APPEND
    $(".qualifications-rem-btn").click(function () {
        $(".add-ncate ul li:last-child").remove();
    });

       //SUPPORT OFFER ADD - APPEND
       $(".offer-add-btn").click(function () {
        $(".add-ncate ul li:last-child").after('<li> <div class="row"> <div class="col-md-12"> <div class="form-group"> <label class="tit">Offer Title*</label> <input type="text" id="offer_title" name="offer_title[]" class="form-control" placeholder=" " required> </div> </div><div class="col-md-12"><div class="form-group"><label>Offer Name*</label><input type="text" name="offer_name[]" id="offer_name" class="form-control" required></div></div></div></li>');
    });

    //SUPPORT OFFER REMOVE - APPEND
    $(".offer-rem-btn").click(function () {
        $(".add-ncate ul li:last-child").remove();
    });

    //SUPPORT WORKER  TYPE ADD - APPEND
    $(".type-add-btn").click(function () {
        $(".add-ncate ul li:last-child").after('<li> <div class="row"> <div class="col-md-12"> <div class="form-group"> <label class="tit">Type Name*</label> <input type="text" id="type_name" name="type_name[]" class="form-control" placeholder=" " required> </div> </div></div></li>');
    });

    //SUPPORT WORKER TYPE REMOVE - APPEND
    $(".type-rem-btn").click(function () {
        $(".add-ncate ul li:last-child").remove();
    });

     //ABOUT US OPTION ADD - APPEND
     $(".aboutus-add-btn").click(function () {
        $(".add-ncate ul li:last-child").after('<li> <div class="row"> <div class="col-md-12"> <div class="form-group"> <label class="tit">Option Name*</label> <input type="text" id="option_name" name="option_name[]" class="form-control" placeholder=" " required> </div> </div></div></li>');
    });

    //ABOUT US OPTION ADD REMOVE - APPEND
    $(".aboutus-rem-btn").click(function () {
        $(".add-ncate ul li:last-child").remove();
    });

     //TRAVEL DISTANCE OPTION ADD - APPEND
     $(".tradis-add-btn").click(function () {
        $(".add-ncate ul li:last-child").after('<li> <div class="row"> <div class="col-md-12"> <div class="form-group"> <label class="tit">Travel distance Option*</label> <input type="text" id="travel_distance" name="travel_distance[]" class="form-control" placeholder=" " required> </div> </div></div></li>');
    });

    //TRAVEL DISTANCE OPTION ADD REMOVE - APPEND
    $(".tradis-rem-btn").click(function () {
        $(".add-ncate ul li:last-child").remove();
    });


    //Language OPTION ADD - APPEND
    $(".lang-add-btn").click(function () {
        $(".add-ncate ul li:last-child").after('<li> <div class="row"> <div class="col-md-12"> <div class="form-group"> <label class="tit">Language Name*</label> <input type="text" id="lang_name" name="lang_name[]" class="form-control" placeholder=" " required> </div> </div><div class="col-md-12"> <div class="form-group"> <label class="tit">Language Code*</label> <input type="text" id="lang_code" name="lang_code[]" class="form-control" placeholder=" " required> </div> </div></div></li>');
    });

    //Language OPTION ADD REMOVE - APPEND
    $(".lang-rem-btn").click(function () {
        $(".add-ncate ul li:last-child").remove();
    });

     //Avaibility Time OPTION ADD - APPEND
     $(".availti-add-btn").click(function () {
        $(".add-ncate ul li:last-child").after('<li> <div class="row"> <div class="col-md-12"> <div class="form-group"> <label class="tit">Availability time option*</label> <input type="text" id="avail_time" name="avail_time[]" class="form-control" placeholder=" " required> </div> </div></div></li>');
    });

    //Avaibility Time OPTION ADD REMOVE - APPEND
    $(".availti-rem-btn").click(function () {
        $(".add-ncate ul li:last-child").remove();
    });


     //Pet friendly OPTION ADD - APPEND
     $(".petfri-add-btn").click(function () {
        $(".add-ncate ul li:last-child").after('<li> <div class="row"> <div class="col-md-12"> <div class="form-group"> <label class="tit">Pet friendly option*</label> <input type="text" id="pet_frie" name="pet_frie[]" class="form-control" placeholder=" " required> </div> </div></div></li>');
    });

    //Pet friendly OPTION ADD REMOVE - APPEND
    $(".petfri-rem-btn").click(function () {
        $(".add-ncate ul li:last-child").remove();
    });


    //Support Preference OPTION ADD - APPEND
    $(".supppre-add-btn").click(function () {
        $(".add-ncate ul li:last-child").after('<li> <div class="row"> <div class="col-md-12"> <div class="form-group"> <label class="tit">Support Preference option*</label> <input type="text" id="supp_pref" name="supp_pref[]" class="form-control" placeholder=" " required> </div> </div></div></li>');
    });

    //Support Preference OPTION ADD REMOVE - APPEND
    $(".supppre-rem-btn").click(function () {
        $(".add-ncate ul li:last-child").remove();
    });

    //PLAN MANAGE OPTION ADD - APPEND
    $(".plan-add-btn").click(function () {
        $(".add-ncate ul li:last-child").after('<li> <div class="row"> <div class="col-md-12"> <div class="form-group"> <label class="tit">Plan Manage Name*</label> <input type="text" id="plan_name" name="plan_name[]" class="form-control" placeholder=" " required> </div> </div></div></li>');
    });

    //PLAN MANAGE OPTION ADD REMOVE - APPEND
    $(".plan-rem-btn").click(function () {
        $(".add-ncate ul li:last-child").remove();
    });


    //PARTCIPANT IDENTIFY OPTION ADD - APPEND
    $(".paident-add-btn").click(function () {
        $(".add-ncate ul li:last-child").after('<li> <div class="row"> <div class="col-md-12"> <div class="form-group"> <label class="tit">Participant Identify Option*</label> <input type="text" id="part_ident" name="part_ident[]" class="form-control" placeholder=" " required> </div> </div></div></li>');
    });

    //PARTCIPANT IDENTIFY OPTION ADD REMOVE - APPEND
    $(".paident-rem-btn").click(function () {
        $(".add-ncate ul li:last-child").remove();
    });

    //Rel participant OPTION ADD - APPEND
    $(".relpar-add-btn").click(function () {
        $(".add-ncate ul li:last-child").after('<li> <div class="row"> <div class="col-md-12"> <div class="form-group"> <label class="tit">Rel participant Option*</label> <input type="text" id="rel_parti" name="rel_parti[]" class="form-control" placeholder=" " required> </div> </div></div></li>');
    });

    //Rel participant OPTION ADD REMOVE - APPEND
    $(".relpar-rem-btn").click(function () {
        $(".add-ncate ul li:last-child").remove();
    });

    //RANGE OPTION ADD - APPEND
    $(".agerange-add-btn").click(function () {
     $(".add-ncate ul li:last-child").after('<li> <div class="row"> <div class="col-md-12"> <div class="form-group"> <label class="tit">Age Range Name*</label> <input type="text" id="range" name="range[]" class="form-control" placeholder=" " required> </div> </div></div><div class="row"> <div class="col-md-6"> <div class="form-group"> <label class="tit">Age Range max*</label> <input type="text" id="range_max" name="range_max[]" class="form-control" placeholder=" " required> </div> </div><div class="col-md-6"> <div class="form-group"> <label class="tit">Age Range min*</label> <input type="text" id="range_max" name="range_max[]" class="form-control" placeholder=" " required> </div> </div></div></li>');
    });

    //RANGE participant OPTION ADD REMOVE - APPEND
    $(".agerange-rem-btn").click(function () {
     $(".add-ncate ul li:last-child").remove();
    });
    

     //LOCATION ADD - APPEND
    //  $(".location-add-btn").click(function () {
    //     $(".add-ncate ul li:last-child").after('<li> <div class="row"> <div class="col-md-6"> <div class="form-group"> <input type="text" class="form-control" name="location_city[]" placeholder="Service Location City *" required> </div> </div> <div class="col-md-6"> <div class="form-group"> <input type="text" class="form-control" name="location_state[]" placeholder="Service Location State *" required> </div> </div> </div> </li>');
    // });
    // //LOCATION REMOVE - APPEND
    // $(".location-rem-btn").click(function () {
    //     $(".add-ncate ul li:last-child").remove();
    // });
    
     //LOCATION ADD - APPEND
    $(".loction-add-off").click(function () {      
        var len = $(".add-list-location ul li").length;

        // Create the new list item with input fields and append it to the unordered list
        $(".add-list-location ul li:last-child").after('<li><div class="row"><div class="col-md-12"><div class="form-group">Location '+len+'<input type="text" name="location['+len+'][location]" value="" id="location'+len+'" class=" form-control location colorBackground address" placeholder="Service Location  '+len+'" ></div></div><div class="col-md-4"><div class="form-group">City<input type="text" autocomplete="off" value="" name="location['+len+'][location_city]" id="location_city'+len+'" class="form-control colorBackground" placeholder="City" ></div></div><div class="col-md-4"><div class="form-group">State<input type="text" autocomplete="off" value="" name="location['+len+'][location_state]" id="location_state'+len+'" class="form-control colorBackground" placeholder="State" ></div></div><div class="col-md-4"><div class="form-group">Country<input type="text" autocomplete="off" value="" name="location['+len+'][location_country]" id="location_country'+len+'" class="form-control colorBackground" placeholder="Country" ></div></div><div class="col-md-4"><div class="form-group">Postcode<input type="text" autocomplete="off" value="" name="location['+len+'][location_zip_code]" id="location_zip_code'+len+'" class="form-control colorBackground" placeholder="Postcode" ></div></div><div class="col-md-4"><div class="form-group">Latitude<input type="text" autocomplete="off" value="" name="location['+len+'][location_latitude]" id="location_latitude'+len+'" class="form-control colorBackground" placeholder="Latitude" ></div></div><div class="col-md-4"><div class="form-group">Longitude<input type="text" autocomplete="off" value="" name="location['+len+'][location_longitude]" id="location_longitude'+len+'" class="form-control colorBackground" placeholder="Longitude" ></div></div></div></li>');
        var newInputField = $(".add-list-location ul li:last-child input.location")[0];
        loadPlacesAutocompleteScript(newInputField, len);

        // Apply the event listener for background color changes to the new input fields
        applyBackgroundChangeListener();
    });

    $(".location-rem-btn").on('click', function () {
        var _removListSer = $(".add-list-location ul li").length;
        if(_removListSer >= 2){
            $(".add-list-location ul li:last-child").remove();
        }
        else{
            alert("Sorry! you are not allowed to remove the last one.");
        }
    });

    var autocompletes = []; // Array to store autocomplete instances



    function loadPlacesAutocompleteScript(inputElement, index) {

      var autocompleteScript = document.createElement('script');
      autocompleteScript.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyAb1vGO92hZfS0oRzq9X9VhDJzz2BcqV0w&libraries=places";
      autocompleteScript.onload = function() {
          var autocomplete = new google.maps.places.Autocomplete(
              inputElement, {
                  types: ['geocode'],
                  componentRestrictions: { country: 'au' }
              });

          autocomplete.addListener('place_changed', function() {
              var place = this.getPlace();
              if (place && place.geometry) {
                  updatelocationFields(place, this.input, index);
              }
          });
      };
      document.head.appendChild(autocompleteScript);
  }


  function initAutocomplete() {
      var locationInputs = document.getElementsByClassName('location');
      var autocompletes = []; // Initialize the array to store Autocomplete instances
    
      for (let locationIndex = 0; locationIndex < locationInputs.length; locationIndex++) {
        var autocomplete = new google.maps.places.Autocomplete(
          locationInputs[locationIndex], {
            types: ['geocode'],
            componentRestrictions: { country: 'au' }
          });
    
        autocomplete.addListener('place_changed', function() {
          var place = this.getPlace();
    
          if (place && place.geometry) {
            console.log(this.input);
            updatelocationFields(place, this.input, locationIndex);
          }
        });
    
        autocompletes.push(autocomplete);
      }
    }

  function updatelocationFields(place, inputElement, index) {

    
      // Update latitude and longitude values
      var lateInput = document.getElementById('location_latitude' + index);
      lateInput.value = place.geometry.location.lat();
      lateInput.style.backgroundColor = '#66ff99';

      var longInput = document.getElementById('location_longitude' + index);
      longInput.value = place.geometry.location.lng();
      longInput.style.backgroundColor = '#66ff99';

      // Update other fields based on place details
      var cityInput = document.getElementById('location_city' + index);
      var postCodeInput = document.getElementById('location_zip_code' + index);
      var stateInput = document.getElementById('location_state' + index);
      var countryInput = document.getElementById('location_country' + index);

      place.address_components.forEach(function(component) {

        //   console.log(component);


          if (component.types.includes('locality')) {
              cityInput.value = component.long_name;
              cityInput.style.backgroundColor = '#66ff99';
          }
          if (component.types.includes('postal_code')) {
              postCodeInput.value = component.long_name;
              postCodeInput.style.backgroundColor = '#66ff99';
          }
          if (component.types.includes('administrative_area_level_1')) {
              stateInput.value = component.long_name;
              stateInput.style.backgroundColor = '#66ff99';
          }
          if (component.types.includes('country')) {
              countryInput.value = component.long_name;
              countryInput.style.backgroundColor = '#66ff99';
          }
      });
  }

  google.maps.event.addDomListener(window, "load", initAutocomplete);

    //SPECIAL OFFER LIST ADD - APPEND
    // $(".lis-add-off").click(function(){
    //     $(".add-list-off ul li:last-child").after('<li><div class="row"> <div class="col-md-6"> <div class="form-group"> <input type="text" class="form-control" placeholder="Offer name *"> </div> </div> <div class="col-md-6"> <div class="form-group"> <input type="text" class="form-control" placeholder="Price"> </div> </div> </div><div class="row"> <div class="col-md-12"> <div class="form-group"> <textarea class="form-control" placeholder="Details about this offer"></textarea> </div> </div> </div><div class="row"> <div class="col-md-12"> <div class="form-group"> <label>Choose offer image</label> <input type="file" class="form-control"> </div> </div> </div></li>');
    // });
    //WORK HOURS ADD - APPEND
      $(".slots-add-btn").click(function () {
        var currentLi = $(this).closest("li");
        var currentUl = currentLi.closest("ul");
        var day = currentLi.find("input[type=checkbox]:first-child").val();
        var len = currentUl.children("li").length - 1;

        var newLi = $('<li class="removeable"> <div class="row"> <div class="col-md-2"> </div><div class="col-md-4"> <input type="time" class="form-control colorBackground" name="days[' + day + '][data][' + len + '][from]" value=""> </div> <div class="col-md-4"> <input type="time" class="form-control colorBackground" name="days[' + day + '][data][' + len + '][to]" value=""> </div>  </div> </li>');
        currentUl.find("li:last-child").after(newLi);

        // Apply the background color change event listener to the newly added input fields
        newLi.find("input[type=time]").on('change', applyBackgroundChangeListener);
    });

    // WORK HOURS "Remove" button
    $(".slots-rem-btn").click(function () {
        var currentLi = $(this).closest("li");
        var currentUl = currentLi.closest("ul");
        if (currentUl.children("li").length > 1) {
        currentUl.find("li:last-child").remove();
        }
    });
    

    //CITY ADD - APPEND
    $(".city-add-btn").click(function () {
        $(".add-ncate ul li:last-child").after('<li> <div class="row"> <div class="col-md-12"> <div class="form-group"> <input type="text" class="form-control" name="city_name[]" placeholder="City name *"> </div> </div> </div> </li>');
    });
    //CITY REMOVE - APPEND
    $(".city-rem-btn").click(function () {
        $(".add-ncate ul li:last-child").remove();
    });
    //Expert City ADD - APPEND
    $(".expert-city-add-btn").click(function () {
        $(".add-ncate ul li:last-child").after('<li> <div class="row"> <div class="col-md-12"> <div class="form-group"> <input type="text" class="form-control" name="country_name[]" placeholder="City name *" required> </div> </div> </div> </li>');
    });
    //Expert City REMOVE - APPEND
    $(".expert-city-rem-btn").click(function () {
        $(".add-ncate ul li:last-child").remove();
    });
    //Expert Area ADD - APPEND
    $(".expert-area-add-btn").click(function () {
        $(".add-ncate ul li:last-child").after('<li> <div class="row"> <div class="col-md-12"> <div class="form-group"> <input type="text" class="form-control" name="city_name[]" placeholder="Area name *" required> </div> </div> </div> </li>');
    });
    //Expert Area REMOVE - APPEND
    $(".expert-area-rem-btn").click(function () {
        $(".add-ncate ul li:last-child").remove();
    });
    //SUB CATEGORY ADD - APPEND
    $(".scat-add-btn").click(function () {
        $(".add-ncate ul li:last-child").after('<li> <div class="row"> <div class="col-md-12"> <div class="form-group"> <input type="text" class="form-control" placeholder="Sub category name *" name="sub_category_name[]" required> </div> </div> </div> </li>');
    });
    //SUB CATEGORY REMOVE - APPEND
    $(".scat-rem-btn").click(function () {
        var _listsubcate = $(".add-ncate ul li").length;
        if(_listsubcate >= 2){
            $(".add-ncate ul li:last-child").remove();
        }
        else{
            alert("Sorry! you are not allowed to remove the last one.");
        }
    });

    //VIDEO LIST ADD - APPEND
    $(".lis-add-oadvideo").on('click', function() {
        $(".add-list-map ul li:last-child").after('<li> <div class="row"> <div class="col-md-12"> <div class="form-group"> <textarea id="listing_video" name="listing_video[]" class="form-control" placeholder="Paste Your Youtube Url here"></textarea> </div> </div> </div> </li>');
    });
    //VIDEO LIST REMOVE - APPEND
    $(".lis-add-orevideo").on('click', function() {
        var _listvido = $(".add-list-map ul li").length;
        if(_listvido >= 2){
            $(".add-list-map ul li:last-child").remove();
        }
        else{
            alert("Sorry! you are not allowed to remove the last one.");
        }
    });

    //BOOTSTRAP TOOL TIP
    $('[data-toggle="tooltip"]').tooltip();

    //PRODUCT SPECIFICATION LIST ADD - APPEND
    $(".prod-add-oad").on('click', function() {
        $(".add-prod-oth ul li:last-child").after('<li> <div class="row"> <div class="col-md-5"> <div class="form-group"> <input type="text" name="product_info_question[]" class="form-control" placeholder="Type your information"> </div> </div><div class="col-md-2"> <div class="form-group"> <i class="material-icons">arrow_forward</i> </div> </div> <div class="col-md-5"> <div class="form-group"> <input type="text" name="product_info_answer[]" class="form-control" placeholder="yes"> </div> </div> </div> </li>');
    });
    //PRODUCT SPECIFICATION LIST REMOVE - APPEND
    $(".prod-add-ore").on('click', function() {
        var _prodspec = $(".add-prod-oth ul li").length;
        if(_prodspec >= 2){
            $(".add-prod-oth ul li:last-child").remove();
        }
        else{
            alert("Sorry! you are not allowed to remove the last one.");
        }
    });

    //PRODUCT HIGHLIGHTS LIST ADD - APPEND
    $(".prod-add-high-oad").on('click', function() {
        $(".add-prod-high-oth ul li:last-child").after('<li> <div class="row"> <div class="col-md-12"> <div class="form-group"> <input type="text" name="product_highlights[]" class="form-control" placeholder="Type your highlights"> </div> </div> </div> </li>');
    });
    //PRODUCT HIGHLIGHTS LIST REMOVE - APPEND
    $(".prod-add-high-ore").on('click', function() {
        var _prohig = $(".add-prod-high-oth ul li").length;
        if(_prohig >= 2){
            $(".add-prod-high-oth ul li:last-child").remove();
        }
        else{
            alert("Sorry! you are not allowed to remove the last one.");
        }
    });

    //ENQUIRY AND REVIEW LIKE
    $(".enq-sav i").click(function () {
        $(this).toggleClass('sav-act');
    });

    //INTERNAL PAGE SEARCH
    $("#pg-sear").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#pg-resu tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    //IMAGE FILE UPLOAD GET FILE NAME
    $(".fil-img-uplo input").on("change", function(){
        var _upldfname = $(this).val().replace(/C:\\fakepath\\/i, '');
        $(this).siblings(".dumfil").html(_upldfname);
    });
    //PLACE - WHAT PEOPLE ASK - APPEND
    $(".plac-ask-add").on('click', function() {
        $(".plac-ask-que li:last-child").after('<li> <div class="col-md-4"> <div class="form-group"> <label>Question:</label> <input type="text" name="place_info_question[]" required="required" class="form-control"> </div></div><div class="col-md-8"> <div class="form-group"> <label>Answer:</label> <input type="text" name="place_info_answer[]" required="required" class="form-control"> </div></div></li>');
    });
    //PLACE - WHAT PEOPLE ASK REMOVE - APPEND
    $(".plac-ask-remov").on('click', function() {
        var _placque = $(".plac-ask-que li").length;
        if(_placque >= 2){
            $(".plac-ask-que li:last-child").remove();
        }
        else{
            alert("Sorry! you are not allowed to remove the last one.");
        }
    });

    //ADS TOTAL DAYS CALCULATION
    $("#stdate, #endate, #adposi").change(function () {
        var firstDate = $("#stdate").val();
        var secondDate = $("#endate").val();
        var millisecondsPerDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
        var startDay = new Date(firstDate);
        var endDay = new Date(secondDate);
        var diffDays = Math.abs((startDay.getTime() - endDay.getTime()) / (millisecondsPerDay));
        $(".ad-tdays").text(diffDays);
        $("#ad_total_days").val(diffDays);
        var adpocost = $('#adposi').find('option:selected', this).attr('mytag');
        $(".ad-pocost").text(adpocost);
        $("#ad_cost_per_day").val(adpocost);
        var totcost = diffDays * adpocost;
        $(".ad-tcost").text(totcost);
        $("#ad_total_cost").val(totcost);
    });
});

//GET URL SOURCE
function urlParam(name) {
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results == null) {
        return null;
    } else {
        return results[1] || 0;
    }
}
//URL PAREM VALUE
//$("#source").val(urlParam("source"));
if (urlParam("login") == "register") {
    $('.log-1, .log-3').slideUp();
    $('.log-2').slideDown();
}

$(function () {
    $("#event_start_date").datepicker({
        changeMonth: true,
        changeYear: true,
        minDate: 0
    });
    $("#stdate").datepicker({
        changeMonth: true,
        changeYear: true,
        minDate: 0
    });
    $("#endate").datepicker({
        changeMonth: true,
        changeYear: true,
        minDate: 0
    });
});

//DOWNLOAD INVOICE
$('#downloadPDF').click(function () {
    domtoimage.toPng(document.getElementById('content2'))
        .then(function (blob) {
            var pdf = new jsPDF('l', 'pt', [$('#content2').width(), $('#content2').height()]);

            pdf.addImage(blob, 'PNG', 0, 0, $('#content2').width(), $('#content2').height());
            pdf.save("invoice.pdf");

            that.options.api.optionsChanged();
        });
});

//Number Only Input box

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}


//Auto complete For City List Starts

jQuery(document).ready(function ($) {

    $(function () {
        $.ajax({
            url: '../city_search.php',
            success: function (response) {
                var cityArray = JSON.parse(response);

                // var dataCountry = {};
                // for (var i = 0; i < cityArray.length; i++) {
                //     dataCountry[cityArray[i]] = undefined; //cityArray[i].flag or null
                // }

                $('#select-city.autocomplete').autocomplete({  //Home Page City Search Box
                    source: cityArray,
                    minLength: 3, // The minimum number of characters to be entered
                    limit: 5 // The max amount of results that can be shown at once. Default: Infinity.
                });
            }
        });
    });
});

$(function() {
    $('.chosen-select').chosen();
});

var url = window.location.pathname;
var nav_nave = url.substring(url.lastIndexOf('/')+1);
$(".ad-menu ul li a").each(function(){
    if($(this).attr("href") == nav_nave){
        $(this).addClass('s-act');
    }
})

//SEARCH TERMS

var htmlElement = document.getElementById("res");
// $('.lhs ul li a').each(function(){
// 	if($(this).attr('href') != ""){
// 		var listElement = document.createElement("li");
// 		var aElement = document.createElement("a");
// 		aElement.innerHTML = $(this).text();
// 		aElement.setAttribute("href",$(this).attr('href'));
// 		listElement.appendChild(aElement);
// 		htmlElement.appendChild(listElement);
// 	}
// });




//SEARCH EVENTS
$(".search-field").focus(function(){
    $(".tser-res").addClass("act");
});
$(".search-field").click(function(){
    $(".tser-res").addClass("act");
});
$(".ad-dash").click(function(){
    $(".tser-res").removeClass("act");
});
$(".head-s2").mouseleave(function(){
    $(".tser-res").removeClass("act");
});

/* highlight matches text */
var highlight = function (string) {
    $("#tser-res li a.match").each(function () {
        var matchStart = $(this).text().toLowerCase().indexOf("" + string.toLowerCase() + "");
        var matchEnd = matchStart + string.length - 1;
        var beforeMatch = $(this).text().slice(0, matchStart);
        var matchText = $(this).text().slice(matchStart, matchEnd + 1);
        var afterMatch = $(this).text().slice(matchEnd + 1);
        $(this).html(beforeMatch + "<em>" + matchText + "</em>" + afterMatch);
    });
};


/* filter products */
$("#top_search").on("keyup click input", function () {
    if (this.value.length > 0) {
        $("#tser-res li a").removeClass("match").hide().filter(function () {
            return $(this).text().toLowerCase().indexOf($("#top_search").val().toLowerCase()) != -1;
        }).addClass("match").show();
        highlight(this.value);
        $("#tser-res").addClass("act");
    }
    else {
        //$("#tser-res, #tser-res li a").removeClass("match").hide();
    }
});

setTimeout(function () {
    $('.log-suc').fadeOut();
}, 4000);

// Mutliple delete related function starts

$(document).ready(function() {

    $('#checkall').change(function() {
        if(this.checked) {
            $('.delete_check').prop('checked', true);
            $('.multi-del-btn').css("display", "block");
            $('.multi-del-btn').removeAttr('disabled');
        }else{
            $('.delete_check').prop('checked', false);
            $('.multi-del-btn').css("display", "none");
        }
    });

});


function checkcheckbox(){
    // Total checkboxes
    var length = $('.delete_check').length;

    // Total checked checkboxes
    var totalchecked = 0;
    $('.delete_check').each(function(){
        if($(this).is(':checked')){
            totalchecked+=1;
        }
    });

    // Checked unchecked checkbox
    if(totalchecked == length){
        $("#checkall").prop('checked', true);
    }else{
        $('#checkall').prop('checked', false);
    }

    if(totalchecked == 0){
        $('.multi-del-btn').css("display", "none");
    }else{
        $('.multi-del-btn').css("display", "block");
        $('.multi-del-btn').removeAttr('disabled');
    }
}

// Mutliple delete related function ends

//MENU AUTO SCROLL
var container = $('.ad-menu-lhs'),
scrollTo = $('.mact');

container.animate({
    scrollTop: scrollTo.offset().top - container.offset().top + container.scrollTop() - 95
});

//PROFILE PAGE NUMBER COUNT
$('.count1').each(function () {
    $(this).prop('Counter', 0).animate({
        Counter: $(this).text()
    }, {
        duration: 5000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});

// location add
