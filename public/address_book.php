<?
//William Cruz
//6/2/14
//Using CSV Files: Writing CSV data


$address_book = [
    ['The White House', '1600 Pennsylvania Avenue NW', 'Washington', 'DC', '20500'],
    ['Marvel Comics', 'P.O. Box 1527', 'Long Island City', 'NY', '11101'],
    ['LucasArts', 'P.O. Box 29901', 'San Francisco', 'CA', '94129-0901']
];


$filename = 'address_book.csv';

$handle = fopen($filename, 'r');

$address_book = [];

while(!feof($handle)) {
	$row = fgetcsv($handle);
	if (is_array($row)) {
  	$address_book[] = $row;
		
	}
}
fclose($handle);


$new_address =[];
$filename = "address_book.csv";

function write_csv($bigArray, $filename) {
	if (is_writable($filename)) {
		$handle = fopen($filename, 'w') ;
		foreach($bigArray as $fields) {
			fputcsv($handle, $fields);
		}
		fclose($handle);
	}
}

if (!empty($_POST)) {
	$errors = [];
	$new_contact['name'] = $_POST['name'];
	$new_contact['address'] = $_POST['address'];
	$new_contact['city'] = $_POST['city'];
	$new_contact['state'] = $_POST['state'];
	$new_contact['zip'] = $_POST['zip'];
	$new_contact['phone'] = $_POST['phone'];
 	
 	foreach($new_contact as $key => $value) {
 		if (empty($value)) {
 			$errors[] = $key . ' is empty. Please enter valid data.';
 		}
 	}

	array_push($address_book, $new_contact);
}
	write_csv($address_book, $filename);
	//var_dump($address_book);
?>

<!DOCTYPE>
<head>
	<meta charset="utf-8">
	<title>Using CSV Files: Writing CSV Data</title>
</head>
<body>
	<div class="container">
		<h1>Address Book</h1>
		<table style="width:700px"; border='1'>
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th>City</th>
				<th>State</th>
				<th>Zip</th>
			</tr
			<? foreach ($address_book as $fields) : ?>
			<tr>
				<? foreach ($fields as $value) : ?>
				<td><? echo $value; ?></td>
				<? endforeach?>
			</tr>
	<? endforeach?>
	</table>
		<?
		
		if (!empty($errors)) {
			foreach($errors as $error) {
				echo ucfirst($error) . "<br>";
			}
		}
		?>

		<form method="POST">
			<p>
				<label for="Name">Name:</lable>
				<input id="Name" name="name" type="text" placeholder="Enter Name">
			</p>
			<p>
				<label for="Address">Address:</lable>
				<input id="Address" name="address" type="text" placeholder="Enter Address">
			</p>
			<p>
				<lable for="City">City:</lable>
				<input id="City" name="city" type="text" placeholder="Enter City">
			</p>
			<p>
				<label for="State">State:</label>
				<input id="State" name="state" type="text" placeholder="Enter State">
			</p>
			<p>
				<label for="Zip">Zip:</lable>
				<input id="Zip" name="zip" type="text" placeholder="Enter Zip">
			</p>
			<p>
				<label for="Phone">Phone:</label>
				<input id="Phone" name="phone" type="text" placeholder="Enter Phone Number">
			</p>
			<p>	
				<button type="Submit">Enter</button>
			</p>
		</form>
</body>
</html>









	



		
