<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
include_once '../config/database.php';
include_once '../news.php';
 
$database = new Database();
$db = $database->getConnection();

$news = new News($db);

$stmt = $news->read();
$num = $stmt->rowCount();

if($num > 0) {
    $arr = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $item = array(
            "id" => $id,
            "title" => $title,
            "time" => $time,
            "text" => $text
        );

        array_push($arr, $item);
    }
    echo json_encode($arr);
}
?>