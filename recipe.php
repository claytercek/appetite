<?php
	require "includes/db.php";
	
	// Get the `id` from the URL parameter.
	$id = isset($_GET['id']) ? $_GET['id'] : null;
	// If no parameter is provided, redirect to the home page.
	if (!$id) redirect_to('index.php');
	else {
		// Parameter is provided.
		// Look for a matching ID in the database.
		$query1 = 'SELECT * ';
		$query1 .= 'FROM main ';
		$query1 .= "WHERE id = '{$id}' ";
		$query1 .= 'LIMIT 1';
		$result1 = mysqli_query($connection, $query1);
		if (!$result1) {
			die('Database query failed.');
		}

	$query2 = 'SELECT * ';
		$query2 .= 'FROM ingredients ';
		$query2 .= "WHERE recipe = '{$id}' ";
		$query2 .= 'LIMIT 20';
		$result2 = mysqli_query($connection, $query2);
		if (!$result2) {
			die('Database query failed.');
		}
	}
?>

<html lang="en">

<?php
		$recipe = mysqli_fetch_assoc($result1)
?>

<head>
	<title>Appetize | <?php echo $recipe['title'] ?></title>
	<!-- META -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<!-- CSS -->
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/main.css">
</head>
		
<body >
	<?php require("includes/header.php")?>
	<main class="recipe">
		
		<div class="recipeIntro">
			<div id="hero" style="background-image:url('images/<?php echo $recipe['full_name'] ?>/square.jpg')"></div>
			
			<div>
				<h1><?php echo $recipe['title'] ?></h1>	
				<h2><?php echo $recipe['subtitle'] ?></h2>	
				<p><?php echo $recipe['description'] ?></p>
			</div>
		</div>

		<div class="hr"></div>

		<h3>ingredients</h3>
		<div class="ingredients">
			<img id="ingredients" src="images/<?php echo $recipe['full_name'] ?>/ingredients.png" alt="ingredients">
			
			<table>
				
			<?php 
				while ($ingredient = mysqli_fetch_assoc($result2)) {
			?>
				<tr><td><?php echo $ingredient['amount']?></td><td><?php echo $ingredient['name'] ?></td></tr>
			<?php } ?>
			</table>
		</div>

		<div class="hr"></div>
		<h3>instructions</h3>
		<div class="instructions">
			

			<?php 
				$numSteps = (sizeof($recipe,1) - 5) / 2;
				for ($i=1 ; $i<= $numSteps ; $i++ ) {
					if ($recipe["step_" . $i ] != "" ) {
			?>
	
			<div class="step">
				<img src="images/<?php echo $recipe["full_name"] . "/step_" . $i . "_retina.jpg" ?>" alt="<?php echo $recipe["step_" . $i . "_title"] ?>">
				<h4>
					<div class="num"><?php echo $i ?></div>
					<?php echo $recipe["step_" . $i . "_title"] ?>	
				</h4>
				<div class="hr"></div>
				<p><?php echo $recipe["step_" . $i ] ?></p>
			</div>
	
			<?php } } ?>
		</div>


	</main>
	<?php	
		// Step 4: Release Returned Data
		mysqli_free_result($result1);
		mysqli_free_result($result2);
		// Step 5: Close Database Connection
		mysqli_close($connection);
?>
</body>



</html>
