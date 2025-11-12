<?php
// Recupera o ID do paciente da URL
$id_paciente = $_GET['id'];

// Incluir o arquivo de conexão
include "ligacao.php";

// Preparar a consulta SQL para excluir o paciente
$sql_excluir = "DELETE FROM pacientes WHERE id_paciente = ?";
$stmt_excluir = $con->prepare($sql_excluir);

// Verificar se a preparação da consulta foi bem-sucedida
if ($stmt_excluir) {
    // Vincular o parâmetro do ID do paciente ao espaço reservado na consulta SQL
    $stmt_excluir->bind_param("i", $id_paciente);

    // Executar a consulta preparada
    if ($stmt_excluir->execute()) {
        // Redirecionar para a página "DoentesSec.php"
        echo "<script>window.location.href = 'DoentesSec.php?sucess=1';</script>";
    } else {
        echo "Erro ao excluir o paciente: " . $stmt_excluir->error;
    }

    // Fechar a declaração
    $stmt_excluir->close();
} else {
    echo "Erro ao preparar a consulta SQL: " . $con->error;
}

// Fechar a conexão com o banco de dados
$con->close();
?>




