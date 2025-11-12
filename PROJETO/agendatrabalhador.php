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
                <?php
if (isset($_GET['sucess']) && $_GET['sucess'] == 1) {
    // Remova o código do alert
}
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (window.location.search.includes('sucess=1')) {
            Toastify({
                text: 'Consulta agendada com sucesso',
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
                    var newUrl = window.location.href.replace('&sucess=1', '');
                    history.replaceState(null, null, newUrl);
                }
            }).showToast();
        }
    });
</script>
<?php
if (isset($_GET['sucess']) && $_GET['sucess'] == 2) {
    // Remova o código do alert
}
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (window.location.search.includes('sucess=2')) {
            Toastify({
                text: 'Consulta editada com sucesso',
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
                    var newUrl = window.location.href.replace('&sucess=2', '');
                    history.replaceState(null, null, newUrl);
                }
            }).showToast();
        }
    });
</script>
<?php
if (isset($_GET['sucess']) && $_GET['sucess'] == 3) {
    // Remova o código do alert
}
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (window.location.search.includes('sucess=3')) {
            Toastify({
                text: 'Consulta eliminada com sucesso',
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
                    var newUrl = window.location.href.replace('&sucess=3', '');
                    history.replaceState(null, null, newUrl);
                }
            }).showToast();
        }
    });
</script>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php
                    include "ligacao.php";
                $idtrabalhador = $_GET["id"];
                
// Fazer a sua query para obter o nome do trabalhador com base no ID
$query = "SELECT nome FROM trabalhadores WHERE id_trabalhador = $idtrabalhador";
$resultado = mysqli_query($con, $query) or die("Erro na seleção!");

if (mysqli_num_rows($resultado) > 0) {
    $linha = mysqli_fetch_assoc($resultado);
    $nomeTrabalhador = $linha['nome'];
} else {
    $nomeTrabalhador = "Trabalhador não encontrado";
}
echo "Agenda de ".$nomeTrabalhador;
                ?>
                    <div id="calendar1" style="width:100%;margin:auto;"></div>
                    <!-- Modal -->
                    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agendar consulta</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="calendario3.inc.php?idt=<?php echo $idtrabalhador ?>" method="post">

                                <div class="modal-body">
    Paciente: <select class="form-control" name="id_paciente" id="id_paciente" required>
        <?php
        include('ligacao.php');
        

        // Consulta para obter os pacientes da base de dados que são da responsabilidade do médico/enfermeiro
        $query = "SELECT id_paciente, nome FROM pacientes WHERE id_medico_responsavel = '$idtrabalhador' OR id_enfermeiro_responsavel = '$idtrabalhador'";
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
    <?php
include "ligacao.php";
$idtrabalhador = $_GET["id"];

// Fazer a sua query para obter o id_horario do trabalhador com base no ID
$query = "SELECT id_horario FROM trabalhadores WHERE id_trabalhador = $idtrabalhador";
$resultado = mysqli_query($con, $query) or die("Erro na seleção!");

if (mysqli_num_rows($resultado) > 0) {
    $linha = mysqli_fetch_assoc($resultado);
    $idHorario = $linha['id_horario'];
} else {
    // Trabalhador não encontrado, defina um valor padrão para o idHorario
    $idHorario = 0;
}

// Definir os limites de tempo com base no id_horario
if ($idHorario == 1) {
    $inicio = "08:00";
    $fim = "14:00";
} elseif ($idHorario == 2) {
    $inicio = "13:00";
    $fim = "20:00";
} elseif ($idHorario == 3) {
    $inicio = "00:10";
    $fim = "08:00";
} else {
    // Horário inválido, defina um valor padrão para o início e fim
    $inicio = "00:00";
    $fim = "23:59";
}

