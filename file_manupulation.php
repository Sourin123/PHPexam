<?php

// 1. To Create and Open a File
$filename = 'example.txt';

if (!file_exists($filename)) {
    $file = fopen($filename, 'w'); // Create a new file for writing
    if ($file) {
        echo "File '$filename' created successfully.<br>";
        fclose($file);
    } else {
        echo "Failed to create file '$filename'.<br>";
    }
} else {
    echo "File '$filename' already exists.<br>";
}

// 2. To Read File
function readFileContent($filename) {
    if (file_exists($filename)) {
        $content = file_get_contents($filename);
        echo "Contents of '$filename':<br>";
        echo nl2br(htmlspecialchars($content)) . "<br>";
    } else {
        echo "File '$filename' does not exist.<br>";
    }
}

// 3. To Write File
function writeFileContent($filename, $content) {
    $file = fopen($filename, 'w'); // Open file for writing
    if ($file) {
        fwrite($file, $content);
        echo "Data written to '$filename'.<br>";
        fclose($file);
    } else {
        echo "Failed to open file '$filename' for writing.<br>";
    }
}

// 4. To Concatenate File
function concatenateFiles($file1, $file2, $destinationFile) {
    if (file_exists($file1) && file_exists($file2)) {
        $content1 = file_get_contents($file1);
        $content2 = file_get_contents($file2);

        $combinedContent = $content1 . "\n" . $content2;
        writeFileContent($destinationFile, $combinedContent);
        echo "Files '$file1' and '$file2' concatenated into '$destinationFile'.<br>";
    } else {
        echo "One or both files do not exist.<br>";
    }
}

// Example usage:

// Write some initial content to the file
writeFileContent($filename, "Hello, World!\nThis is a new file.");

// Read the file content
readFileContent($filename);

// Create another file to demonstrate concatenation
$anotherFile = 'another_example.txt';
writeFileContent($anotherFile, "This is the second file.\nIt has more content.");

// Concatenate the two files into a new file
$concatenatedFile = 'concatenated_example.txt';
concatenateFiles($filename, $anotherFile, $concatenatedFile);

// Read the concatenated file content
readFileContent($concatenatedFile);

?>