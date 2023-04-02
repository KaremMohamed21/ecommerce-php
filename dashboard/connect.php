<?php
  // $servername = "localhost";
  // $username = "root";
  // $password = "";
  // $db_name = "shop";

  // // Create connection
  // $conn = mysqli_connect($servername, $username, $password, $db_name);

  // // Check connection
  // if (!$conn) {
  //   die("Connection failed: " . mysqli_connect_error());
  // }
  
  // // echo "Connected successfully";

  $servername = "localhost";
  $username = "root";
  $password = "";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=shop", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

?>