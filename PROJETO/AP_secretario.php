<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/index.global.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
    <script src="https://momentjs.com/downloads/moment.min.js"></script>
    <script src="
https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.8/index.global.min.js
"></script>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>



    <title>SGD-Arco Prado</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php
    session_start();
    if (!isset($_SESSION['nome']) || ($_SESSION['cargo'] !== 'secretário' )) {
        // Redirecione o usuário para a página de login
        echo '<script>window.location.href = "index.php";</script>';
        exit;
    }


    // Resto do código da página de administrador
    
    ?>
             <?php
if (isset($_GET['success']) && $_GET['success'] == 1) {
    // Remova o código do alert
}
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (window.location.search.includes('sucess=1')) {
            Toastify({
                text: 'Utente registado com sucesso',
                duration: 3000,
                destination: 'AP_inicial.php',
                newWindow: true,
                close: true,
                gravity: 'top',
                position: 'right',
                backgroundColor: 'linear-gradient(to right, #00b09b, #96c93d)',
                className: 'toastify-success',
                stopOnFocus: true,
                callback: function() {
                    var newUrl = window.location.href.replace('?success=1', '');
                    history.replaceState(null, null, newUrl);
                }
            }).showToast();
        }
    });
</script>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="AP_secretario.php">
                <div class="sidebar-brand-icon">
                    <img src="img/AP.png" class="logo-image">
                </div>
                <div class="sidebar-brand-text mx-3"></div>
            </a>

            <style>
                .logo-image {
                    width: 70px;
                    /* Defina a largura desejada para a imagem */
                    display: block;
                    /* Para centralizar horizontalmente */
                    margin: 0 auto;
                    /* Para centralizar horizontalmente */
                }
            </style>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="AP_secretario.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Página Inicial</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Utentes
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="+DoentesSec.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Registar Utente</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="DoentesSec.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Gestão de Doentes</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Gestão de Stocks
            </div>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseA"
                    aria-expanded="true" aria-controls="collapseA">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Stock em Armazem</span>
                </a>
                <div id="collapseA" class="collapse" aria-labelledby="headingA" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="GestaoMateriaisSec.php">Stock de Materiais</a>
                        <a class="collapse-item" href="GestaoEquipamentosSec.php">Stock de Equipamentos</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            
            </li>
            <li class="nav-item">
                
            </li>
            


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <style>
    body {
        font-family: Arial, sans-serif;
    }

    #pacientes {
        position: fixed;
        top: 56px;
        left: 253px;
        bottom: 0;
        background-color: #f8f8f8;
        overflow-y: scroll;
        padding: 10px;
        z-index: 9999;
        width: 400px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        height: 28%;
    }

    .paciente {
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 5px;
        background-color: white;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        transition: box-shadow 0.3s ease;
    }

    .paciente:hover {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .paciente h3 {
        font-size: 16px;
        margin: 0;
        color: #333;
    }

    /* Estilos para o caso de nenhum paciente ser encontrado */
    .paciente-not-found {
        font-size: 16px;
        color: #888;
        text-align: center;
        padding: 20px;
    }

    /* Estilos para a barra de pesquisa de trabalhadores */
    #trabalhadores {
        position: fixed;
        top: 56px;
        left: 253px;
        bottom: 0;
        background-color: #f8f8f8;
        overflow-y: scroll;
        padding: 10px;
        z-index: 9999;
        width: 400px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        height: 28%;
    }

    .trabalhador {
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 5px;
        background-color: white;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        transition: box-shadow 0.3s ease;
    }

    .trabalhador:hover {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .trabalhador h3 {
        font-size: 16px;
        margin: 0;
        color: #333;
    }

    /* Estilos para o caso de nenhum trabalhador ser encontrado */
    .trabalhador-not-found {
        font-size: 16px;
        color: #888;
        text-align: center;
        padding: 20px;
    }
</style>

<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input id="searchTrabalhador" type="text" class="form-control bg-light border-0 small" placeholder="Pesquisar agenda de técnico de saúde ..." aria-label="Search" aria-describedby="basic-addon2" onclick="showTrabalhadores()" autocomplete="off">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>

<div id="trabalhadores" style="display: none;">
    <?php
    require_once 'ligacao.php';

    $query = "SELECT id_trabalhador, nome, id_cargo FROM trabalhadores";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die('Erro na consulta ao banco de dados: ' . mysqli_error($con));
    }

    $trabalhadoresEncontrados = false; // Variável para verificar se foram encontrados trabalhadores

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id_trabalhador'];
        $nome = $row['nome'];
        $idCargo = $row['id_cargo'];

        if (in_array($idCargo, [1, 2, 4])) {
            echo '<div class="trabalhador" data-id="' . $id . '" data-name="' . $nome . '">';
            echo '<h3>' . $nome . '</h3>';
            // Outros detalhes do trabalhador
            echo '</div>';

            $trabalhadoresEncontrados = true; // Marcar que foram encontrados trabalhadores
        }
    }

    if (!$trabalhadoresEncontrados) {
        echo '<p>Trabalhador não encontrado</p>'; // Exibir mensagem de "Trabalhador não encontrado"
    }

    mysqli_close($con);
    ?>
