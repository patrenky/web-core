<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../config/database.php';
include_once '../news.php';
 
$database = new Database();
$db = $database->getConnection();
 
$news = new News($db);

$data = json_decode(file_get_contents("php://input"));
 
$news->id = $data->id;
$news->title = $data->title;
$news->time = $data->time;
$news->text = $data->text;

$news->update();
?>