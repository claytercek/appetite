const tagButtons = document.querySelectorAll("#filterDiv ul li");
const tagGroups = document.querySelectorAll("#filterDiv ul h3");
const searchItems = document.querySelectorAll("a.search_item");

var tags = [];

for (var i = 0; i < tagGroups.length; i++) {
	tags.push([]);
}

for (var i = 0; i < tagButtons.length; i++) {
	let child = tagButtons[i].parentNode;
	let index = 0;
	//get index of parent
	while ((child = child.previousSibling) != null) index++;

	tagButtons[i].addEventListener("click", function() {
		toggleTag(this, parseInt(index / 2));
	});
}

function toggleTag(tag, groupIndex) {
	let index = tags[groupIndex].indexOf(tag.innerText);
	if (index >= 0) {
		tags[groupIndex].splice(index, 1);
		tag.classList.remove("selected");
	} else {
		tags[groupIndex].push(tag.innerText);
		tag.classList.add("selected");
	}
	refreshResults();
	console.log(tags);
}

function refreshResults() {
	for (let recipe of searchItems) {
		recipe.style.display = "block";
		for (let tagGroup of tags) {
			var count = 1;
			if (tagGroup.length >= 1) {
				count = 0;
				for (let tag of tagGroup) {
					let index = recipe.getAttribute("data-tags").indexOf(tag);
					if (index >= 0) {
						count += 1;
					}
				}
				if (count == 0) {
					recipe.style.display = "none";
				}
			}
		}
	}
}