</div>

<script>
    function showTrabalhadores() {
        var trabalhadores = document.getElementById("trabalhadores");
        trabalhadores.style.display = "block";
    }

    document.onclick = function (e) {
        if (!document.getElementById("searchTrabalhador").contains(e.target)) {
            var trabalhadores = document.getElementById("trabalhadores");
            trabalhadores.style.display = "none";
        }
    };
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#searchTrabalhador').on('input', function () {
            var searchTerm = $(this).val().toLowerCase();
            $('.trabalhador').each(function () {
                var name = $(this).data('name').toLowerCase();
                if (name.includes(searchTerm)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });

        $('.trabalhador').click(function () {
            var workerId = $(this).data('id');
            // Redirecionar para a página do trabalhador com base no ID capturado
            window.location.href = 'agendatrabalhador.php?id=' + workerId;
        });
    });
</script>

                    
                                         



                            <!-- Topbar Navbar -->
                            <ul class="navbar-nav ml-auto">

                                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                                <li class="nav-item dropdown no-arrow d-sm-none">
                                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-search fa-fw"></i>
                                    </a>
                                    <!-- Dropdown - Messages -->
                                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                        aria-labelledby="searchDropdown">
                                        <form class="form-inline mr-auto w-100 navbar-search">
                                            <div class="input-group">
                                                <input type="text" class="form-control bg-light border-0 small"
                                                    placeholder="Search for..." aria-label="Search"
                                                    aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button">
                                                        <i class="fas fa-search fa-sm"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </li>

                                

                                <div class="topbar-divider d-none d-sm-block"></div>

                                <!-- Nav Item - User Information -->
                                <!-- Código HTML modificado -->
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php
                                        echo "<span class='mr-2 d-none d-lg-inline text-gray-600 small'>" . $_SESSION['nome'] . "</span>";
                                        ?>
                                        <img class="img-profile rounded-circle"
                                            src="img/faces/<?php echo $_SESSION['foto']; ?>">
                                    </a>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                        aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="DefUserSec.php">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Perfil
                                        </a>
                                        <a class="dropdown-item" href="DefPassSec.php">
                                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Definições
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#logoutModal">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Logout
                                        </a>
                                    </div>
                                </li>


                            </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Consultas Agendadas</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                include "ligacao.php";
                                                // Capturar o ID do trabalhador através da variável de sessão
                                                $idTrabalhador = $_SESSION["id_trabalhador"];

                                                // Obter a data atual
                                                $dataAtual = date('Y-m-d');

                                                // Query para obter o número de consultas agendadas para o dia atual no sitio 1
                                                $queryConsultas = "SELECT COUNT(*) AS total_consultas FROM consultas
                                           WHERE  sitio = 1 AND DATE(data_hora_inicio) = CURDATE()";
                                                $resultConsultas = mysqli_query($con, $queryConsultas);

                                                if ($resultConsultas) {
                                                    $rowConsultas = mysqli_fetch_assoc($resultConsultas);
                                                    $totalConsultas = $rowConsultas['total_consultas'];
                                                    echo $totalConsultas;
                                                } else {
                                                    echo "Erro ao obter o número de consultas.";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Domícilios Agendados</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                include "ligacao.php";
                                                // Capturar o ID do trabalhador através da variável de sessão
                                                $idTrabalhador = $_SESSION["id_trabalhador"];

                                                // Obter a data atual
                                                $dataAtual = date('Y-m-d');

                                                // Query para obter o número de consultas agendadas para o dia atual no sitio 2
                                                $queryConsultas = "SELECT COUNT(*) AS total_consultas FROM consultas
                                           WHERE sitio = 2 AND DATE(data_hora_inicio) = CURDATE()";
                                                $resultConsultas = mysqli_query($con, $queryConsultas);

                                                if ($resultConsultas) {
                                                    $rowConsultas = mysqli_fetch_assoc($resultConsultas);
                                                    $totalConsultas = $rowConsultas['total_consultas'];
                                                    echo $totalConsultas;
                                                } else {
                                                    echo "Erro ao obter o número de consultas.";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                                              <!-- Pending Requests Card Example -->
                                              <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                           <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Domícilios e consultas concluídas
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php
                                                    include "ligacao.php";

                                                    // Obter a data atual
$dataAtual = date('Y-m-d');

// Consulta para obter o número de consultas agendadas para o dia atual
$queryConsultasAgendadas = "SELECT COUNT(*) AS total_agendadas FROM consultas
                           WHERE  DATE(data_hora_inicio) = '$dataAtual'";
$resultConsultasAgendadas = mysqli_query($con, $queryConsultasAgendadas);
$rowConsultasAgendadas = mysqli_fetch_assoc($resultConsultasAgendadas);
$totalAgendadas = $rowConsultasAgendadas['total_agendadas'];

// Consulta para obter o número de consultas já realizadas para o dia atual
$queryConsultasRealizadas = "SELECT COUNT(*) AS total_realizadas FROM consultas
                            WHERE  DATE(data_hora_inicio) = '$dataAtual' 
                            AND data_hora_fim <= NOW()";
$resultConsultasRealizadas = mysqli_query($con, $queryConsultasRealizadas);
$rowConsultasRealizadas = mysqli_fetch_assoc($resultConsultasRealizadas);
$totalRealizadas = $rowConsultasRealizadas['total_realizadas'];

// Calcular a porcentagem de consultas realizadas em relação às consultas agendadas
if ($totalAgendadas == 0) {
    echo "100%";
} else {
    $percentagemRealizadas = round(($totalRealizadas / $totalAgendadas) * 100, 0);
    echo $percentagemRealizadas . "%";
}
?>
</div>
</div>
<div class="col">
    <div class="progress progress-sm mr-2">
        <?php if ($totalAgendadas == 0) : ?>
            <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        <?php else : ?>
            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $percentagemRealizadas; ?>%" aria-valuenow="<?php echo $percentagemRealizadas; ?>" aria-valuemin="0" aria-valuemax="100"></div>
        <?php endif; ?>
    </div>
</div>
</div>
</div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                     <div class="row">

<!-- Area Chart -->
<div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Agendamentos</h6>



            <div class="dropdown no-arrow">


            </div>
        </div>
        <!-- Card Body -->
        <div class="chart-area" style="min-height:362px">
            <div id="calendar1" style="width:85%;margin:auto;padding-top:10px"></div>
            <!-- Modal -->
            <div class="modal fade" id="bookingModal" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Agendar consulta
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="calendario2.inc.php" method="post">

                            <div class="modal-body">
                                Paciente: <select class="form-control" name="id_paciente"
                                    id="id_paciente" required>
                                    <?php
                                    include('ligacao.php');
                                    $id = $_SESSION["id_trabalhador"];

                                    // Consulta para obter os pacientes da base de dados
                                    $query = "SELECT id_paciente, nome FROM pacientes";
                                    $result = mysqli_query($con, $query);

                                    if (!$result) {
                                        die('Erro na consulta ao banco de dados: ' . mysqli_error($con));
                                    }

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id_paciente'];
                                        $nome = $row['nome'];

                                        echo '<option value="' . $id . '">' . $nome . '</option>';
                                    }

                                    mysqli_close($con);
                                    ?>
                                </select>
                                Hora<input type="time" name="time" id="time"
                                    class="form-control" required />
                                Local<select class="form-control" name="sitio" id="sitio"
                                    required>
                                    <option value="1">Usf</option>
                                    <option value="2">Domicílio</option>
                                </select>
                                Tipo de Consulta<select class="form-control"
                                    name="tipo_consulta" id="tipo_consulta" required>
                                    <option value="1">Saúde Infantil</option>
                                    <option value="2">Saúde Grávida</option>
                                    <option value="3">Vacinação</option>
                                    <option value="4">Exame ao pé</option>
                                    <option value="5">Consulta de Hipertensão</option>
                                    <option value="6">Consulta de enfermagem</option>
                                    <option value="7">Consulta de medicina </option>
                                </select>
                                <input type="hidden" id="dataI" name="dataI" />
                                <input type="hidden" id="dataF" name="dataF" />
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal" value='Fechar'>
                                <input type="submit" id='saveBtn' class="btn btn-primary"
                                    name='submeter' value='Enviar'>

                                <!--<input type="submit" id='saveBtn' class="btn btn-primary" name='submeter'>-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            include('ligacao.php');
            $id = $_SESSION["id_trabalhador"];
            ?>

            <script>

                document.addEventListener('DOMContentLoaded', function () {

                    var calendarEl = document.getElementById('calendar1');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        timeZone: 'local',
                        initialView: 'dayGridDay',
                        height: 250,
                        events: [
                            <?php
                            $sql = "SELECT c.id_consulta as id_consulta, p.nome as nome, c.data_hora_inicio as inicio, c.data_hora_fim as fim, c.id_tipo_consulta as idtc FROM consultas c join trabalhadores t on c.id_trabalhador=t.id_trabalhador join pacientes p on p.id_paciente =c.id_paciente";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                {
                                    id: '<?php echo $row['id_consulta'] ?>',
                                    title: '<?php echo $row['nome'] ?>',
                                    start: '<?php echo $row['inicio'] ?>',
                                    end: '<?php echo $row['fim'] ?>',
                                    groupId: '<?php echo $row['idtc'] ?>'

                                },
                                <?php
                            }
                            ?>
                        ],

                        
                        selectHelper: true,
                        select: function (info) {
                            $('#bookingModal').modal('toggle').on('shown.bs.modal', function () {
                                var start_date = moment(info.startStr).format('YYYY-MM-DD');
                                var end_date = moment(info.endStr).format('YYYY-MM-DD');
                                $('#dataI').attr('value', start_date);
                                $('#dataF').attr('value', end_date);


                            });
                            console.log("1");
                            $('#saveBtn').click(function () {
                                var hour = $('#time').val();
                            });
                        },

                        eventClick: function (info) {
                            $('#exampleModalCenter').modal('toggle').on('shown.bs.modal', function () {
                                var id = info.event.id;
                                var nome = info.event.title;
                                const datastring = String(info.event.start);
                                const date = new Date(datastring);
                                var nomeconsulta = info.event.groupId;
                                const year = date.getFullYear();
                                const month = date.getMonth() + 1;
                                const day = date.getDate();
                                const hours = date.getHours().toString().padStart(2, '0');
                                const minutes = date.getMinutes().toString().padStart(2, '0');

                                const formattedDate = `${year}-${month.toString().padStart(2, "0")}-${day.toString().padStart(2, "0")}`;
                                const formattedTime = `${hours}:${minutes}`;

                                console.log(info.event.groupId);

                                $('#id_consulta').attr('value', id);
                                $('#nome').attr('value', nome);
                                $('#date').attr('value', formattedDate);
                                $('#hours').attr('value', formattedTime);
                                $('#tipo_consulta').attr('value', info.event.groupId);

                            });
                            $('#btnDelete').click(function (info) {
                                if (confirm("quer apagar esta consulta?")) {
                                    var idconsulta = $('#id_consulta').val();

                                    window.location.replace("calendario2.inc.php?id_consulta=" + idconsulta + "&&id=" + <?php echo $id ?>);
                                }
                            });
                        }

                    });

                    calendar.render();
                });


            </script>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Editar Dados da
                                consulta</h5>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method='POST'
                                action='calendario2.inc.php?id=<?php echo $id ?>' id="myForm">
                                <div class="modal-body">
                                    <input type="hidden" name="id_consulta" id="id_consulta">
                                    Paciente<input type="text" name="nome" id="nome"
                                        class="form-control" required readonly />
                                    Data<input type="date" name="date" id="date"
                                        class="form-control" required />
                                    Hora<input type="time" name="hours" id="hours"
                                        class="form-control" required />
                                    <input type="hidden" name="tipo_consulta" id="tipo_consulta"
                                        class="form-control" required />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" id="btnSave"
                                        name='enviar' value="Enviar">
                                    <input type="button" class="btn btn-primary" id="btnDelete"
                                        value="Apagar">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

