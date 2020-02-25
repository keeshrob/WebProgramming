<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        p1{font-style: italic;}
    </style>
</head>
<body>
<p1>
    <?php
    $hello = "&quot;Good morning, Dave,&quot; said HAL.";
    echo $hello;
    ?>
</p1>
<br>

<p2>
    <?php
    $pi = 3.14159265359;
    $radius = 5;
    $a = $pi * pow($radius, 2);

    echo $a;
    ?>
</p2>

<br>

<p3>
    <?php
    $fahr = 459.67;
    $celsius = 5/9 * ($fahr-32);

    $echo $fahr;
    $echo $celsius;
    ?>
</p3>

<br>
<p4>
    <?php
        $string = "  PHP is fun  "
        $strglength = strlen($string) - sub($string, ' ')
        echo "There are $strglength characters";
        
    ?>
</p4>
<br>
<p6>
    <?php
        $test = hannah;
        $check = strrev($test);
        
        echo $check;
        if($test == $check){
            echo "<br> Palindrome!";
        }
        else {
            echo "<br> Not a palindrome";
        }
    ?>
</p6>
</body>
</html>
