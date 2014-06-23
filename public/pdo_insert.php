<?php
//WIlliam Cruz
//6-20-14
//PHP with MYSQL - Query DB - Using PDO to Execute Queries
// Get new instance of PDO object
$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_test_db', 'william', 'vitzma_16');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

// Create the query and assign to var
$query = 'CREATE TABLE National_Parks (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    location VARCHAR(240) NOT NULL,
    date_established DATE,
    area DECIMAL(6,2),
    PRIMARY KEY (id)
)';

// Run query, if there are errors they will be thrown as PDOExceptions


$National_Parks =[
		['name' => 'Acadia', 'location' => 'Maine', 'date_established' => 'Frebruary 26, 1919', 'area' => '47389.67'],
		['name' => 'American Sanoma', 'location' => 'American Sanoma', 'date_established' => 'October 31, 1988', 'area' => '9000.00'],
		['name'	=> 'Arches', 'location' => 'Utah', 'date_established' => 'November 12, 1971', 'area' => '76518.98'],
		['name'	=> 'Badlands', 'location' => 'South Dakota', 'date_established' => 'November 10, 1978', 'area' => '242755.94'],
		['name'	=> 'Big Bend', 'location' => 'Texas', 'date_established' => 'June 12, 1944', 'area' => '801163.21'],
		['name'	=> 'Biscayne', 'location' => 'Florida', 'date_established' => 'June 28, 1980', 'area' => '172924.07'],
		['name'	=> 'Black Canyon of the Gunnison', 'location' => 'Colorado', 'date_established' => 'October 21, 1999', 'area' => '32950.03'],
		['name'	=> 'Bryce Canyon', 'location' => 'Utah', 'date_established' => 'February 25, 1928', 'area' => '35835.08'],
		['name'	=> 'Canyonlands', 'location' => 'Utah', 'date_established' => 'September 12, 1964', 'area' => '337597.83'],
		['name'	=> 'Capitol Reef', 'location' => 'Utah', 'date_established' => 'December 18, 1971', 'area' => '241904.26'],
		['name'	=> 'Carlsbad Caverns', 'location' => 'New Mexico', 'date_established' => 'May 14, 1930', 'area' => '46766.45'],
];

foreach ($National_Parks as $national_park) {
    $query = "INSERT INTO National_Parks (name, location, date_established, area) 
    	VALUES ('{$national_park['name']}', '{$national_park['location']}', 
    		'{$national_park['date_established']}', '{$national_park['area']}')";

    $dbc->exec($query);

    echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}



