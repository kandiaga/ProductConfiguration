<?php
// Retrieve color and size from GET request
$color = $_GET['color'];
$size = $_GET['size'];

// Example: Price calculation based on options
$price = 0;
if ($color == 'red') {
    $price += 5;
} elseif ($color == 'blue') {
    $price += 7;
} elseif ($color == 'green') {
    $price += 6;
}

if ($size == 'small') {
    $price += 2;
} elseif ($size == 'medium') {
    $price += 3;
} elseif ($size == 'large') {
    $price += 4;
}

// Output the calculated price
echo "Total Price: $" . $price;
?>
