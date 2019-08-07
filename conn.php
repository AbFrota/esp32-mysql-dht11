<?php

function getConn (){
try {
    $conn = new PDO('mysql:host=localhost;dbname=id10302390_esp32exp', 'id10302390_root', 'pp40dciot');
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
      return;
  }

return $conn;
}
?>
