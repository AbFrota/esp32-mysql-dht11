<?php
//Incluimos o código de conexão ao BD
include 'conn.php';
$conn = getConn();
//Variável responsável por guardar o valor enviado pelo ESP8266
$temp = $_GET['temp'];

//Captura a Data e Hora do SERVIDOR (onde está hospedada sua página):
$hora = date('H:i:s');
$data = date('Y-m-d');

// $temp . " : " . $data . " : " . $hora;


try {
    //Insere no Banco de Dados, usando Prepared Statements.
    $sql = "INSERT INTO tbColeta   VALUES (NULL,:data,:hora,:temp)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam( ':data',$data);
    $stmt->bindParam( ':hora',$hora);
    $stmt->bindParam( ':temp',$temp);
    $stmt->execute();
    echo 'Dados gravados com sucesso!';
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

?>