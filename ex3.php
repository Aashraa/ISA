<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body>
 <?php
 $marks= 85;
 if ($marks >= 100){
    echo "Grade A+";
 }
 else if ($marks >= 90){
    echo "Grade A";
 }
 else if ($marks >= 80){
    echo "Grade B";
 }
 else if ($marks >= 70){
    echo "Grade C";
 }
 else if ($marks >= 60){
    echo "Grade D";
 }
 else{
    echo "Grade F";
 }
 ?>
</body>
</html>