<?php

try {
    // Code that might throw an exception
    $number = 0;
    $result = 10 / $number; // This will throw a DivisionByZeroError

} catch (DivisionByZeroError $e) {
    // Handle the specific exception
    echo "An error occurred: " . $e->getMessage() . "<br>";
    echo "Error line: " . $e->getLine() . "<br>";
} catch (Exception $e) {
    // Handle other exceptions (if any)
    echo "A general exception occurred: " . $e->getMessage() . "<br>";
} finally {
    // Code that always executes
    echo "This code will always execute, regardless of exceptions.<br>";
}

echo "Program continues execution after exception handling.<br>";

?>