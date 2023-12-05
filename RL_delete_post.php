<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

$servername = "localhost";
$username = "oksusu";
$password = "450256";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(array("success" => false, "message" => "Database connection failed: " . $conn->connect_error)));
}

$post_id = intval($_POST["no"]);

$sql = "DELETE FROM recommandinputbox WHERE no = $post_id";
$result = $conn->query($sql);

if ($result === TRUE) {
    echo json_encode(array("success" => true, "message" => "Post deleted successfully"));
} else {
    echo json_encode(array("success" => false, "message" => "Error: " . $conn->error));
}

$conn->close();
?>
