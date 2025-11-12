<?php
// Inclua o arquivo de conexão
include "ligacao.php";

// Verifique se o parâmetro 'name' foi enviado via GET
if (isset($_GET['name'])) {
  $name = $_GET['name'];

  // Prepare a consulta SQL para buscar os pacientes com base no nome
  $stmt = $con->prepare('SELECT id, name FROM pacientes WHERE name LIKE :name');
  $stmt->bindValue(':name', '%' . $name . '%', PDO::PARAM_STR);
  $stmt->execute();

  // Obtenha os resultados da consulta
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Retorna os resultados como um array JSON
  echo json_encode($results);
}
?>