// Exibir o input de hora com os limites definidos
echo 'Hora: <input type="time" name="time" id="time" class="form-control" min="' . $inicio . '" max="' . $fim . '" required />';
?>
                                        Local<select class="form-control" name="sitio" id="sitio" required>
                                            <option value="1">Usf</option>
                                            <option value="2">Domicílio</option>
                                        </select>
                                        Tipo de Consulta<select class="form-control" name="tipo_consulta"
                                            id="tipo_consulta" required>
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
                                        <input type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                            value='Fechar'>
                                        <input type="submit" id='saveBtn' class="btn btn-primary" name='submeter'
                                            value='Enviar'>

                                        <!--<input type="submit" id='saveBtn' class="btn btn-primary" name='submeter'>-->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                    include('ligacao.php');
                    ?>

                    <script>

                        document.addEventListener('DOMContentLoaded', function () {

                            var calendarEl = document.getElementById('calendar1');
                            var calendar = new FullCalendar.Calendar(calendarEl, {
                                timeZone: 'local',
                                initialView: 'dayGridWeek',
                                height: 600,
                                events: [
                                    <?php
                                    $sql = "SELECT c.id_consulta as id_consulta, p.nome as nome, c.data_hora_inicio as inicio, c.data_hora_fim as fim, c.id_tipo_consulta as idtc FROM consultas c join trabalhadores t on c.id_trabalhador=t.id_trabalhador join pacientes p on p.id_paciente =c.id_paciente where c.id_trabalhador = $idtrabalhador";
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

                                selectable: true,
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
                                    $('#btnDelete').click(function(info){
                                        if(confirm("quer apagar esta consulta?")){
                                            var idconsulta=$('#id_consulta').val();

                                            window.location.replace("calendario3.inc.php?id_consulta="+idconsulta+"&&id="+<?php echo $idtrabalhador ?>);
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
                                    <h5 class="modal-title" id="exampleModalLongTitle">Editar Dados da consulta</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method='POST' action='calendario3.inc.php?id=<?php echo $idtrabalhador ?>' id="myForm">
                                        <div class="modal-body">
                                            <input type="hidden" name="id_consulta" id="id_consulta">
                                            Paciente<input type="text" name="nome" id="nome" class="form-control"
                                                required readonly />
                                            Data<input type="date" name="date" id="date" class="form-control"
                                                required />
                                                <?php
include "ligacao.php";
$idtrabalhador = $_GET["id"];

// Fazer a sua query para obter o id_horario do trabalhador com base no ID
$query = "SELECT id_horario FROM trabalhadores WHERE id_trabalhador = $idtrabalhador";
$resultado = mysqli_query($con, $query) or die("Erro na seleção!");

if (mysqli_num_rows($resultado) > 0) {
    $linha = mysqli_fetch_assoc($resultado);
    $idHorario = $linha['id_horario'];
} else {
    // Trabalhador não encontrado, defina um valor padrão para o idHorario
    $idHorario = 0;
}

// Definir os limites de tempo com base no id_horario
if ($idHorario == 1) {
    $inicio = "08:00";
    $fim = "14:00";
} elseif ($idHorario == 2) {
    $inicio = "13:00";
    $fim = "20:00";
} elseif ($idHorario == 3) {
    $inicio = "00:10";
    $fim = "08:00";
} else {
    // Horário inválido, defina um valor padrão para o início e fim
    $inicio = "00:00";
    $fim = "23:59";
}

// Exibir o input de hora com os limites definidos
echo 'Hora:<input type="time" name="time" id="time" class="form-control" min="' . $inicio . '" max="' . $fim . '" required />';
?>
                                                
                                            <input type="hidden" name="tipo_consulta" id="tipo_consulta" class="form-control"
                                                required />
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary" id="btnSave" name='enviar'
                                                value="Enviar">
                                            <input type="button" class="btn btn-primary" id="btnDelete" value="Apagar">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
<style>
    #calendar2 {
        background-color: white;
        padding: 50px;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
        box-shadow: 0px 0px 25px lightgray;
        border: 1px solid lightgray;
    }

    #calendar1 {
        background-color: white;
        padding: 50px;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
        box-shadow: 0px 0px 25px lightgray;
        border: 1px solid lightgray;
    }

    a {
        text-decoration: none;
    }

    .alert {
        height: 100px;
        width: 400px;
        position: absolute;
        z-index: 1000;
        margin-top: 30px;
        right: 0;
        left: 0;
        margin-left: auto;
        margin-right: auto;
        opacity: 90%;
        display: none;
    }

    < !-- End of Page Wrapper -->< !-- Scroll to Top Button--><a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>< !-- Logout Modal--><div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Logout</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button></div><div class="modal-body">Tem a certeza que pretende sair?</div><div class="modal-footer"><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button><a class="btn btn-primary" href="logout.php">Sair</a></div></div></div></div>< !-- Bootstrap core JavaScript--><script src="vendor/jquery/jquery.min.js"></script><script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>< !-- Core plugin JavaScript--><script src="vendor/jquery-easing/jquery.easing.min.js"></script>< !-- Custom scripts for all pages--><script src="js/sb-admin-2.min.js"></script>< !-- Page level plugins --><script src="vendor/chart.js/Chart.min.js"></script>< !-- Page level custom scripts --><script src="js/demo/chart-area-demo.js"></script><script src="js/demo/chart-pie-demo.js"></script><script src="caminho/para/jquery.min.js"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        
        
        
        </body>
        
        
        
        </html>