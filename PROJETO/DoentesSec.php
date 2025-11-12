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
                text: 'Utente apagado com sucesso',
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
                    var newUrl = window.location.href.replace('?sucess=1', '');
                    history.replaceState(null, null, newUrl);
                }
            }).showToast();
        }
    });
</script>
<style>
    .toastify-success {
        color: white;
        font-family: Arial, sans-serif;
        font-size: 16px;
        padding: 12px 16px;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
</style>

<?php
if (isset($_GET['success']) && $_GET['success'] == 2) {
    // Remova o código do alert
}
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (window.location.search.includes('sucess=2')) {
            Toastify({
                text: 'Dados do Utente atualizados com sucesso',
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
                    var newUrl = window.location.href.replace('?sucess=2', '');
                    history.replaceState(null, null, newUrl);
                }
            }).showToast();
        }
    });
</script>
<style>
    .toastify-success {
        color: white;
        font-family: Arial, sans-serif;
        font-size: 16px;
        padding: 12px 16px;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
</style>

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
                                                Total De Pacientes</div>
                                                <?php
include "ligacao.php";
?>

<div class="h5 mb-0 font-weight-bold text-gray-800">
    <?php
    // Inclui o arquivo de conexão com o banco de dados
    include 'ligacao.php';

    // Query para contar o número total de pacientes
    $sql = "SELECT COUNT(*) as total_pacientes FROM pacientes";

    // Executa a query
    $resultado = mysqli_query($con, $sql);

    // Verifica se houve algum resultado retornado pela query
    if ($resultado->num_rows > 0) {
        // Obtém o resultado como um array associativo
        $row = $resultado->fetch_assoc();
        // Imprime o número total de pacientes encontrado
        echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>" . $row["total_pacientes"] . "</div>";
    }
    mysqli_close($con);
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
                                                Crianças</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">                <?php
// Inclui o arquivo de conexão com o banco de dados
include 'ligacao.php';

// Query para contar o número de pacientes que são crianças (menores de 18 anos)
$sql = "SELECT COUNT(*) as num_criancas FROM pacientes WHERE DATEDIFF(CURDATE(), data_nascimento) < 6570"; // Considerando 6570 dias como a idade limite de 18 anos

// Executa a query
$resultado = mysqli_query($con, $sql);

// Verifica se houve algum resultado retornado pela query
if ($resultado->num_rows > 0) {
    // Obtém o resultado como um array associativo
    $row = $resultado->fetch_assoc();
    // Imprime o número de pacientes crianças encontrado
    echo "" . $row["num_criancas"];
}

mysqli_close($con);
?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Adultos </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">                 <?php
// Inclui o arquivo de conexão com o banco de dados
include 'ligacao.php';

// Query para contar o número de pacientes adultos (com 18 anos ou mais)
$sql = "SELECT COUNT(*) as num_adultos FROM pacientes WHERE DATEDIFF(CURDATE(), data_nascimento) >= 6570"; // Considerando 6570 dias como a idade limite de 18 anos

// Executa a query
$resultado = mysqli_query($con, $sql);

// Verifica se houve algum resultado retornado pela query
if ($resultado->num_rows > 0) {
    // Obtém o resultado como um array associativo
    $row = $resultado->fetch_assoc();
    // Imprime o número de pacientes adultos encontrado
    echo "" . $row["num_adultos"];
}

mysqli_close($con);
?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    

                       
                    </div>
   

                    

                    <!-- Content Row -->
<!-- Page Heading -->

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pacientes <a href="+DoentesSec.php"><img src="img/AddUser.png" height="30px" align="right"></a></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <input type="text" id="searchInput" class="form-control" placeholder="Pesquisar por nome do paciente">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Sexo</th>
                        <th>Contacto</th>
                        <th>Morada</th>
                        <th>Médico Responsável</th>
                        <th>Enfermeiro Responsável</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include 'ligacao.php';
                $query = "SELECT pacientes.id_paciente, pacientes.nome, pacientes.genero, pacientes.contacto, pacientes.morada, 
                                 medicos.nome AS medico_responsavel, enfermeiros.nome AS enfermeiro_responsavel
                          FROM pacientes
                          LEFT JOIN trabalhadores AS medicos ON pacientes.id_medico_responsavel = medicos.id_trabalhador
                          LEFT JOIN trabalhadores AS enfermeiros ON pacientes.id_enfermeiro_responsavel = enfermeiros.id_trabalhador";

                $resultado1 = mysqli_query($con, $query) or die("Erro SQL!");
                $num_rows = mysqli_num_rows($resultado1);
                mysqli_close($con);

                while ($linha = mysqli_fetch_array($resultado1)) {
                    echo "<tr>";
                    echo "<td>" . $linha["nome"] . "</td>";
                    echo "<td>" . $linha["genero"] . "</td>";
                    echo "<td>" . $linha["contacto"] . "</td>";
                    echo "<td>" . $linha["morada"] . "</td>";
                    echo "<td>" . $linha["medico_responsavel"] . "</td>";
                    echo "<td>" . $linha["enfermeiro_responsavel"] . "</td>";
                    echo "<td class='py-1'> 
                          <a href='DeletePaciente.php?id=" . $linha["id_paciente"] . "'>
                          <img src='img/DeleteUser.png' height='35px' alt='image'/>
                          </a>&nbsp&nbsp 
                          <a href='EditPaciente.php?id=" . $linha["id_paciente"] . "'>
                          <img src='img/EditUser.png' height='25px' alt='image'/>
                          </a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        
        <script>
    const searchInput = document.getElementById('searchInput');
    const tableRows = document.querySelectorAll('#dataTable tbody tr');

    searchInput.addEventListener('input', function() {
        const searchText = searchInput.value.toLowerCase();

        tableRows.forEach(function(row) {
            const nameColumn = row.querySelector('td:first-child');
            const rowData = nameColumn.textContent.toLowerCase();

            if (rowData.includes(searchText)) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
    </div>
</div>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("dataTable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = $(tr[i]).find("td:first-child"); // Obter a primeira célula de cada linha
            if (td) {
                txtValue = td.text();
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    $(tr[i]).show();
                } else {
                    $(tr[i]).hide();
                }
            }
        }
    }
</script>

                    
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

</body>

</html>