<?php 
	$text = isset($_GET['text']) ? $_GET['text'] : null;
?>

<header class="search">
	<div class="search">
		<a id="logo" href="index.php">
			<h1 >appetize</h1>
		</a>
		<img id="filter" src="images/icons/filter_white.svg" alt="filter">
		<input type="text" placeholder="search" value="<?php echo $text ?>">
		<img id="search" src="images/icons/search_white.svg" alt="search">
	</div>
</header>
<div class="filter">
	<ul>
		<h3>Protein</h3>
		<li>Chicken</li>
		<li>Beef</li>
		<li>Fish</li>
		<li>Pork</li>
		<li>Vegetables</li>
	</ul>
	<ul>
		<h3>Meal Type</h3>
		<li>Soup</li>
		<li>Salad</li>
		<li>Sandwich</li>
		<li>Pizza</li>
	</ul>
	<ul>
		<h3>Dietary Restrictions</h3>
		<li>Vegetarian</li>
		<li>Vegan</li>
		<li>Gluten Free</li>
	</ul>
	
</div>

<script src="js/searchIcon.js"></script>

