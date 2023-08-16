<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAb1vGO92hZfS0oRzq9X9VhDJzz2BcqV0w&libraries=places"></script>
<script>
    var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'long_name',
        route: 'long_name',
        locality: 'long_name',
        postal_code: 'short_name'
    };

    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('autocomplete')), {
                types: ['(cities)']
            });
        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            console.log(place);
            document.getElementById('space_latitude').value = place.geometry.location.lat();
            document.getElementById('space_longitude').value = place.geometry.location.lng();
            fillInAddress(autocomplete, "");
        });
    }

    function fillInAddress(autocomplete, unique) {
        var place = autocomplete.getPlace();
        for (var component in componentForm) {
            if (!!document.getElementById(component + unique)) {
                document.getElementById(component + unique).value = '';
                document.getElementById(component + unique).disabled = false;
            }
        }
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType] && document.getElementById(addressType + unique)) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType + unique).value = val;
            }
        }
    }
    google.maps.event.addDomListener(window, "load", initAutocomplete);

    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }
</script>
<script>
    var placeSearch, autocomplete;
    var componentForm = {
    };

    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('address')), {
                types: ['(cities)']
            });
        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();

            for (let i = 0; i < place.address_components.length; i++) {
                // if (place.address_components[i].types[0] == "administrative_area_level_2") {
                    // document.getElementById('city').value = place.address_components[i].long_name;
                    var cityInput = document.getElementById('city');
                    cityInput.value = place.address_components.find(component => component.types.includes('locality')).long_name;
                    // cityInput.style.color = 'red'; // Change the color as needed
                    cityInput.style.backgroundColor = '#21d78d';
                    // document.getElementById('city').value.style.color = 'red';
                // }
                if (place.address_components[i].types[0] == "postal_code") {
                    var postCode = document.getElementById('post_code');
                    postCode.value = place.address_components[i].long_name;
                    postCode.style.backgroundColor = '#21d78d';
                }
                if (place.address_components[i].types[0] == "country") {
                    var country = document.getElementById('country');
                    country.value = place.address_components[i].long_name;
                    country.style.backgroundColor = '#21d78d';
                }
            }

            fillInAddress(autocomplete, "");
        });
    }

    function fillInAddress(autocomplete, unique) {
        var place = autocomplete.getPlace();
        for (var component in componentForm) {
            if (!!document.getElementById(component + unique)) {
                document.getElementById(component + unique).value = '';
                document.getElementById(component + unique).disabled = false;
            }
        }
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType] && document.getElementById(addressType + unique)) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType + unique).value = val;
            }
        }
    }
    google.maps.event.addDomListener(window, "load", initAutocomplete);

    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }
</script>
<script>
    // function initialize() {
    //     var input = document.getElementById('address');
    //     var options = document.getElementById("space_country").options;
    //     var autocomplete = new google.maps.places.Autocomplete(input);
    //     google.maps.event.addListener(autocomplete, 'place_changed', function() {
    //         var place = autocomplete.getPlace();
    //         // console.log(place);
    //         document.getElementById('space_latitude').value = place.geometry.location.lat();
    //         document.getElementById('space_longitude').value = place.geometry.location.lng();
    //         // document.getElementById('neighb_area').value = place.vicinity;
    //         for (let i = 0; i < place.address_components.length; i++) {
    //             if (place.address_components[i].types[0] == "administrative_area_level_2") {
    //                 document.getElementById('city').value = place.address_components[i].long_name;
    //             }
    //             if (place.address_components[i].types[0] == "sublocality_level_1") {
    //                 document.getElementById('neighbor_area').value = place.address_components[i].long_name;
    //             }
    //             if (place.address_components[i].types[0] == "administrative_area_level_1") {
    //                 document.getElementById('province').value = place.address_components[i].long_name;
    //             }
    //             if (place.address_components[i].types[0] == "postal_code") {
    //                 document.getElementById('zip_code').value = place.address_components[i].long_name;
    //             }
    //             if (place.address_components[i].types[0] == "country") {
    //                 // console.log(place.address_components[i].long_name);
    //                 for (var j = 0; j < options.length; j++) {
    //                     if (options[j].text == place.address_components[i].long_name) {
    //                         options[j].selected = true;
    //                         document.getElementById("select2-space_country-container").textContent = options[j].text;
    //                         const getSpan = document.getElementById("select2-space_country-container")
    //                         getSpan.setAttribute("title", options[j].text);
    //                         break;
    //                     }
    //                 }
    //             }
    //         }
    //     });
    // }
    // google.maps.event.addDomListener(window, 'load', initialize);
</script>