<!-- Pie Chart -->
<div class="col-xl-4 col-lg-5">
<div class="card shadow mb-4" style="max-height: 414px;">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Colegas de turno</h6>
    </div>
    <div class="card-body">
    <?php
// Conectar ao banco de dados

// Consulta SQL para obter os trabalhadores que estão atualmente trabalhando
$queryTrabalhadoresAtivos = "SELECT t.nome, t.foto, t.id_trabalhador
    FROM trabalhadores t
    JOIN horarios h ON t.id_horario = h.id_horario
    WHERE CURTIME() >= h.hora_comeco AND CURTIME() <= h.hora_fim";

$resultTrabalhadoresAtivos = $con->query($queryTrabalhadoresAtivos);

// Verificar se há resultados
if ($resultTrabalhadoresAtivos->num_rows > 0) {
// Loop pelos resultados e exibir o nome e a foto dos trabalhadores
while ($row = $resultTrabalhadoresAtivos->fetch_assoc()) {
$idTrabalhador = $row['id_trabalhador'];
$nome = $row['nome'];
$foto = $row['foto'];

// Verificar se o trabalhador atual é o mesmo que está logado
$idUsuarioLogado = $_SESSION['id_trabalhador']; // Substitua pelo seu identificador de usuário
if ($idTrabalhador != $idUsuarioLogado) {
// Consulta SQL para verificar se o trabalhador tem consultas em andamento
$queryConsultas = "SELECT *
       FROM consultas
       WHERE id_trabalhador = $idTrabalhador AND CURTIME() >= data_hora_inicio AND CURTIME() <= data_hora_fim";

$resultConsultas = $con->query($queryConsultas);

// Verificar se há consultas em andamento
$consultaEmAndamento = ($resultConsultas->num_rows > 0);

// Determinar a classe CSS da bola ao redor da foto
$bolaClasseCSS = $consultaEmAndamento ? "bola-vermelha" : "bola-verde";

// Exibir a foto e o nome do trabalhador com a bola colorida correspondente
echo "<div class='foto-trabalhador'>";
echo "<span class='bola $bolaClasseCSS'></span>";
echo "<img class='img-profile rounded-circle' src='img/faces/" . $foto . "' alt='' style='width: 40px; height: 40px;'>";
echo "<span><i style='margin-left:10px'> $nome </i></span>";
echo "</div>";
echo "<br>";
}
}
} else {
echo "Nenhum trabalhador ativo encontrado.";
}

// Liberar recursos e fechar a conexão com o banco de dados
$resultTrabalhadoresAtivos->free();
$con->close();
?>
<style>
.bola {
display: inline-block;
width: 10px;
height: 10px;
border-radius: 50%;
margin-right: 5px;
}

.bola-verde {
background-color: green;
}

.bola-vermelha {
background-color: red;
}
</style>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="chart-pie pt-4 pb-2">

        </div>
        <div class="mt-4 text-center small">
        </div>
    </div>
</div>
</div>
</div>


<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">Tem a certeza que pretende sair?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="logout.php">Sair</a>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script src="caminho/para/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>

</html>