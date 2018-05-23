{
	var searchIcon = document.querySelector("img#search");
	var closeIcon = document.querySelector(".search img");
	var filterPanel = document.querySelector("div.filter");
	var input = document.querySelector(".search input");

	closeIcon.addEventListener("click", openCloseFilter, false);

	input.addEventListener("keyup", function(event) {
		event.preventDefault();
		if (event.keyCode === 13) {
			var userInput = input.value;
			window.location = "search.php?text=" + encodeURIComponent(userInput);
		}
	});
	searchIcon.addEventListener("click", function() {
		var userInput = input.value;
		window.location = "search.php?text=" + encodeURIComponent(userInput);
	});

	var filterIsOpen = false;

	function openCloseFilter() {
		if (!filterIsOpen) {
			closeIcon.src = "images/icons/close_white.svg";
			window.scrollTo(0, 0);
		} else {
			closeIcon.src = "images/icons/filter_white.svg";
		}
		filterPanel.classList.toggle("filterOpen");
		filterIsOpen = !filterIsOpen;
	}
}
