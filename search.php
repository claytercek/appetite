<?php
	require "includes/db.php";

	// Step 2: Preform Database Query
	$table = "main";
	$query = "SELECT * FROM {$table}";
	$result = mysqli_query($connection, $query);
	// Check there are no errors with our SQL statement
	if (!$result) {
			die ("Database query failed.");
	}

	$tags=array('american','beef')
?>

<html lang="en">

<head>
	<title>Appetize</title>
	<!-- META -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<!-- CSS -->
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/main.css">
</head>
    
<body id="top">

	<?php require "includes/header_search.php" ?>
	<main class="search">
		<?php
			while ($row = mysqli_fetch_assoc($result)) {
		?>
			<a class="search_item" href="recipe.php?id=<?php echo $row['id']; ?>" data-tags="<?php echo $row['tags']; ?>">
				<div class="img" style="background-image:url('images/<?php echo $row['full_name']; ?>/square.jpg')"></div>
				<div class="text">
					<h3>
						<?php echo $row['title']; ?>
					</h3>
					<h4>
						<?php echo $row['subtitle']; ?>
					</h4>
				</div>
			</a>
		<?php
			}
			// Step 4: Release Returned Data
			mysqli_free_result($result);
			// Step 5: Close Database Connection
			mysqli_close($connection);
		?>
	</main>
	<script src="js/search.js"></script>
</body>

</html>
