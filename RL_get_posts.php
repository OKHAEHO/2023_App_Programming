<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "oksusu";
$password = "450256";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die(json_encode(array("success" => false, "message" => "데이터베이스 연결 실패")));
}

$sql = "SELECT * FROM recommandinputbox ORDER BY no DESC";
$result = $conn->query($sql);

$recommandinputbox = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $recommandinputbox[] = $row;
  }
}

echo json_encode($recommandinputbox);

$conn->close();
?>
