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
                    <?php
if (isset($_GET['success']) && $_GET['success'] == 1) {
    // Remova o código do alert
}
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (window.location.search.includes('success=1')) {
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
if (isset($_GET['sucess']) && $_GET['sucess'] == 3) {
    // Remova o código do alert
}
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (window.location.search.includes('sucess=3')) {
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
                    var newUrl = window.location.href.replace('?sucess=3', '');
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
if (isset($_GET['sucess']) && $_GET['sucess'] == 4) {
    // Remova o código do alert
}
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (window.location.search.includes('sucess=4')) {
            Toastify({
                text: 'Consulta alterada com sucesso',
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
                    var newUrl = window.location.href.replace('?sucess=4', '');
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
if (isset($_GET['sucess']) && $_GET['sucess'] == 5) {
    // Remova o código do alert
}
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (window.location.search.includes('sucess=5')) {
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
                    var newUrl = window.location.href.replace('?sucess=5', '');
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
if (isset($_GET['sucess']) && $_GET['sucess'] == 10) {
    // Remova o código do alert
}
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (window.location.search.includes('sucess=10')) {
            Toastify({
                text: 'Utente eliminado com sucesso',
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
                    var newUrl = window.location.href.replace('?sucess=10', '');
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

                    <!-- Page Heading -->
                    <?php
// Verificar se o formulário foi enviado
if(isset($_POST['btn_enviar'])) {
    // Capturar os dados do formulário
    $nome = $_POST['nome'];
    $dataNascimento = $_POST['dataNascimento'];
    $genero = $_POST['genero'];
    $contacto = $_POST['contacto'];
    $morada = $_POST['morada'];
    $programasSaude = isset($_POST['programaSaude']) ? $_POST['programaSaude'] : array();
    $medicoResponsavel = $_POST['medico_responsavel'];
    $enfermeiroResponsavel = $_POST['enfermeiro_responsavel'];

    // Incluir o arquivo de conexão
    include "ligacao.php";

    // Preparar a consulta SQL para inserir o paciente
    $queryPaciente = "INSERT INTO pacientes (nome, data_nascimento, genero, contacto, morada, id_medico_responsavel, id_enfermeiro_responsavel) 
                      VALUES ('$nome', '$dataNascimento', '$genero', '$contacto', '$morada', '$medicoResponsavel', '$enfermeiroResponsavel')";

    // Executar a consulta para inserir o paciente
    if(mysqli_query($con, $queryPaciente)) {
        // Obter o ID do paciente recém-inserido
        $pacienteID = mysqli_insert_id($con);

        // Preparar a consulta SQL para inserir os programas de saúde selecionados
        $queryProgramasSaude = "INSERT INTO pacientes_programas (id_paciente, id_doenca, atual) VALUES ";
        foreach($programasSaude as $programa) {
            $queryProgramasSaude .= "('$pacienteID', '$programa', '1'),";
        }
        // Remover a vírgula extra no final da consulta
        $queryProgramasSaude = rtrim($queryProgramasSaude, ',');

        // Executar a consulta para inserir os programas de saúde
        if (mysqli_query($con, $queryProgramasSaude)) {
            // Redirecionar para a página inicial com parâmetro de sucesso
            echo "<script>
                      window.location.href = 'AP_inicial.php?success=1';
                  </script>";
        } else {
            echo "Erro ao registrar os programas de saúde: " . mysqli_error($con);
        }
    } else {
        echo "Erro ao registrar o paciente: " . mysqli_error($con);
    }

    // Fechar a conexão com o banco de dados
    mysqli_close($con);
}
?>
                    <div class="formbold-main-wrapper">

                        <div class="formbold-form-wrapper">
                          <form action="+Doentes.php" method="POST" >
                            <div class="formbold-mb-3">
                                <label for="address" class="formbold-form-label"> Nome </label>
                                <input
                                  type="text"
                                  name="nome"
                                  id="nome"
                                  placeholder="Nome Completo"
                                  class="formbold-form-input formbold-mb-3"
                                  required
                                />
                              </div>
                              <div class="formbold-input-flex">
                            <div class="formbold-mb-3">
                              <label for="dob" class="formbold-form-label"> Data de nascimento </label>
                              <input type="date" name="dataNascimento" id="dataNascimento" class="formbold-form-input" required/>
                            </div>
                            <div class="formbold-mb-3">
  <label class="formbold-form-label">Programa de Saúde Especial</label>
  <div class="dropdown" onclick="toggleDropdown(event)">
    <button class="dropdown-toggle formbold-form-input" type="button" id="dropdownMenuButton">
      
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <input type="checkbox" name="programaSaude[]" value="0" id="opcao0" class="formbold-checkbox">
      <label for="opcao0">Sem programa de Saúde especial</label>
      <br>
      <input type="checkbox" name="programaSaude[]" value="1" id="opcao1" class="formbold-checkbox">
      <label for="opcao1">Hipertensao</label>
      <br>
      <input type="checkbox" name="programaSaude[]" value="2" id="opcao2" class="formbold-checkbox">
      <label for="opcao2">Saúde Materna</label>
      <br>
      <input type="checkbox" name="programaSaude[]" value="3" id="opcao3" class="formbold-checkbox">
      <label for="opcao3">Diabetes</label>
    </div>
  </div>
</div>
<style>
    .dropdown-toggle {
  background-color: #ffffff;
  border: 1px solid #dde3ec;
  color: #536387;
  font-size: 16px;
  padding: 13px 22px;
  border-radius: 5px;
  width: 100%;
  text-align: left;
  cursor: pointer;
}

.dropdown-menu {
  display: none;
  width: 100%;
  padding: 10px;
  max-height: 200px;
  overflow-y: auto;
}

.formbold-checkbox {
  display: none;
}

.formbold-checkbox + label {
  display: block;
  margin-bottom: 5px;
  cursor: pointer;
}

.formbold-checkbox:checked + label::before {
  content: "✓";
  display: inline-block;
  margin-right: 5px;
}

.formbold-checkbox:focus + label {
  outline: 2px solid #6a64f1;
}

.dropdown-toggle:focus {
  outline: 2px solid #6a64f1;
}
</style>
<script>
function toggleDropdown(event) {
  event.stopPropagation();
  const dropdown = event.currentTarget.querySelector('.dropdown-menu');
  dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
}

document.addEventListener('click', function() {
  const dropdowns = document.querySelectorAll('.dropdown-menu');
  dropdowns.forEach(function(dropdown) {
    dropdown.style.display = 'none';
  });
});
</script>
                            </div>

                            <div class="formbold-input-flex">
                            <div>
                                <label class="formbold-form-label">Género</label>

                                <select class="formbold-form-input" name="genero" id="genero" required>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                                </select>
                            </div>
                            <div>

                            <div>
                            <label for="address" class="formbold-form-label"> Contacto </label>
                                <input
                                  type="text"
                                  name="contacto"
                                  id="contacto"
                                  placeholder="Ex:919191919"
                                  class="formbold-form-input formbold-mb-3"
                                  required
                                />
                            </div>

                            </div>
                        <?php
                        include "ligacao.php";

                        $sql_medicos = "SELECT id_trabalhador, nome FROM trabalhadores WHERE id_cargo = 2 or id_cargo=4";
$result_medicos = $con->query($sql_medicos);

// Consulta para obter os enfermeiros registrados
$sql_enfermeiros = "SELECT id_trabalhador, nome FROM trabalhadores WHERE id_cargo = 1";
$result_enfermeiros = $con->query($sql_enfermeiros);

$con->close();
?>
                            
                        </div>
                        <div class="formbold-input-flex">
                            <div>
                                <label class="formbold-form-label">Médico Responsável</label>

                                <select class="formbold-form-input" name="medico_responsavel" id="medico_responsavel" required>
                                <?php
            // Iterar sobre os resultados dos médicos e criar as opções
            if ($result_medicos->num_rows > 0) {
                while ($row = $result_medicos->fetch_assoc()) {
                    echo '<option value="' . $row["id_trabalhador"] . '">' . $row["nome"] . '</option>';
                }
            }
            ?>
                                </select>
                            </div>
                            <div>

                            <div>
                                <label class="formbold-form-label">Enfermeiro Responsável</label>

                                <select class="formbold-form-input" name="enfermeiro_responsavel" id="enfermeiro_responsavel" required>
                                <?php
                // Iterar sobre os resultados dos enfermeiros e criar as opções
                if ($result_enfermeiros->num_rows > 0) {
                    while ($row = $result_enfermeiros->fetch_assoc()) {
                        echo '<option value="' . $row["id_trabalhador"] . '">' . $row["nome"] . '</option>';
                    }
                }
                ?>
                                </select>
                            </div>

                            </div>

                            
                        </div>
                      
                            <div class="formbold-mb-3">
                              <label for="address" class="formbold-form-label"> Morada</label>
                              <input
                                type="text"
                                name="morada"
                                id="morada"
                                placeholder="Rua armando tavares 342 1º esq, 4405-841"
                                class="formbold-form-input formbold-mb-3"
                                required
                              />
                            </div>


                                                  
                            

                              

                              <input type="submit" name="btn_enviar" class="formbold-btn" value="Registar Paciente">
                        
                             
                          </form>
                        </div>
                      </div>
                      <style>
                        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
                        * {
                          margin: 0;
                          padding: 0;
                          box-sizing: border-box;
                        }
                        body {
                          font-family: 'Inter', sans-serif;
                        }
                        .formbold-form-label {
                        color: #07074d;
                        font-size: 14px;
                        line-height: 24px;
                        display: block;
                        margin-bottom: 10px;
                    }
                        .formbold-mb-3 {
                          margin-bottom: 15px;
                        }
                        .formbold-relative {
                          position: relative;
                        }
                        .formbold-opacity-0 {
                          opacity: 0;
                        }
                        .formbold-stroke-current {
                          stroke: #ffffff;
                          z-index: 999;
                        }
                        #supportCheckbox:checked ~ div span {
                          opacity: 1;
                        }
                        #supportCheckbox:checked ~ div {
                          background: #6a64f1;
                          border-color: #6a64f1;
                        }
                      
                        .formbold-main-wrapper {
                          display: flex;
                          align-items: center;
                          justify-content: center;
                          padding: 0px;
                        }
                      
                        .formbold-form-wrapper {
                          margin: 0 auto;
                          max-width: 570px;
                          width: 100%;
                          background: transparent;
                          padding: 0px;
                        }
                      
                        .formbold-img {
                          display: block;
                          margin: 0 auto 45px;
                        }
                      
                        .formbold-input-wrapp > div {
                          display: flex;
                          gap: 20px;
                        }
                      
                        .formbold-input-flex {
                          display: flex;
                          gap: 20px;
                          margin-bottom: 15px;
                        }
                        .formbold-input-flex > div {
                          width: 50%;
                        }
                        .formbold-form-input {
                          width: 100%;
                          padding: 13px 22px;
                          border-radius: 5px;
                          border: 1px solid #dde3ec;
                          background: #ffffff;
                          font-weight: 500;
                          font-size: 16px;
                          color: #536387;
                          outline: none;
                          resize: none;
                        }
                        .formbold-form-input::placeholder,
                        select.formbold-form-input,
                        .formbold-form-input[type='date']::-webkit-datetime-edit-text,
                        .formbold-form-input[type='date']::-webkit-datetime-edit-month-field,
                        .formbold-form-input[type='date']::-webkit-datetime-edit-day-field,
                        .formbold-form-input[type='date']::-webkit-datetime-edit-year-field {
                          color: rgba(83, 99, 135, 0.5);
                        }
                      
                        .formbold-form-input:focus {
                          border-color: #6a64f1;
                          box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
                        }
                        .formbold-form-label {
                          color: #536387;
                          font-size: 14px;
                          line-height: 24px;
                          display: block;
                          margin-bottom: 10px;
                        }
                      
                        .formbold-checkbox-label {
                          display: flex;
                          cursor: pointer;
                          user-select: none;
                          font-size: 16px;
                          line-height: 24px;
                          color: #536387;
                        }
                        .formbold-checkbox-label a {
                          margin-left: 5px;
                          color: #6a64f1;
                        }
                        .formbold-input-checkbox {
                          position: absolute;
                          width: 1px;
                          height: 1px;
                          padding: 0;
                          margin: -1px;
                          overflow: hidden;
                          clip: rect(0, 0, 0, 0);
                          white-space: nowrap;
                          border-width: 0;
                        }
                        .formbold-checkbox-inner {
                          display: flex;
                          align-items: center;
                          justify-content: center;
                          width: 20px;
                          height: 20px;
                          margin-right: 16px;
                          margin-top: 2px;
                          border: 0.7px solid #dde3ec;
                          border-radius: 3px;
                        }
                      
                        .formbold-form-file {
                          padding: 12px;
                          font-size: 14px;
                          line-height: 24px;
                          color: rgba(83, 99, 135, 0.5);
                        }
                        .formbold-form-file::-webkit-file-upload-button {
                          display: none;
                        }
                        .formbold-form-file:before {
                          content: 'Upload';
                          display: inline-block;
                          background: #EEEEEE;
                          border: 0.5px solid #E7E7E7;
                          border-radius: 3px;
                          padding: 3px 12px;
                          outline: none;
                          white-space: nowrap;
                          -webkit-user-select: none;
                          cursor: pointer;
                          color: #637381;
                          font-weight: 500;
                          font-size: 12px;
                          line-height: 16px;
                          margin-right: 10px;
                        }
                      
                        .formbold-btn {
                          font-size: 16px;
                          border-radius: 5px;
                          padding: 14px 25px;
                          border: none;
                          font-weight: 500;
                          background-color: #6a64f1;
                          color: white;
                          cursor: pointer;
                          margin-top: 25px;
                        }
                        .formbold-btn:hover {
                          box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
                        }
                      
                        .formbold-w-45 {
                          width: 45%;
                        }
                      </style></h1>

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
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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

</body>

</html>


<script>
