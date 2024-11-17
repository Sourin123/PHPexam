<?php
include "./library.php";
$conn = get_db_connection();

// Function to fetch first 50 entries
function getFirst50Entries($conn) {
    $sql = "SELECT * FROM mock_data ORDER BY id ASC LIMIT 50";
    return $conn->query($sql);
}

// Function to fetch a user-defined range
function getEntriesInRange($conn, $start, $limit) {
    $sql = "SELECT * FROM mock_data ORDER BY id ASC LIMIT ?, ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $start, $limit);
    $stmt->execute();
    return $stmt->get_result();
}

// Function to fetch last 50 entries
function getLast50Entries($conn) {
    $sql = "SELECT * FROM mock_data ORDER BY id DESC LIMIT 50";
    $result = $conn->query($sql);
    return $result;
}

// Fetch and display first 50 entries
echo "First 50 Entries:<br>";
$result = getFirst50Entries($conn);
while ($row = $result->fetch_assoc()) {
    echo $row['id']    . "<br>"; // Change this to display other columns
}

// Fetch and display entries in a user-defined range
$user_start = 10; // Example start
$user_limit = 20; // Example limit
echo "Entries from $user_start to " . ($user_start + $user_limit) . ":<br>";
$result = getEntriesInRange($conn, $user_start, $user_limit);
while ($row = $result->fetch_assoc()) {
    echo $row['id'] . "<br>";
}

// Fetch and display last 50 entries
echo "Last 50 Entries:<br>";
$result = getLast50Entries($conn);
while ($row = $result->fetch_assoc()) {
    echo $row['id'] . "<br>";
}

$conn->close();
?>