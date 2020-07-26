<?php
$servername="localhost:8111";
$Username = "root";
$Password = "";
$dbname = "test";
$conn =mysqli_connect($servername, $Username, $Password, $dbname);
if ($conn) {
echo "success";
}
else {
  die('Connect Error'.mysqli_connect_error());

}

?>
