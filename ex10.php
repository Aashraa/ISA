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
    function isArmstrong($number){
        $sum=0;
        $numDigits = strlen((string)$number);
        $temp = $number;
        while ($temp > 0){
            $digit = $temp % 10;
            $sum += pow($digit, $numDigits);
            $temp = floor($temp/ 10);
        }
        if ($number == $sum){
            return true;
        }
        else{
            return false;
        }
    }
    $number =153;
    if (isArmstrong($number)){
        echo "$number is an Armstrong number.";

    }else{
        echo"$number is not an Armstrong number.";
    }
    ?>
</body>
</html>