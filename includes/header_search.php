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
<div id="filterDiv" class="filter">
	<ul>
		<h3>protein</h3>
		<li id="poultry">poultry</li>
		<li id="beef">beef</li>
		<li id="fish">fish</li>
		<li id="pork">pork</li>
		<li id="vegetarian">vegetarian</li>
	</ul>
	<ul>
		<h3>type</h3>
		<li id="soup">soup</li>
		<li id="salad">salad</li>
		<li id="sandwich">sandwich</li>
		<li id="pizza">pizza</li>
	</ul>
	<ul>
		<h3>cuisine</h3>
		<li id="american">american</li>
		<li id="italian">italian</li>
		<li id="french">french</li>
		<li id="french">mexican</li>
	</ul>
	
</div>
<script src="js/searchIcon.js"></script>

