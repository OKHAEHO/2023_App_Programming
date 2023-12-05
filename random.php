<?php

$servername = "localhost";
$username = "oksusu";
$password = "450256";
$dbname = "test";

// MySQL 데이터베이스에 연결
$mysqli = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_GET['category'])) {
    $category = $_GET['category'];

    // SQL 쿼리 수정 (카테고리 별로 랜덤 추천)
    $sql = "SELECT * FROM recommandinputbox WHERE category = '$category' ORDER BY RAND() LIMIT 1";
} else {
    // SQL 쿼리 수정 (전체 데이터에서 랜덤 추천)
    $sql = "SELECT * FROM recommandinputbox ORDER BY RAND() LIMIT 1";
}

$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $category = $row['category'];
    $food_name = $row['food_name'];

    $response = array(
        'recommendation' => $category,
        'food_name' => $food_name
    );

    // JSON 형식으로 응답 반환
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    echo json_encode(array('error' => 'No data found'));
}

// 연결 닫기
$mysqli->close();
?>