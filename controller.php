<?php
   function connection()
   {
      $host='localhost';
      $user='root';
      $pass='';
      $db="cholo_db";

      $con=new mysqli($host,$user,$pass,$db);

      if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
     return $con;
   }
?>