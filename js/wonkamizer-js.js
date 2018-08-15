( function() {
	'use strict';

	var search_btn = document.getElementById('search-btn');
	
	search_btn.addEventListener( "click", search_slide );

})();

function search_slide() {
  var search_input = document.getElementById('s');
  if ( search_input.classList.contains( 'active' ) ) {
    search_input.classList.remove('active');
  } else {
    search_input.classList.add('active');
    setTimeout( function() {search_input.focus();}, 500 );
    search_input.onblur = function() { search_input.classList.remove( 'active' ); search_input.value = ''; };
  }
}

// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

var placeSearch, autocomplete;
 var componentForm = {
        street_number: 'short_name', // Numbers only
        route: 'long_name', // Street Name only
        locality: 'long_name', // City Name
        administrative_area_level_1: 'short_name', // State
        country: 'long_name', // Country
        postal_code: 'short_name' // Zip Code
      };

function initAutocomplete() {
  // Create the autocomplete object, restricting the search to geographical
  // location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
      {types: ['geocode']});

    // When the user selects an address from the dropdown, populate the address
    // fields in the form.
    autocomplete.addListener('place_changed', fillInAddress);
  }

  function fillInAddress() {
    // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace();
    // Get each component of the address from the place details
    // and fill the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
      var addressType = place.address_components[i].types[0];
      if (componentForm[addressType]) {
        var val = place.address_components[i][componentForm[addressType]];
        document.getElementById(addressType).value = val;
      }
    }

    document.getElementById('street_number').value = place.address_components[0].long_name + ' ' + place.address_components[1].long_name;
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy,
        zip: position.address.postalCode
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}