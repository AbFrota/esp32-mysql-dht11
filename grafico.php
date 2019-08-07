<?php
//Inclui a conexão com o BD
include 'conn.php';//Faz o SELECT da tabela, usando Prepared Statements.

try {
  $conn = getConn();
$sql = "SELECT  data, hora, temperatura FROM tbColeta";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  
  $result = $stmt->fetchAll();
  
  if ( count($result) ) { 
    foreach($result as $row) {
      print_r($row);
    }   
  } else {
    echo "Nennhum resultado retornado.";
  }
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

    