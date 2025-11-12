<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
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
    height:28%;
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
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
  <div class="input-group">
  <input id="searchInput" type="text" class="form-control bg-light border-0 small" placeholder="Pesquisar Utente..."
  aria-label="Search" aria-describedby="basic-addon2" onclick="showPacientes()" autocomplete="off">
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

  document.onclick = function(e) {
    if (!document.getElementById("searchInput").contains(e.target)) {
      var pacientes = document.getElementById("pacientes");
      pacientes.style.display = "none";
    }
  };
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('#searchInput').on('input', function() {
      var searchTerm = $(this).val().toLowerCase();
      $('.paciente').each(function() {
        var name = $(this).data('name').toLowerCase();
        if (name.includes(searchTerm)) {
          $(this).show();
        } else {
          $(this).hide();
        }
      });
    });

    $('.paciente').click(function() {
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

                        

                        <!-- Nav Item - User Information -->
                        <!-- Código HTML modificado -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                echo "<span class='mr-2 d-none d-lg-inline text-gray-600 small'>".$_SESSION['nome']."</span>";
                                ?>
                                <img class="img-profile rounded-circle" src="img/faces/<?php echo $_SESSION['foto']; ?>">
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
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>


                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <section >
  <div class="container py-5">
    <div class="row">
      <div class="col">
      
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="img/faces/perfil.jpg" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?php
// perfilpaciente.php

// Verifica se o parâmetro 'id' está presente na URL
if (isset($_GET['id'])) {
    // Recupera o ID do paciente
    $id = $_GET['id'];

    include "ligacao.php";

    // Verifica se houve erro na conexão
    if ($con->connect_error) {
        die("Falha na conexão com o banco de dados: " . $con->connect_error);
    }

    // Query para buscar o nome do paciente com base no ID
    $sql = "SELECT nome FROM pacientes WHERE id_paciente = $id";

    // Executa a query
    $result = $con->query($sql);

    // Verifica se a query retornou resultados
    if ($result->num_rows > 0) {
        // Obtém o nome do paciente
        $row = $result->fetch_assoc();
        $nomePaciente = $row["nome"];

        // Exibe o nome do paciente
        echo $nomePaciente;
    } else {
        echo "Paciente não encontrado.";
    }

    // Fecha a conexão com o banco de dados
    $con->close();
}
?></h5>
            <div class="d-flex justify-content-center mb-2">
  <a href="EditPaciendTec.php?id=<?php echo $id ?>"<button type="button" class="btn btn-primary">Editar Utente</button>
  <span style="width: 10px;"></span> <!-- ou <div style="margin-right: 10px;"></div> -->
  <a href="DeletePacientes1.php?id=<?php echo $id ?>"><button type="button" class="btn btn-outline-primary">Apagar</button></a>
</div>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0 d-none">
  <div class="card-body p-0">
    <!-- Conteúdo da div -->
  </div>
</div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nome Completo:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php
// perfilpaciente.php

// Verifica se o parâmetro 'id' está presente na URL
if (isset($_GET['id'])) {
    // Recupera o ID do paciente
    $id = $_GET['id'];

    include "ligacao.php";

    // Verifica se houve erro na conexão
    if ($con->connect_error) {
        die("Falha na conexão com o banco de dados: " . $con->connect_error);
    }

    // Query para buscar o nome do paciente com base no ID
    $sql = "SELECT nome FROM pacientes WHERE id_paciente = $id";

    // Executa a query
    $result = $con->query($sql);

    // Verifica se a query retornou resultados
    if ($result->num_rows > 0) {
        // Obtém o nome do paciente
        $row = $result->fetch_assoc();
        $nomePaciente = $row["nome"];

        // Exibe o nome do paciente
        echo $nomePaciente;
    } else {
        echo "Paciente não encontrado.";
    }

    // Fecha a conexão com o banco de dados
    $con->close();
}
?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Data de Nascimento</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php
                // perfilpaciente.php

// Verifica se o parâmetro 'id' está presente na URL
if (isset($_GET['id'])) {
    // Recupera o ID do paciente
    $id = $_GET['id'];

    include "ligacao.php";

    // Verifica se houve erro na conexão
    if ($con->connect_error) {
        die("Falha na conexão com o banco de dados: " . $con->connect_error);
    }

    // Query para buscar a data de nascimento do paciente com base no ID
    $sql = "SELECT data_nascimento FROM pacientes WHERE id_paciente = $id";

    // Executa a query
    $result = $con->query($sql);

    // Verifica se a query retornou resultados
    if ($result->num_rows > 0) {
        // Obtém a data de nascimento do paciente
        $row = $result->fetch_assoc();
        $dataNascimentoPaciente = $row["data_nascimento"];

        // Exibe a data de nascimento do paciente
        echo   $dataNascimentoPaciente;
    } else {
        echo "Paciente não encontrado.";
    }

    // Fecha a conexão com o banco de dados
    $con->close();
}
                
                
                
                ?>
                </p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Médico Responsável</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php
                // perfilpaciente.php

// Verifica se o parâmetro 'id' está presente na URL
if (isset($_GET['id'])) {
    // Recupera o ID do paciente
    $id = $_GET['id'];

    include "ligacao.php";

    // Verifica se houve erro na conexão
    if ($con->connect_error) {
        die("Falha na conexão com o banco de dados: " . $con->connect_error);
    }

    // Query para buscar o ID do médico responsável com base no ID do paciente
    $sql = "SELECT id_medico_responsavel FROM pacientes WHERE id_paciente = $id";

    // Executa a query
    $result = $con->query($sql);

    // Verifica se a query retornou resultados
    if ($result->num_rows > 0) {
        // Obtém o ID do médico responsável
        $row = $result->fetch_assoc();
        $idMedicoResponsavel = $row["id_medico_responsavel"];

        // Query para buscar o nome do médico responsável com base no ID
        $sqlMedico = "SELECT nome FROM trabalhadores WHERE id_trabalhador = $idMedicoResponsavel";

        // Executa a query para obter o nome do médico responsável
        $resultMedico = $con->query($sqlMedico);

        // Verifica se a query do médico retornou resultados
        if ($resultMedico->num_rows > 0) {
            // Obtém o nome do médico responsável
            $rowMedico = $resultMedico->fetch_assoc();
            $nomeMedicoResponsavel = $rowMedico["nome"];

            // Exibe o nome do médico responsável
            echo  $nomeMedicoResponsavel;
        } else {
            echo "Médico responsável não encontrado.";
        }
    } else {
        echo "Paciente não encontrado.";
    }

    // Fecha a conexão com o banco de dados
    $con->close();
}
                
                
                
                ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Enfermeiro Responsável</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php
                // perfilpaciente.php

// Verifica se o parâmetro 'id' está presente na URL
if (isset($_GET['id'])) {
    // Recupera o ID do paciente
    $id = $_GET['id'];

    include "ligacao.php";

    // Verifica se houve erro na conexão
    if ($con->connect_error) {
        die("Falha na conexão com o banco de dados: " . $con->connect_error);
    }

    // Query para buscar o ID do enfermeiro responsável com base no ID do paciente
    $sql = "SELECT id_enfermeiro_responsavel FROM pacientes WHERE id_paciente = $id";

    // Executa a query
    $result = $con->query($sql);

    // Verifica se a query retornou resultados
    if ($result->num_rows > 0) {
        // Obtém o ID do enfermeiro responsável
        $row = $result->fetch_assoc();
        $idEnfermeiroResponsavel = $row["id_enfermeiro_responsavel"];

        // Query para buscar o nome do enfermeiro responsável com base no ID
        $sqlEnfermeiro = "SELECT nome FROM trabalhadores WHERE id_trabalhador = $idEnfermeiroResponsavel";

        // Executa a query para obter o nome do enfermeiro responsável
        $resultEnfermeiro = $con->query($sqlEnfermeiro);

        // Verifica se a query do enfermeiro retornou resultados
        if ($resultEnfermeiro->num_rows > 0) {
            // Obtém o nome do enfermeiro responsável
            $rowEnfermeiro = $resultEnfermeiro->fetch_assoc();
            $nomeEnfermeiroResponsavel = $rowEnfermeiro["nome"];

            // Exibe o nome do enfermeiro responsável
            echo $nomeEnfermeiroResponsavel;
        } else {
            echo "Enfermeiro responsável não encontrado.";
        }
    } else {
        echo "Paciente não encontrado.";
    }

    // Fecha a conexão com o banco de dados
    $con->close();
}
                
                
                ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Contacto</p>
              </div>
              <div class="col-sm-9">
    <p class="text-muted mb-0">
        <?php
        // Verifica se o parâmetro 'id' está presente na URL
        if (isset($_GET['id'])) {
            // Recupera o ID do paciente
            $id = $_GET['id'];

            include "ligacao.php";

            // Verifica se houve erro na conexão
            if ($con->connect_error) {
                die("Falha na conexão com o banco de dados: " . $con->connect_error);
            }

            // Query para buscar o contato do paciente com base no ID
            $sql = "SELECT contacto FROM pacientes WHERE id_paciente = $id";

            // Executa a query
            $result = $con->query($sql);

            // Verifica se a query retornou resultados
            if ($result->num_rows > 0) {
                // Obtém o contato do paciente
                $row = $result->fetch_assoc();
                $contactoPaciente = $row["contacto"];

                // Exibe o contato do paciente
                echo $contactoPaciente;
            } else {
                echo "Paciente não encontrado.";
            }

            // Fecha a conexão com o banco de dados
            $con->close();
        }
        ?>
    </p>
</div>
            </div>
            <div class="row">
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Programas de Saúde</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php
// Verifica se o parâmetro 'id' está presente na URL
if (isset($_GET['id'])) {
    // Recupera o ID do paciente
    $id = $_GET['id'];

    include "ligacao.php";

    // Verifica se houve erro na conexão
    if ($con->connect_error) {
        die("Falha na conexão com o banco de dados: " . $con->connect_error);
    }

    // Query para buscar os programas de saúde associados ao paciente
    $sql = "SELECT ps.nome FROM programassaude ps
        INNER JOIN pacientes_programas pp ON ps.id_programa = pp.id_doenca
        WHERE pp.id_paciente = $id AND pp.atual = 1";

    // Executa a query
    $result = $con->query($sql);

    // Verifica se a query retornou resultados
    if ($result->num_rows > 0) {
        echo "";

        // Array para armazenar os nomes dos programas
        $nomesProgramas = array();
        
        // Itera sobre os resultados e adiciona os nomes dos programas ao array
        while ($row = $result->fetch_assoc()) {
            $nomePrograma = $row["nome"];
            $nomesProgramas[] = $nomePrograma;
        }
        
        // Concatena os nomes dos programas em uma única string separada por vírgulas
        $programasCorridos = implode(", ", $nomesProgramas);
        
        echo $programasCorridos;
    } else {
        echo "Nenhum programa de saúde encontrado para este paciente.";
    }

    // Fecha a conexão com o banco de dados
    $con->close();
}
?></p>
              </div>
              
            </div>
            <div class="row">
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Programas de Saúde Anteriores</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php
// Verifica se o parâmetro 'id' está presente na URL
if (isset($_GET['id'])) {
    // Recupera o ID do paciente
    $id = $_GET['id'];

    include "ligacao.php";

    // Verifica se houve erro na conexão
    if ($con->connect_error) {
        die("Falha na conexão com o banco de dados: " . $con->connect_error);
    }

    // Query para buscar os programas de saúde associados ao paciente
    $sql = "SELECT ps.nome FROM programassaude ps
        INNER JOIN pacientes_programas pp ON ps.id_programa = pp.id_doenca
        WHERE pp.id_paciente = $id AND pp.atual = 0";

    // Executa a query
    $result = $con->query($sql);

    // Verifica se a query retornou resultados
    if ($result->num_rows > 0) {
        echo "";

        // Array para armazenar os nomes dos programas
        $nomesProgramas = array();
        
        // Itera sobre os resultados e adiciona os nomes dos programas ao array
        while ($row = $result->fetch_assoc()) {
            $nomePrograma = $row["nome"];
            $nomesProgramas[] = $nomePrograma;
        }
        
        // Concatena os nomes dos programas em uma única string separada por vírgulas
        $programasCorridos = implode(", ", $nomesProgramas);
        
        echo $programasCorridos;
    } else {
        echo "Nenhum programa de saúde anterior encontrado para este paciente.";
    }

    // Fecha a conexão com o banco de dados
    $con->close();
}
?></p>
          </div>
          
          
        </div>
        
      </div>
      
    </div>
  </div>
</section>





<?php
if (isset($_GET['sucess']) && $_GET['sucess'] == 2) {
    // Remova o código do alert
}
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (window.location.search.includes('sucess=2')) {
            Toastify({
                text: 'Dados editados com sucesso',
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




                
            <!-- End of Main Content -->
        </div>
        <div class="card shadow mb-4" style="width:75%;margin:auto;">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Consultas</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          
            <div class="table-container">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 25%;">Data</th>
                            <th style="width: 50%;">Tipo de Consulta</th>
                            <th style="width: 25%;">Profissional</th>
                        </tr>
                    </thead>
                    <style>
                      .table-container {
    margin-left: 100px;
    margin-right: 100px;
}
</style>

                <tbody>
                    <?php
                    include 'ligacao.php';
                    $query = "SELECT consultas.data_hora_inicio, tipos_consultas.nome, trabalhadores.nome AS profissional 
                              FROM consultas 
                              INNER JOIN tipos_consultas ON consultas.id_tipo_consulta = tipos_consultas.id_tipo_consulta 
                              INNER JOIN trabalhadores ON consultas.id_trabalhador = trabalhadores.id_trabalhador WHERE id_paciente=$id";

                    $resultado = mysqli_query($con, $query) or die("Erro SQL!");
                    mysqli_close($con);

                    while ($linha = mysqli_fetch_array($resultado)) {
                        echo "<tr>";
                        echo "<td>" . substr($linha["data_hora_inicio"], 0, 10) . "</td>";
                        echo "<td>" . $linha["nome"] . "</td>";
                        echo "<td>" . $linha["profissional"] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
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