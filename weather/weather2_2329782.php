<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');

// Connect to database
$mysqli = new mysqli("sql206.epizy.com", "epiz_34234575", "fxqHLToszpT","epiz_34234575_weather");

// connecting to database
mysqli_query($mysqli, 'use epiz_34234575_weather');
// Execute SQL query
$result = mysqli_query($mysqli, 'select*from epiz_34234575_weather;');

// Get data, convert to JSON and print
$data = new stdClass;
while ($row = $result->fetch_assoc()) {
    $data = $row;
};
echo json_encode($data);
?>