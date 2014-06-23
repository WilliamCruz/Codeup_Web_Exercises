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
    area DECIMAL,
    PRIMARY KEY (id)
)';

// Run query, if there are errors they will be thrown as PDOExceptions


$National_Parks =[
		['name' => 'Acadia', 'location' => 'Maine', 'date_established' => '1919-02-26', 'area' => '47389.67'],
		['name' => 'American Sanoma', 'location' => 'American Sanoma', 'date_established' => '1988-10-31', 'area' => '9000.00'],
		['name'	=> 'Arches', 'location' => 'Utah', 'date_established' => '1971-11-12', 'area' => '76518.98'],
		['name'	=> 'Badlands', 'location' => 'South Dakota', 'date_established' => '1978-11-10', 'area' => '242755.94'],
		['name'	=> 'Big Bend', 'location' => 'Texas', 'date_established' => '1944-06-12', 'area' => '801163.21'],
		['name'	=> 'Biscayne', 'location' => 'Florida', 'date_established' => '1980-06-28', 'area' => '172924.07'],
		['name'	=> 'Black Canyon of the Gunnison', 'location' => 'Colorado', 'date_established' => '1999-10-21', 'area' => '32950.03'],
		['name'	=> 'Bryce Canyon', 'location' => 'Utah', 'date_established' => '1928-02-25', 'area' => '35835.08'],
		['name'	=> 'Canyonlands', 'location' => 'Utah', 'date_established' => '1964-09-12', 'area' => '337597.83'],
		['name'	=> 'Capitol Reef', 'location' => 'Utah', 'date_established' => '1971-12-18', 'area' => '241904.26'],
];

foreach ($National_Parks as $national_park) {
    $query = "INSERT INTO National_Parks (name, location, date_established, area) 
    	VALUES ('{$national_park['name']}', '{$national_park['location']}', 
    		'{$national_park['date_established']}', '{$national_park['area']}')";

    $dbc->exec($query);

    echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}



