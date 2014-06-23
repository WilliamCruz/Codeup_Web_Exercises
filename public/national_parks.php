<?php
//William Cruz
//6-23-14
//PHP with MYSQL - Retrieving Data


function getOffset() {
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    return ($page - 1) * 4;
}



$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_test_db', 'william', 'vitzma_16');

$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$National_Parks = $dbc->query('SELECT * FROM National_Parks LIMIT 10')->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>	

<head>
	<meta cahrset="utf-8" />
	<title>National Parks</title>
	<script>

	</script>

</head>
	<body>

	<table border="1">
		<th>Name</th>
		<th>Location</th>
		<th>Date_Established</th>
		<th>Area</th>
		
	<?php foreach ($National_Parks as $national_park): ?>
		<tr>
			<td><?= $national_park['name'];?></td>
			<td><?= $national_park['location'];?></td>
			<td><?= $national_park['date_established'];?></td>
			<td><?= $national_park['area'];?></td>
		</tr>
			
	<? endforeach ?>


	</table>


	</body>
<html>
			