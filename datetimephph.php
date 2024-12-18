<?php
// Original date string in dd/mm/yyyy format
 $original_date = "07/12/2024";

// Create a DateTime object from the original date string
$date = DateTime::createFromFormat("d/m/Y", $original_date);

// Format the date to mm/dd/yy
$new_date = $date->format("m/d/y");

// Output the new date string
echo $new_date; // Output: 12/07/24
 ?>