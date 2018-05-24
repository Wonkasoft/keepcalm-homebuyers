( function() {
	'use strict'

	var search_btn = document.getElementById('search-btn'),
	search_input = document.getElementById('s');
	search_input.style.left = '100%';

	search_btn.onclick = function() {
			console.log( search_input.style.left );
		if ( search_input.style.left == '100%' ) {
			search_input.style.left = '0%';
			search_input.focus();
			search_input.onblur = function() { search_input.style.left = '100%'; search_input.value = ''; };
		} else {
			search_input.style.left = '100%';
		}
	};

})();