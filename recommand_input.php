
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

// 사용자로부터 입력 받은 데이터
$category = $mysqli->real_escape_string($_POST['category']);
$food_name = $mysqli->real_escape_string($_POST['food_name']);

$sql = "INSERT INTO recommandinputbox (category, food_name) VALUES ('$category', '$food_name')";

if ($mysqli->query($sql)) {
    echo '<script>alert("success inserting")</script>';
} else {
    echo '<script>alert("fail to insert sql")</script>';
}

// 데이터베이스 연결 종료
$mysqli->close();
?>
<script>
    location.href = "RL_index.html";
</script>