<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

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
    <img src="img/AP.png" class="logo-image" >
  </div>
  <div class="sidebar-brand-text mx-3"></div>
</a>

<style>
.logo-image {
  width: 70px; /* Defina a largura desejada para a imagem */
  display: block; /* Para centralizar horizontalmente */
  margin: 0 auto; /* Para centralizar horizontalmente */
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

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Consultas</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="">Agendamentos</a>
                        <a class="collapse-item" href="+Consulta.php">Agendar Consulta</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Indicadores
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Indicadores</span>
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
    <div id="collapseA" class="collapse" aria-labelledby="headingA"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="GestaoMateriais.php">Stock de Materiais</a>
            <a class="collapse-item" href="GestaoEquipamentos.php">Stock de Equipamentos</a>
        </div>
    </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <?php
// Verificar se o formulário foi enviado
if (isset($_POST['btn_enviar'])) {
    // Capturar o ID do paciente da URL
    $id_paciente = $_GET['id'];

    // Capturar os dados do formulário
    $nome = $_POST['nome'];
    $genero = $_POST['genero'];
    $contacto = $_POST['contacto'];
    $morada = $_POST['morada'];

    // Capturar os programas de saúde selecionados
    $programasSaude = isset($_POST['programaSaude']) ? $_POST['programaSaude'] : array();

    // Incluir o arquivo de conexão
    include "ligacao.php";

    // Iniciar a transação
    mysqli_begin_transaction($con);

    // Preparar a consulta SQL para atualizar o paciente
    $queryAtualizarPaciente = "UPDATE pacientes SET nome = '$nome', genero = '$genero', contacto = '$contacto', morada = '$morada' WHERE id_paciente = $id_paciente";

    // Executar a consulta para atualizar o paciente
    if (mysqli_query($con, $queryAtualizarPaciente)) {
        // Definir todos os programas de saúde do paciente como 'Antigo' (Atual = 0)
        $queryDefinirAntigos = "UPDATE pacientes_programas SET atual = 0 WHERE id_paciente = $id_paciente";
        mysqli_query($con, $queryDefinirAntigos);

        // Inserir ou atualizar os programas de saúde selecionados como 'Atual' (Atual = 1)
        foreach ($programasSaude as $programa) {
            // Verificar se já existe um registro para o programa de saúde
            $queryVerificarExistencia = "SELECT * FROM pacientes_programas WHERE id_paciente = $id_paciente AND id_doenca = $programa";
            $resultExistencia = mysqli_query($con, $queryVerificarExistencia);

            if (mysqli_num_rows($resultExistencia) > 0) {
                // Atualizar o registro existente para 'Atual'
                $queryAtualizarPrograma = "UPDATE pacientes_programas SET atual = 1 WHERE id_paciente = $id_paciente AND id_doenca = $programa";
                mysqli_query($con, $queryAtualizarPrograma);
            } else {
                // Inserir um novo registro para o programa de saúde
                $queryInserirPrograma = "INSERT INTO pacientes_programas (id_paciente, id_doenca, atual) VALUES ($id_paciente, $programa, 1)";
                mysqli_query($con, $queryInserirPrograma);
            }
        }

        // Commit a transação
        mysqli_commit($con);

        // Redirecionar para a página inicial
        echo "<script>window.location.href = 'perfilpaciente.php?id=" . $id_paciente . "&sucess=2';</script>";
    } else {
        // Rollback a transação em caso de erro
        mysqli_rollback($con);
        echo "Erro ao atualizar o paciente: " . mysqli_error($con);
    }

    // Fechar a conexão com o banco de dados
    mysqli_close($con);
}
?>
                    <div class="formbold-main-wrapper">

                        <div class="formbold-form-wrapper">
                        <?php
include "ligacao.php";

// Recupera o ID do paciente da URL
$id_paciente = $_GET['id'];

// Consulta para obter os dados do paciente com base no ID
$sql_paciente = "SELECT * FROM pacientes WHERE id_paciente = $id_paciente";
$result_paciente = $con->query($sql_paciente);

if ($result_paciente->num_rows > 0) {
  $paciente = $result_paciente->fetch_assoc();

  // Atribuir os valores do paciente às variáveis
  $nomeDoPaciente = $paciente['nome'];
  $generoDoPaciente = $paciente['genero'];
  $contactoDoPaciente = $paciente['contacto'];
  $medicoResponsavelDoPaciente = $paciente['id_medico_responsavel'];
  $enfermeiroResponsavelDoPaciente = $paciente['id_enfermeiro_responsavel'];
  $moradaDoPaciente = $paciente['morada'];
}

// Consulta para obter os médicos registrados
$sql_medicos = "SELECT id_trabalhador, nome FROM trabalhadores WHERE id_cargo = 2";
$result_medicos = $con->query($sql_medicos);

// Consulta para obter os enfermeiros registrados
$sql_enfermeiros = "SELECT id_trabalhador, nome FROM trabalhadores WHERE id_cargo = 1";
$result_enfermeiros = $con->query($sql_enfermeiros);

$con->close();
?>

<form action="EditPaciendTec.php?id=<?php echo $id_paciente ?>" method="POST">
  <div class="formbold-mb-3">
    <label for="address" class="formbold-form-label">Nome</label>
    <input
      type="text"
      name="nome"
      id="nome"
      placeholder="Nome Completo"
      class="formbold-form-input formbold-mb-3"
      value="<?php echo $nomeDoPaciente; ?>"
      required
    />
  </div>

  <div class="formbold-input-flex">
    <div>
      <label class="formbold-form-label">Género</label>
      <select class="formbold-form-input" name="genero" id="genero" required>
        <option value="M" <?php if ($generoDoPaciente === 'M') echo 'selected'; ?>>Masculino</option>
        <option value="F" <?php if ($generoDoPaciente === 'F') echo 'selected'; ?>>Feminino</option>
      </select>
    </div>
    <div>
      <label for="address" class="formbold-form-label">Contacto</label>
      <input
        type="text"
        name="contacto"
        id="contacto"
        placeholder="Ex: 919191919"
        class="formbold-form-input formbold-mb-3"
        value="<?php echo $contactoDoPaciente; ?>"
        required
      />
    </div>
  </div>

  <div class="formbold-input-flex">
    <div>
    
    <?php
include "ligacao.php";

// ID do paciente desejado
$pacienteId = $_GET['id'];

// Consulta SQL para obter os programas de saúde selecionados do paciente
$query = "SELECT id_doenca FROM pacientes_programas WHERE id_paciente = '$pacienteId' AND atual = 1";

// Executar a consulta
$result = $con->query($query);

// Verificar se ocorreu um erro na consulta
if (!$result) {
    die("Erro na consulta: " . $con->error);
}

// Array para armazenar os programas de saúde selecionados
$programasSelecionados = array();

// Obter os programas de saúde selecionados da consulta
while ($row = $result->fetch_assoc()) {
    $programasSelecionados[] = $row['id_doenca'];
}

// Fechar o resultado da consulta
$result->close();
?>

<div class="formbold-mb-3">
  <label class="formbold-form-label">Programa de Saúde Especial</label>
  <div class="dropdown" onclick="toggleDropdown(event)">
    <button class="dropdown-toggle formbold-form-input" type="button" id="dropdownMenuButton"></button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <input type="checkbox" name="programaSaude[]" value="0" id="opcao0" class="formbold-checkbox" <?php if (in_array(0, $programasSelecionados)) echo 'checked'; ?>>
      <label for="opcao0">Sem programa de Saúde especial</label>
      <br>
      <input type="checkbox" name="programaSaude[]" value="1" id="opcao1" class="formbold-checkbox" <?php if (in_array(1, $programasSelecionados)) echo 'checked'; ?>>
      <label for="opcao1">Hipertensão</label>
      <br>
      <input type="checkbox" name="programaSaude[]" value="2" id="opcao2" class="formbold-checkbox" <?php if (in_array(2, $programasSelecionados)) echo 'checked'; ?>>
      <label for="opcao2">Saúde Materna</label>
      <br>
      <input type="checkbox" name="programaSaude[]" value="3" id="opcao3" class="formbold-checkbox" <?php if (in_array(3, $programasSelecionados)) echo 'checked'; ?>>
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
    <div>
      
    </div>
  </div>

  <div class="formbold-mb-3">
    <label for="address" class="formbold-form-label">Morada</label>
    <input
      type="text"
      name="morada"
      id="morada"
      placeholder="Rua armando tavares 342 1º esq, 4405-841"
      class="formbold-form-input formbold-mb-3"
      value="<?php echo $moradaDoPaciente; ?>"
      required
    />
  </div>

  <input type="submit" name="btn_enviar" class="formbold-btn" value="Atualizar dados do Paciente">
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
                    .formbold-mb-3 {
                        margin-bottom: 15px;
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
                        padding: 40px;
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
                        color: #07074D;
                        font-weight: 500;
                        font-size: 14px;
                        line-height: 24px;
                        display: block;
                        margin-bottom: 10px;
                    }

                    .formbold-form-file-flex {
                        display: flex;
                        align-items: center;
                        gap: 20px;
                    }
                    .formbold-form-file-flex .formbold-form-label {
                        margin-bottom: 0;
                    }
                    .formbold-form-file {
                        font-size: 14px;
                        line-height: 24px;
                        color: #536387;
                    }
                    .formbold-form-file::-webkit-file-upload-button {
                        display: none;
                    }
                    .formbold-form-file:before {
                        content: 'Upload file';
                        display: inline-block;
                        background: #EEEEEE;
                        border: 0.5px solid #FBFBFB;
                        box-shadow: inset 0px 0px 2px rgba(0, 0, 0, 0.25);
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
                        text-align: center;
                        width: 100%;
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
                    </style>
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