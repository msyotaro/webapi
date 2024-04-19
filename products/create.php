<?php

// product
// 挿入（新規登録）

try{
  if($_SERVER ["REQUEST_METHOD"] !== "POST"){
    http_response_code( 405 );
    throw new Exception( "Bad Request" );
  }

  // fromからのPOSTデータへのアクセス
  if( ! empty($_POST)){
    // $postData = json_encode($_POST);
    // $postData = json_decode($postData);

    $postData = $_POST;
    $temp = new stdClass();
    $temp -> name = $_POST["name"];
    foreach($_POST as $k => $v) {
      $temp -> $k = $v;
    }
    $postData = $temp;
  }
  // from以外からのPOSTデータへのアクセス
  else{
  // php://input
  $postData = file_get_contents("php://input");
  $postData = json_decode($postData);
  }

  var_dump($postData);

  // database接続
  $db = new PDO("mysql:dbname=smorita;host=localhost","smorita","eccMyAdmin");
  // SQL文の用意(INSERT)
  $sql = "
    INSERT INTO webapi_products(name,price,category)
    VALUES(:name,:price,:category)
  ";

  // ステートメントを作成
  $stmt = $db -> prepare($sql);
  // SQL文内のプレースホルダーへ値を割り当てる

  // ステートメントの実行
  $stmt -> execute([
    "name"=> $postData -> name,
    "price"=> $postData -> price,
    "category"=> $postData -> category
  ]);


}

catch(PDOException $e) {
  print $e -> getMessage();
}
catch(Exception $e){
  print $e -> getMessage();
}
