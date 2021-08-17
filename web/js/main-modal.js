$(document).ready(function(){
	var menu = document.getElementById("dropdown-content");
	var mobile_menu = document.getElementById("header-mainMenu-content");

	// Get the modal
	var pb_models_modal = document.getElementById("parts-by-models-modal");
	var pb_manufacturers_modal = document.getElementById("parts-by-manufacturers-modal");
	var pb_groups_modal = document.getElementById("parts-by-groups-modal");

	// Get the button that opens the modal
	var pb_models_btn = document.getElementById("parts-by-models-btn");
	var pb_manufacturers_btn = document.getElementById("parts-by-manufacturers-btn");
	var pb_groups_btn = document.getElementById("parts-by-groups-btn");
	// mobile version
	var pb_models_btn_m = document.getElementById("parts-by-models-btn-mobile");
	var pb_manufacturers_btn_m = document.getElementById("parts-by-manufacturers-btn-mobile");
	var pb_groups_btn_m = document.getElementById("parts-by-groups-btn-mobile");

	// Get the <span> element that closes the modal
	var _close = document.getElementsByClassName("close");
    for (var i=0; i<_close.length; i++) {
        _close[i].onclick = function() {
			pb_models_modal.style.display = "none";
			pb_manufacturers_modal.style.display = "none";
			pb_groups_modal.style.display = "none";
			menu.style.display = null;
			mobile_menu.style.display = null;
		};
    }
	
	// When the user clicks the button, open the modal 
	pb_models_btn.onclick = function() {
		pb_models_modal.style.display = "block";
		menu.style.display = "none";
	}
	/*pb_manufacturers_btn.onclick = function() {
		pb_manufacturers_modal.style.display = "block";
		menu.style.display = "none";
	}*/
	/*pb_groups_btn.onclick = function() {
		pb_groups_modal.style.display = "block";
		menu.style.display = "none";
	}*/
	// mobile version
	pb_models_btn_m.onclick = function() {
		pb_models_modal.style.display = "block";
		mobile_menu.style.display = "none";
	}
	pb_manufacturers_btn_m.onclick = function() {
		pb_manufacturers_modal.style.display = "block";
		mobile_menu.style.display = "none";
	}
	pb_groups_btn_m.onclick = function() {
		pb_groups_modal.style.display = "block";
		mobile_menu.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == pb_models_modal || event.target == pb_manufacturers_modal || event.target == pb_groups_modal) {
			pb_models_modal.style.display = "none";
			pb_manufacturers_modal.style.display = "none";
			pb_groups_modal.style.display = "none";
			menu.style.display = null;
			mobile_menu.style.display = null;
		}
	}
});