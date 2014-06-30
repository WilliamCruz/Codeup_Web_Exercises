<?
//William Cruz
//6/2/14
//Using CSV Files: Writing CSV data

$addressBook = [];
$errors = [];

class AddressDataStore {

	public $filename = '';

	public function __construct($filename)
	{
		$this->filename = $filename;
	}

	public function readAddressBook()
	{
	    $addressBook = [];

		$handle = fopen($this->filename, 'r');
		while(!feof($handle)) {
			$row = fgetcsv($handle);
			if (is_array($row)) {
		  		$addressBook[] = $row;
			}
		}
		fclose($handle);
		return $addressBook;
	}
	
	public function writeAddressBook($addressBook) 
	{
	    if (is_writable($this->filename)) {
			$handle = fopen($this->filename, 'w');
			foreach($addressBook as $newContact) {
				fputcsv($handle, $newContact);
			}
			fclose($handle);
		}
	}
	public function uploadfile()
	{

	}

}
$ads = new AddressDataStore('address_book.csv');

$addressBook = $ads->readAddressBook();
        
	if (isset($_GET['id'])){
		unset($addressBook[$_GET['id']]);
		$ads->writeAddressBook($addressBook);
	}
if (!empty($_POST)) {

	if (!empty($_POST['name']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['zip']))
	{
		$newAddress = [];
	 	$newAddress['name'] = $_POST['name'];
	 	$newAddress['address'] = $_POST['address'];
	 	$newAddress['city'] = $_POST['city'];
	 	$newAddress['state'] = $_POST['state'];
	 	$newAddress['zip'] = $_POST['zip'];
	 	if (empty($_POST['phone'])) {
	 		$newAddress['phone'] = 'N/A';
	 	} else {
	 		$newAddress['phone'] = $_POST['phone'];
	 	}
		
		$addressBook[] = $newAddress;
		$ads->writeAddressBook($addressBook);
	}
	else
	{ 	
		foreach ($_POST as $key=>$value) {
			if (empty($value)) {
			$errors[] = $key . ' is empty. Please enter valid data.';
			}
		}
	}
}
//add deconstruct function************************************
// class ClassName {

//     // Executes when class no longer referenced
//     function __destruct() 
//     {
//         // statements
//     }

// }



// Verify there were uploaded files and no errors
if (count($_FILES) > 0 && $_FILES['file1']['error'] == 0) {

    if ($_FILES['file1']["type"] != "text/csv") {
        echo "ERROR: file must be in text/csv";
    } else {
        // Set the destination directory for uploads
        // Grab the filename from the uploaded file by using basename
        $upload_dir = '/vagrant/sites/codeup.dev/public/uploads/';
        $uploadFilename = basename($_FILES['file1']['name']);
        // Create the saved filename using the file's original name and our upload directory
        $saved_filename = $upload_dir . $uploadFilename;
        // Move the file from the temp location to our uploads directory
        move_uploaded_file($_FILES['file1']['tmp_name'], $saved_filename);

        // load the new csv
        $ups = new AddressDataStore($saved_filename);
        $address_uploaded = $ads->readAddressBook();
        // merge with existing table
        $addressBook = array_merge($addressBook, $address_uploaded);
        $ads->writeAddressBook($addressBook);
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
				<th>Phone</th>
				<th>Delete</th>

			</tr
			<? foreach ($addressBook as $index => $row) : ?>
			<tr>
				<? foreach ($row as $column) : ?>
				<td><?= $column; ?></td>
				<? endforeach?>
				<td>
					<? 
						echo "<a href ='?id=$index'>Remove Contact</a>";
					?>
				</td>
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
	<h1>Upload CSV File</h1>
	<form method="POST" enctype="multipart/form-data" action='address_book.php'>
		<p>
			<label for="file1">Upload CSV File:</label> 
			<input id="file1" name="file1" type="file"> 
		</p>
			<button type="Upload File Here">Upload</button> 

	</form>

</body>
</html>
