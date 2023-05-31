<?php
require "../controller/config.php";
class Product1
{
 public function addProduct1($text, $data)
 {
  if (isset($text['submit'])) {
   //insert into table product1
   $connect = Config::getConnexion();
   $sql = "INSERT INTO product ( category, name, description) VALUES (?, ?, ?)";
   $request = $connect->prepare($sql);
   $request->execute(array($text["category"], $text["name"], $text["description"]));
   if (count($data['image1']['name'])) {
    $id = $connect->lastInsertId();
    //insert into table images 
    $p = count($data['image1']['name']);
    for ($i = 0; $i < $p; $i++) {
     $sql = "INSERT INTO file (file_name, file_type, data,user_id) VALUES (?,?,?,?);";
     $request = $connect->prepare($sql);
     $request->execute(array($data['image1']['name'][$i], $data['image1']['type'][$i], file_get_contents($data['image1']['tmp_name'][$i]), $id));
    }
   }
  }
 }
 public function showAdminProduct1()
 {
  $connect = Config::getConnexion();
  $sql = "select * from product";
  $request1 = $connect->prepare($sql);
  $request1->execute();
  $data1=$request1->fetchAll();
  $sql = "select * from file";
  $request2 = $connect->prepare($sql);
  $request2->execute();
  $data2 = $request2->fetchAll();
  echo ("<table border='1px solid'>
  <tr>
  <th>ID Product</th>
  <th>category of product</th>
  <th> product name</th>
  <th>product description</th>
  <th>File id</th>
  </tr>");
  foreach ($data1 as $row) {
   echo ("<tr>
   <td>" . $row['id'] . "</td>
   <td>" . $row['category'] . "</td>
   <td>" . $row['name'] . "</td>
   <td>" . $row['description'] . "</td>
   <td>");
   foreach($data2 as $row1){
    if($row1["user_id"] == $row["id"])
    echo "<img src=" ;echo base64_encode($row1['data']) ." alt=Image /> ";
   }
   echo "</td></tr>";
  }
 }
}
?>