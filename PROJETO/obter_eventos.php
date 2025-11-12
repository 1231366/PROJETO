<?php
// Inclua o arquivo de conexão com o banco de dados e outras configurações necessárias
include 'ligacao.php';

// Obtenha a data atual
$dataAtual = date('Y-m-d');

// Query para obter os eventos de consulta agendados para o dia atual
$queryEventos = "SELECT id_consulta, data_hora_inicio, data_hora_fim FROM consultas WHERE DATE(data_hora_inicio) = '$dataAtual'";
$resultadoEventos = mysqli_query($con, $queryEventos);

// Array para armazenar os eventos
$eventos = array();

// Percorra os resultados da consulta
while ($row = mysqli_fetch_assoc($resultadoEventos)) {
  // Crie um evento para cada consulta agendada
  $evento = array(
    'id' => $row['id_consulta'],
    'start' => $row['data_hora_inicio'],
    'end' => $row['data_hora_fim']
  );

  // Adicione o evento ao array de eventos
  array_push($eventos, $evento);
}

// Converta o array de eventos em formato JSON
echo json_encode($eventos);
?>