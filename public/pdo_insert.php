<?php
//WIlliam Cruz
//6-20-14
//PHP with MYSQL - Query DB - Using PDO to Execute Queries
// Get new instance of PDO object
$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_test_db', 'william', 'vitzma_16');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



// Create the query and assign to var, create table
// $query = 'CREATE TABLE National_Parks (
//     id INT UNSIGNED NOT NULL AUTO_INCREMENT,
//     name VARCHAR(50) NOT NULL,
//     location VARCHAR(240) NOT NULL,
//     date_established DATE,
//     area FLOAT(2),
//     description TEXT,
//     PRIMARY KEY (id)
// )';

// // Run query, if there are errors they will be thrown as PDOExceptions
// $dbc->exec($query);


$National_Parks =[
        ['name' => 'Acadia', 'location' => 'Maine', 'date_established' => '1919-02-26', 'area' => '47389.67', 'description' => 'test1'],
        ['name' => 'American Sanoma', 'location' => 'American Sanoma', 'date_established' => '1988-10-31', 'area' => '9000.00', 'description' => 'test1'],
        ['name' => 'Arches', 'location' => 'Utah', 'date_established' => '1971-11-12', 'area' => '76518.98', 'description' => 'test1'],
        ['name' => 'Badlands', 'location' => 'South Dakota', 'date_established' => '1978-11-10', 'area' => '242755.94', 'description' => 'test1'],
        ['name' => 'Big Bend', 'location' => 'Texas', 'date_established' => '1944-06-12', 'area' => '801163.21', 'description' => 'test1'],
        ['name' => 'Biscayne', 'location' => 'Florida', 'date_established' => '1980-06-28', 'area' => '172924.07', 'description' => 'test1'],
        ['name' => 'Black Canyon of the Gunnison', 'location' => 'Colorado', 'date_established' => '1999-10-21', 'area' => '32950.03', 'description' => 'test1'],
        ['name' => 'Bryce Canyon', 'location' => 'Utah', 'date_established' => '1928-02-25', 'area' => '35835.08', 'description' => 'test1'],
        ['name' => 'Canyonlands', 'location' => 'Utah', 'date_established' => '1964-09-12', 'area' => '337597.83', 'description' => 'test1'],
        ['name' => 'Capitol Reef', 'location' => 'Utah', 'date_established' => '1971-12-18', 'area' => '241904.26', 'description' => 'test1'],
];

    $stmt = $dbc->prepare("INSERT INTO National_Parks (name, location, date_established, area, description) 
        VALUES (:name, :location, :date_established, :area, :description)");

foreach ($National_Parks as $national_park) {
    $stmt->bindValue(':name', $national_park['name'], PDO::PARAM_STR);
    $stmt->bindvalue(':location', $national_park['location'], PDO::PARAM_STR);
    $stmt->bindvalue(':date_established', $national_park['date_established'], PDO::PARAM_STR);
    $stmt->bindvalue(':area', $national_park['area'], PDO::PARAM_STR);
    $stmt->bindvalue(':description', $national_park['description'], PDO::PARAM_STR);
    $stmt->execute();
}





