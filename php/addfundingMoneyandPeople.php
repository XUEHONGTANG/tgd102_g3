<?php
include("./DB.php");


// $pdo->exec('');
$data = json_decode(file_get_contents("php://input"), true); //接收前端傳來的json格式

//建立SQL
$sql = " UPDATE LangTu.project set fundNow = :fundNow, Amount = :fundPeople where ID = :id ";


$statement = $pdo->prepare($sql);
$statement->bindValue(":fundNow", $data["fundNow"]);
$statement->bindValue(":fundPeople", $data["fundPeople"]);
$statement->bindValue(":id", $data["id"]);
$statement->execute();

 //抓出全部且依照順序封裝成一個二維陣列
//  $data = $statement->fetchAll();
 // if ($statement->rowCount() > 0){ //只要有撈到一筆資料 = 有撈到資料
 //     $data["successful"] = true; //successful的屬性數值顯示 true        
 // } else{   //如果沒有撈到資料...
 //     $data["successful"] = false;
 // }
 
 echo json_encode($data);
?>