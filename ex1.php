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

$num = 5; // the number whose factorial we want to find
$factorial = 1;

for($i = 1; $i <= $num; $i++) {
$factorial *= $i;
}

echo "Factorial of $num is: $factorial";

?>

</body>
</html>