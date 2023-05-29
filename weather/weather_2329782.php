<!DOCTYPE html>
<html>
<head>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      text-align: left;
      padding: 8px;
      border-bottom: 1px solid #ddd;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    th {
      background-color: #4CAF50;
      color: white;
    }
  </style>
</head>
<body>
<?php

    // Connect to database, create database, and select it
    $mysqli = new mysqli("sql206.epizy.com", "epiz_34234575", "fxqHLToszpT", "epiz_34234575_weather");
    mysqli_query($mysqli, "CREATE DATABASE IF NOT EXISTS epiz_34234575_weather");
    mysqli_query($mysqli, "USE epiz_34234575_weather");


    // Create table if it doesn't exist 
    mysqli_query($mysqli, "create table if not exists weather(description varchar(20), temperature float(10), wind_speed float(10), city varchar(20), pressure float(10), humidity float(10), icon varchar(10), dt float(20))");

    // URL for openweathermap API call
    $url = 'https://api.openweathermap.org/data/2.5/weather?q=belfast&appid=fbfacabfab5d390352db75280774894d';

    // Get data from openweathermap and store in JSON object
    $data = file_get_contents($url);
    $json = json_decode($data, true);

    // Fetch required fields from JSON object
    $description = $json['weather'][0]['description'];
    $temperature = $json['main']['temp'];
    $wind_speed = $json['wind']['speed'];
    $city = $json['name'];
    $pressure = $json['main']['pressure'];
    $humidity = $json['main']['humidity'];
    $icon = $json['weather'][0]['icon'];
    $dt = $json['dt'];

    // Insert data into weather_data table
    mysqli_query($mysqli, "insert into weather1(description, temperature, wind_speed, city, pressure, humidity, icon, dt) values('$description', $temperature, $wind_speed, '$city',  $pressure, $humidity, '$icon', $dt)");    

    // Build SQL query to retrieve weather data of past week
    $sql = "SELECT * FROM weather1 WHERE dt >= UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 1 WEEK))";

    // Execute SQL query and retrieve results
    $result = mysqli_query($mysqli, $sql);

//     Start building the table
//     echo "<table>";

// // Loop through results and display data
// while($row = mysqli_fetch_assoc($result)) {
//   echo "<tr><td><strong>Description:</strong></td><td>" . $row['description'] . "</td></tr>";
//   echo "<tr><td><strong>Temperature:</strong></td><td>" . $row['temperature'] . "</td></tr>";
//   echo "<tr><td><strong>Wind Speed:</strong></td><td>" . $row['wind_speed'] . "</td></tr>";
//   echo "<tr><td><strong>City:</strong></td><td>" . $row['city'] . "</td></tr>";
//   echo "<tr><td><strong>Pressure:</strong></td><td>" . $row['pressure'] . "</td></tr>";
//   echo "<tr><td><strong>Humidity:</strong></td><td>" . $row['humidity'] . "</td></tr>";
//   echo "<tr><td><strong>Icon:</strong></td><td>" . $row['icon'] . "</td></tr>";
//   echo "<tr><td><strong>Date/Time:</strong></td><td>" . date('Y-m-d H:i:s', $row['dt']) . "</td></tr>";
// }

// // End the table
// echo "</table>";
// Start building the table
// echo "<table>";

// // Loop through results and display data
// while($row = mysqli_fetch_assoc($result)) {
//   echo "<tr><td><strong>Description:</strong></td><td>" . $row['description'] . "</td></tr>";
//   echo "<tr><td><strong>Temperature:</strong></td><td>" . $row['temperature'] . "</td></tr>";
//   echo "<tr><td><strong>Wind Speed:</strong></td><td>" . $row['wind_speed'] . "</td></tr>";
//   echo "<tr><td><strong>City:</strong></td><td>" . $row['city'] . "</td></tr>";
//   echo "<tr><td><strong>Pressure:</strong></td><td>" . $row['pressure'] . "</td></tr>";
//   echo "<tr><td><strong>Humidity:</strong></td><td>" . $row['humidity'] . "</td></tr>";
//   echo "<tr><td><strong>Icon:</strong></td><td>" . $row['icon'] . "</td></tr>";
//   echo "<tr><td><strong>Date/Time:</strong></td><td>" . date('Y-m-d H:i:s', $row['dt']) . "</td></tr>";
  
//   // Close the table row for this record
//   echo "</tr>";
// }

// // End the table
// echo "</table>";
// Start building the table
  echo "<table>";
  echo "<tr>";
  echo "<td>Description</td>";
  echo "<td>Temperature(k)</td>";
  echo "<td>Wind Speed(km/h)  </td>";
  echo "<td>City</td>";
  echo "<td>Pressure(hPa)</td>";
  echo "<td>Humidity(mm)</td>";
  echo "<td>Date/Time</td>";
  echo "</tr>";

// Loop through results and display data
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['description'] .   "</td>";
    echo "<td>" . $row['temperature'] . "</td>";
    echo "<td>" . $row['wind_speed'] . "</td>";
    echo "<td>" . $row['city'] . "</td>";
    echo "<td>" . $row['pressure'] . "</td>";
    echo "<td>" . $row['humidity'] . "</td>";
    echo "<td>" . date('Y-m-d H:i:s', $row['dt']) . "</td>";
    echo "</tr>";
}

// End the table
  echo "</table>";

?>
</body>
</html>
