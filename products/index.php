<?php

// products
// 抽出

$dsn = "mysql:dbname=smorita;host=localhost";

try{
  // DB接続
  $db = new PDO($dsn, "smorita", "eccMyAdmin");

  $sql = "
    SELECT
      p.id,
      p.name,
      c.id as category_id,
      c.name as category_name,
      p.price
    FROM
      webapi_products as p
    LEFT OUTER JOIN
      webapi_categories as c
    ON
      p.category = c.id
    ";

  $stmt = $db -> prepare($sql);
  $stmt -> execute();

  while($row = $stmt -> fetchObject()) {
    $products[] = $row;
  }

  // var_dump($products);
  // var_dump(http_response_code(404));

}
catch(PDOException $e) {
  http_response_code(404);
}
catch(Exception $e) {

}


header("Content-Type: application/json");
print json_encode($products);