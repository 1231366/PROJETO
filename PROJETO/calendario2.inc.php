<?php
include 'ligacao.php';
session_start();

if (isset($_POST['submeter'])) {
    // Capturar os valores do formulário
    $pacienteId = $_POST['id_paciente'];
    $dataI = $_POST['dataI'];
    $dataF = $_POST['dataF'];
    $hora = $_POST['time'];
    $sitio = $_POST['sitio'];
    $tipoConsulta = $_POST['tipo_consulta'];

    // Validar se o paciente foi selecionado
    if (empty($pacienteId)) {
        die('Selecione um paciente.');
    }

    // Montar a data e hora completa para a consulta
    $dataHoraInicio = $dataI . ' ' . $hora;

    // Definir a lógica para calcular a data e hora final da consulta
    $dataHoraFim = date('Y-m-d H:i', strtotime($dataHoraInicio . ' + 20 minutes'));
    if ($tipoConsulta == 2) {
        // Se o tipo de consulta for 2, manter a data_hora_fim como "0000-00-00 00:00:00"
        $dataHoraFim = date('Y-m-d H:i', strtotime($dataHoraInicio . ' + 30 minutes'));
    }

    // Capturar o ID do trabalhador através da variável de sessão (ajuste o nome da variável de acordo com a sua implementação)
    $idTrabalhador = $_SESSION['id_trabalhador'];

    // Inserir os dados na tabela de consultas
    $query = "INSERT INTO consultas (id_paciente, id_trabalhador, data_hora_inicio, data_hora_fim, id_tipo_consulta, sitio)
            VALUES ('$pacienteId', '$idTrabalhador', '$dataHoraInicio', '$dataHoraFim', '$tipoConsulta','$sitio')";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die('Erro ao inserir consulta no banco de dados: ' . mysqli_error($con));
    }

    // Exibir mensagem de sucesso ou redirecionar para outra página
    header("location:AP_inicial.php?sucess=3");
}
if (isset($_POST['enviar'])) {
    $id=$_GET['id'];
    $dia=$_POST['date'];
    $hora=$_POST['hours'];
    $id_consulta=$_POST['id_consulta'];
    $tipoConsulta=$_POST['tipo_consulta'];


        // Montar a data e hora completa para a consulta
        $dataHoraInicio = $dia . ' ' . $hora;

        // Definir a lógica para calcular a data e hora final da consulta
        $dataHoraFim = date('Y-m-d H:i', strtotime($dataHoraInicio . ' + 20 minutes'));
        if ($tipoConsulta == 2) {
            // Se o tipo de consulta for 2, manter a data_hora_fim como "0000-00-00 00:00:00"
            $dataHoraFim = date('Y-m-d H:i', strtotime($dataHoraInicio . ' + 30 minutes'));
        }

        $query= "UPDATE consultas set data_hora_inicio='$dataHoraInicio', data_hora_fim='$dataHoraFim' where id_consulta=$id_consulta";
        $result = mysqli_query($con, $query);

        if (!$result) {
            die('Erro ao inserir consulta no banco de dados: ' . mysqli_error($con));
        }
        header("location:AP_inicial.php?sucess=4");
    }

    if(isset($_GET['id_consulta'])){
        $id=$_GET['id'];
        $id_consulta=$_GET['id_consulta'];

        $query="DELETE FROM consultas where id_consulta=$id_consulta and id_trabalhador=$id";

        $result = mysqli_query($con, $query);

        if (!$result) {
            die('Erro ao inserir consulta no banco de dados: ' . mysqli_error($con));
        }
        header("location:AP_inicial.php?sucess=5");

    }
    
        

?>