<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
// PHP code to check for Palindrome number in PHP
// Function to check for Palindrome
function Palindrome($number){ 
    $temp = $number; 
    $new = 0; 
    while (floor($temp)) { 
        $d = $temp % 10; 
        $new = $new * 10 + $d; 
        $temp = $temp/10; 
    } 
    if ($new == $number){ 
        return 1; 
    }
    else{
        return 0;
    }
} 
 
// Driver Code
$original = 1441;
if (Palindrome($original)){ 
    echo "Palindrome"; 
}
else { 
echo "Not a Palindrome"; 
}
 
?> 
</body>
</html>