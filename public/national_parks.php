<?php
//William Cruz
//6-23-14
//PHP with MYSQL - Retrieving Data

$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_test_db', 'william', 'vitzma_16');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function getOffset() {
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    return ($page - 1) * 4;

}

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$nextPage = $page +1;
$prevPage = $page - 1;

$limit = 4;
$getOffset = getOffset();
$stmt = $dbc->prepare('SELECT * FROM National_Parks LIMIT :limit OFFSET :offset');
$stmt -> bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt -> bindValue(':offset', $getOffset, PDO::PARAM_INT);
$stmt -> execute();

$query = 'SELECT * FROM National_Parks';
$National_Parks = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $dbc->query('SELECT count(*) FROM National_Parks')->fetchColumn();
$numPages = ceil($count / 4);





if (!empty($_POST)) {
	$stmt = $dbc->prepare("INSERT INTO National_Parks (name, location, date_established, area, description) 
   	 VALUES (:name, :location, :date_established, :area, :description)");

 	$stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
    $stmt->bindvalue(':location', $_POST['location'], PDO::PARAM_STR);
    $stmt->bindvalue(':date_established', $_POST['date_established'], PDO::PARAM_STR);
    $stmt->bindvalue(':area', $_POST['area'], PDO::PARAM_STR);
    $stmt->bindvalue(':description', $_POST['description'], PDO::PARAM_STR);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html>	

<head>
	<meta cahrset="utf-8" />
	<title>National Parks</title>
	<h1>National Parks</h1>
</head>
<body>
	<table border="1">
		<th>Name</th>
		<th>Location</th>
		<th>Date_Established</th>
		<th>Area</th>
		<th>Description</th>
		
	<?php foreach ($National_Parks as $national_park): ?>
		<tr>
			<td><?= $national_park['name'];?></td>
			<td><?= $national_park['location'];?></td>
			<td><?= $national_park['date_established'];?></td>
			<td><?= $national_park['area'];?></td>
			<td><?= $national_park['description'];?></td>
		</tr>
	<? endforeach; ?>
	</table>
	<?php if ($page > 1): ?>
		<a href="?page=<?= $prevPage; ?>">Previous</a>
	<?php endif; ?>

	<?php if ($page < $numPages): ?>
		<a href="?page=<?= $nextPage; ?>">Next</a>
	<?php endif; ?>

<div>
	<h1>National Parks</h1>
	<form action="national_parks.php"   method="POST">
		<p>
			<label for="Name">Name:</lable>
			<input id="Name" name="name" type="text" placeholder="Enter Park Name">
		</p>
		<p>
			<label for="Location">Location:</lable>
			<input id="Location" name="location" type="text" placeholder="Enter Park Location">
		</p>
		<p>
			<label for="Date_Established">Date Established:</lable>
			<input id="Date_Established" name="date_established" type="text" placeholder="Enter the date the park was established">
		</p>
		<p>
			<label for="Area">Area:</lable>
			<input id="Area" name="area" type="text" placeholder="Enter the area of the park in acres">
		</p>
		<p>
			<label for="Description">Description:</lable>
			<textarea id="Description" name="description" placeholder="Enter Park Description"></textarea>
		</p>
		<button type="Submit Form">Submit</button> 

</body>
<html>




			