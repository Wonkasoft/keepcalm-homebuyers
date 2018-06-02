( function() {
	'use strict';

	var search_btn = document.getElementById('search-btn'),
	search_input = document.getElementById('s');
  search_input.style.left = '100%';
  var search_input_set = search_input.style.left;

	search_btn.onclick = function() {
		if ( search_input_set == '100%' ) {
			search_input.style.left = '0%';
			search_input.focus();
			search_input.onblur = function() { search_input.style.left = '100%'; search_input.value = ''; };
		} else {
			search_input.style.left = '100%';
		}
	};
})();

// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

var placeSearch, autocomplete;

function initAutocomplete() {
  // Create the autocomplete object, restricting the search to geographical
  // location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
      {types: ['geocode']});
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
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}