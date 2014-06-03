<?
//William Cruz
//6/2/14
//Using CSV Files: Writing CSV data



class AddressDataStore {

    public $filename = 'address_book.csv';

    function read_address_book()
    {
        $address_book = [];
		$handle = fopen($this->filename, 'r');
		while(!feof($handle)) {
			$row = fgetcsv($handle);
			if (is_array($row)) {
		  	$address_book[] = $row;
			}
		}
		fclose($handle);
		return $address_book;
    }

    function write_address_book($addresses_array) 
    {
        
        // Code to write $addresses_array to file $this->filename
    }

}


$address_book = [];
//Reading csv data
$filename = 'address_book.csv';

function read_csv($filename) {
	$address_book = [];
	$handle = fopen($filename, 'r');
	while(!feof($handle)) {
		$row = fgetcsv($handle);
		if (is_array($row)) {
	  	$address_book[] = $row;
		}
	}
	fclose($handle);
	return $address_book;
}		
//writing to csv data
$new_contact=[];
$filename = "address_book.csv";
$address_book = read_csv($filename);

function write_csv($bigArray, $filename) {
	if (is_writable($filename)) {
		$handle = fopen($filename, 'w');
		foreach($bigArray as $new_contact) {
			fputcsv($handle, $new_contact);
		}
		fclose($handle);
	}
}
if (!empty($_POST)) {
	$new_contact = $_POST;
 	
 	foreach($new_contact as $key => $value) {
 		if (empty($value)) {
 			$errors[] = $key . ' is empty. Please enter valid data.';
 		}
 	}
	if (empty($errors)) {
		$address_book[] = $new_contact;
		write_csv($address_book, $filename);
		$address_book = read_csv($filename);
	} else {
		
	}
}
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
	<br>
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
				<input id="Phone" name="phone" type="text" placeholder="Optional">
			</p>
			<p>	
				<button type="Submit">Enter</button>
			</p>
		</form>
</body>
</html>









	



		
