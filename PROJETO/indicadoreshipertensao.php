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
    if (!isset($_SESSION['nome']) || ($_SESSION['cargo'] !== 'enfermeiro' && $_SESSION['cargo'] !== 'médico' && $_SESSION['cargo'] !== 'administrador')) {
        // Redirecione o usuário para a página de login
        echo '<script>window.location.href = "index.php";</script>';
        exit;
    }


    // Resto do código da página de administrador
    
    ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="AP_inicial.php">
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
                <a class="nav-link" href="AP_inicial.php">
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
                <a class="nav-link collapsed" href="+Doentes.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Registar Utente</span>
                </a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="calendario1.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Agendamentos</span>
                </a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Indicadores
            </div>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse"
                    aria-expanded="true" aria-controls="collapse">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Indicadores</span>
                </a>
                <div id="collapse" class="collapse" aria-labelledby="heading" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="indicadoresdiabetes.php">Diabetes</a>
                        <a class="collapse-item" href="indicadoressaudeinfantil.php">Saúde Infantil</a>
                        <a class="collapse-item" href="indicadoreshipertensao.php">Hipertensão</a>
                    </div>
                </div>
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
                        <a class="collapse-item" href="GestaoMateriais.php">Stock de Materiais</a>
                        <a class="collapse-item" href="GestaoEquipamentos.php">Stock de Equipamentos</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            
            </li>
            <li class="nav-item">
                <?php
                if (isset($_SESSION['cargo']) && $_SESSION['cargo'] === 'administrador') {
                    echo '
                    <!-- Heading -->
            <div class="sidebar-heading">
                Gestão de Utilizadores
            </div>
                <a class="nav-link collapsed" href="Admin_Users.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Gestão de Utilizadores</span>
                </a>
                <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            ';
                }
                ?>
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
                    </style>
                    </head>

                    <body>


                        <div class="container-fluid conteudo">
                            <form
                                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                    <input id="searchInput" type="text" class="form-control bg-light border-0 small"
                                        placeholder="Pesquisar Utente..." aria-label="Search"
                                        aria-describedby="basic-addon2" onclick="showPacientes()" autocomplete="off">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div id="pacientes" style="display: none;">
                                <?php
                                require_once 'ligacao.php';

                                $query = "SELECT id_paciente, nome FROM pacientes";
                                $result = mysqli_query($con, $query);

                                if (!$result) {
                                    die('Erro na consulta ao banco de dados: ' . mysqli_error($con));
                                }

                                $pacientesEncontrados = false; // Variável para verificar se foram encontrados pacientes
                                
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id_paciente'];
                                    $nome = $row['nome'];

                                    echo '<div class="paciente" data-id="' . $id . '" data-name="' . $nome . '">';
                                    echo '<h3>' . $nome . '</h3>';
                                    // Outros detalhes do paciente
                                    echo '</div>';

                                    $pacientesEncontrados = true; // Marcar que foram encontrados pacientes
                                }

                                if (!$pacientesEncontrados) {
                                    echo '<p>Utente não Encontrado</p>'; // Exibir mensagem de "Utente não Encontrado"
                                }

                                mysqli_close($con);
                                ?>
                            </div>

                            <script>
                                function showPacientes() {
                                    var pacientes = document.getElementById("pacientes");
                                    pacientes.style.display = "block";
                                }

                                document.onclick = function (e) {
                                    if (!document.getElementById("searchInput").contains(e.target)) {
                                        var pacientes = document.getElementById("pacientes");
                                        pacientes.style.display = "none";
                                    }
                                };
                            </script>
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $(document).ready(function () {
                                    $('#searchInput').on('input', function () {
                                        var searchTerm = $(this).val().toLowerCase();
                                        $('.paciente').each(function () {
                                            var name = $(this).data('name').toLowerCase();
                                            if (name.includes(searchTerm)) {
                                                $(this).show();
                                            } else {
                                                $(this).hide();
                                            }
                                        });
                                    });

                                    $('.paciente').click(function () {
                                        var patientId = $(this).data('id');
                                        // Redirecionar para a página do paciente com base no ID capturado
                                        window.location.href = 'perfilpaciente.php?id=' + patientId;
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
                                        <a class="dropdown-item" href="DefUserEnf.php">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Perfil
                                        </a>
                                        <a class="dropdown-item" href="DefPassEnf.php">
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
                <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Indicadores</h1>
<p class="mb-4">Áreas prioritárias- Indicadores de desempenho CSP </p>
<?php
include "ligacao.php";

if ($con->connect_errno) {
    echo "Failed to connect to MySQL: " . $con->connect_error;
}

// Consulta SQL para obter o número total de pacientes hipertensos
$queryTotalPacientesHipertensao = "SELECT COUNT(*) AS totalPacientesHipertensao FROM pacientes_programas WHERE id_doenca = 1";
$resultTotalPacientesHipertensao = $con->query($queryTotalPacientesHipertensao);
$rowTotalPacientesHipertensao = $resultTotalPacientesHipertensao->fetch_assoc();
$totalPacientesHipertensao = isset($rowTotalPacientesHipertensao['totalPacientesHipertensao']) ? (int) $rowTotalPacientesHipertensao['totalPacientesHipertensao'] : 0;

// Consulta SQL para obter o número de pacientes com consulta de enfermagem realizada nos últimos 6 meses para hipertensos
$queryTotalConsultaEnfermagem = "SELECT COUNT(DISTINCT consultas.id_paciente) AS totalConsultaEnfermagem FROM consultas join pacientes_programas on consultas.id_paciente=pacientes_programas.id_paciente WHERE id_tipo_consulta = 6 AND data_hora_inicio >= DATE_SUB(NOW(), INTERVAL 6 MONTH) AND id_doenca=1";
$resultTotalConsultaEnfermagem = $con->query($queryTotalConsultaEnfermagem);
$rowTotalConsultaEnfermagem = $resultTotalConsultaEnfermagem->fetch_assoc();
$totalConsultaEnfermagem = isset($rowTotalConsultaEnfermagem['totalConsultaEnfermagem']) ? (int) $rowTotalConsultaEnfermagem['totalConsultaEnfermagem'] : 0;

// Calcular a porcentagem de pacientes com consulta de enfermagem realizada nos últimos 6 meses para hipertensos
$percentConsultaEnfermagem = ($totalConsultaEnfermagem / $totalPacientesHipertensao) * 100;
$percentSemConsultaEnfermagem = 100 - $percentConsultaEnfermagem;

$resultTotalPacientesHipertensao->free();
$resultTotalConsultaEnfermagem->free();
$con->close();
?>

<div class="row">
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Hipertensos - Consulta de Enfermagem nos últimos 6 meses</h6>
                <!-- Exibir as porcentagens -->
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-donut pt-4">
                    <canvas id="myDonutChart3"></canvas>
                </div>
                <hr>
                <div class="chart-legend">
                    <span class="legend-item">
                        <i class="fas fa-square-full" style="color: #4e73df;"></i>
                        <?php echo round($percentConsultaEnfermagem); ?>% dos hipertensos tiveram consulta de enfermagem nos últimos 6 meses<br>
                    </span>
                    <span class="legend-item">
                        <i class="fas fa-square-full" style="color: #FF8C00;"></i>
                        <?php echo round($percentSemConsultaEnfermagem); ?>% dos hipertensos não tiveram consulta de enfermagem nos últimos 6 meses
                    </span>
                </div>
            </div>
        </div>
    </div>
    <?php
include "ligacao.php";

if ($con->connect_errno) {
    echo "Failed to connect to MySQL: " . $con->connect_error;
}

// Consulta SQL para obter o número total de pacientes hipertensos
$queryTotalPacientesHipertensao = "SELECT COUNT(*) AS totalPacientesHipertensao FROM pacientes_programas WHERE id_doenca = 1";
$resultTotalPacientesHipertensao = $con->query($queryTotalPacientesHipertensao);
$rowTotalPacientesHipertensao = $resultTotalPacientesHipertensao->fetch_assoc();
$totalPacientesHipertensao = isset($rowTotalPacientesHipertensao['totalPacientesHipertensao']) ? (int) $rowTotalPacientesHipertensao['totalPacientesHipertensao'] : 0;

// Consulta SQL para obter o número de pacientes com consulta de medicina realizada nos últimos 12 meses para hipertensos
$queryTotalConsultaMedicina = "SELECT COUNT(DISTINCT consultas.id_paciente) AS totalConsultaMedicina FROM consultas join pacientes_programas on consultas.id_paciente=pacientes_programas.id_paciente WHERE id_tipo_consulta = 7 AND data_hora_inicio >= DATE_SUB(NOW(), INTERVAL 12 MONTH) AND id_doenca=1";
$resultTotalConsultaMedicina = $con->query($queryTotalConsultaMedicina);
$rowTotalConsultaMedicina = $resultTotalConsultaMedicina->fetch_assoc();
$totalConsultaMedicina = isset($rowTotalConsultaMedicina['totalConsultaMedicina']) ? (int) $rowTotalConsultaMedicina['totalConsultaMedicina'] : 0;

// Calcular a porcentagem de pacientes com consulta de medicina realizada nos últimos 12 meses para hipertensos
$percentConsultaMedicina = ($totalConsultaMedicina / $totalPacientesHipertensao) * 100;
$percentSemConsultaMedicina = 100 - $percentConsultaMedicina;

$resultTotalPacientesHipertensao->free();
$resultTotalConsultaMedicina->free();
$con->close();
?>

    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Hipertensos - Consulta de Medicina nos últimos 12 meses</h6>
                <!-- Exibir as porcentagens -->
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-donut pt-4">
                    <canvas id="myDonutChart4"></canvas>
                </div>
                <hr>
                <div class="chart-legend">
                <span class="legend-item">
                    <i class="fas fa-square-full" style="color: #4e73df;"></i>
                    <?php echo round($percentConsultaMedicina); ?>% dos hipertensos tiveram consulta de medicina nos últimos 12 meses<br>
                </span>
                <span class="legend-item">
                    <i class="fas fa-square-full" style="color: #FF8C00;"></i>
                    <?php echo round($percentSemConsultaMedicina); ?>% dos hipertensos não tiveram consulta de medicina nos últimos 12 meses
                </span>
            </div>
            </div>
        </div>
    </div>
</div>



<!-- Inclua a biblioteca Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var totalPacientesHipertensao = <?php echo $totalPacientesHipertensao; ?>;
    var totalConsultaEnfermagem = <?php echo $totalConsultaEnfermagem; ?>;
    var percentConsultaEnfermagem = <?php echo $percentConsultaEnfermagem; ?>;
    var percentSemConsultaEnfermagem = <?php echo $percentSemConsultaEnfermagem; ?>;

    // Opções de configuração para o gráfico
    var donutOptions = {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            display: false
        }
    };

    // Dados do gráfico myDonutChart3
    var donutData3 = {
        datasets: [{
            data: [percentConsultaEnfermagem, percentSemConsultaEnfermagem],
            backgroundColor: ['#4e73df', '#FF8C00'], // Azul e laranja
            hoverBackgroundColor: ['#2e5bff', '#FF6A00'], // Azul mais escuro e laranja mais intenso
            hoverBorderColor: 'rgba(234, 236, 244, 1)'
        }],
    };

    // Cria o gráfico de rosquinha myDonutChart3
    var ctx3 = document.getElementById('myDonutChart3');
    var myDonutChart3 = new Chart(ctx3, {
        type: 'doughnut',
        data: donutData3,
        options: donutOptions,
    });
</script>

<script>
    var totalPacientesHipertensao = <?php echo $totalPacientesHipertensao; ?>;
    var totalConsultaMedicina = <?php echo $totalConsultaMedicina; ?>;
    var percentConsultaMedicina = <?php echo $percentConsultaMedicina; ?>;
    var percentSemConsultaMedicina = <?php echo $percentSemConsultaMedicina; ?>;

    // Opções de configuração para o gráfico
    var donutOptions = {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            display: false
        }
    };

    // Dados do gráfico myDonutChart4
    var donutData4 = {
        datasets: [{
            data: [percentConsultaMedicina, percentSemConsultaMedicina],
            backgroundColor: ['#4e73df', '#FF8C00'], // Azul e laranja
            hoverBackgroundColor: ['#2e5bff', '#FF6A00'], // Azul mais escuro e laranja mais intenso
            hoverBorderColor: 'rgba(234, 236, 244, 1)'
        }],
    };

    // Cria o gráfico de rosquinha myDonutChart4
    var ctx4 = document.getElementById('myDonutChart4');
    var myDonutChart4 = new Chart(ctx4, {
        type: 'doughnut',
        data: donutData4,
        options: donutOptions,
    });
</script>





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