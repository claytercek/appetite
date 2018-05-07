{
	var searchIcon = document.querySelector(".searchIcon");
	var closeIcon = document.querySelector(".search img");
	var search = document.querySelector("div.search");
	var input = document.querySelector(".search input");

	searchIcon.addEventListener("click", openCloseSearch, false);
	closeIcon.addEventListener("click", openCloseSearch, false);

	input.addEventListener("keyup", function(event) {
		event.preventDefault();
		if (event.keyCode === 13) {
			var userInput = input.value;
			window.location =
				"search.php?text=" + encodeURIComponent(userInput);
		}
	});

	var searchIsOpen = false;

	function openCloseSearch() {
		if (!searchIsOpen) {
			search.style.left = ".1rem";
			setTimeout(function() {
				input.focus();
			}, 300);
		} else {
			search.style.left = "100%";
		}
		searchIsOpen = !searchIsOpen;
	}
}
