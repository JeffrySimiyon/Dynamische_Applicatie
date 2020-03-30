<?php
	require("connection.php");
	$query = $conn->prepare('SELECT * FROM characters ORDER BY name');
	$query->execute();
	$count = $query->rowCount();
	$conn = null;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <script src="https://kit.fontawesome.com/a3078cd2a7.js" crossorigin="anonymous"></script>
	    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
	    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
	    <title>Characters</title>
	</head>
	<body>
		<div id='main'>
	        <header>
	        <h1>Alle <?php echo $count ?> characters uit de database</h1>
	        </header>
	        <div id='all-characters'>
	        	<?php
	        		foreach ($query as $row) {
	        			echo "<div class='characters'>
	        			<img class='pic' src='assets/images/$row[2]' alt=''>
		                <div class='info'>
		                <div class='title'>$row[1]</div>
		                <div class='stats'>
		                <div class='healt'><i class='fas fa-heart'></i> $row[3]</div>
		                <div class='attack'><i class='fas fa-fist-raised'></i> $row[6]</div>
		                <div class='defense'><i class='fas fa-shield-alt'></i> $row[7]</div>
		                </div>
		                </div>
		                <a href='characters.php?id=$row[0]' class='bekijk'><i class='fas fa-search'></i> bekijk</a>
		                <hr>
		                </div>";
		            }
		        ?>
		    </div>
		    <?php include('assets/includes/footer.php') ?>
	    </div>
	</body>
</html>