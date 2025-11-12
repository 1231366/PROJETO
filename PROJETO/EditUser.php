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
            
            <li class="nav-item">
                <?php
                if (isset($_SESSION['cargo']) && $_SESSION['cargo'] === 'médico') {
                    echo '
                    <!-- Heading -->
            <div class="sidebar-heading">
                Prescrições e Atestados
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
                <a class="nav-link collapsed" href="atestados.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Atestados</span>
                </a>
            ';
                }
                ?>
            </li>
            <!-- Divider -->
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <?php
                if (isset($_SESSION['cargo']) && $_SESSION['cargo'] === 'médico') {
                    echo '
                <a class="nav-link collapsed" href="prescrições.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Prescições</span>
                </a>
                <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            ';
                }
                ?>
            </li>
            <li class="nav-item">
                <?php
                if (isset($_SESSION['cargo']) && $_SESSION['cargo'] === 'administrador') {
                    echo '
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
                    <div class="formbold-main-wrapper">
                    <?php
if (isset($_POST["btn_enviar"])) {
    $id_trabalhador = $_GET["id"];
    $sessnome = $_POST["nome"];
    $sesslogin = $_POST["login"];
    $sesspassword = $_POST["password"];
    $sesshorario = $_POST["id_horario"];
    $sesscargo = $_POST["id_cargo"];
    $sesscontacto = $_POST["contacto"];

    include "ligacao.php";

    // Atualizar os campos no banco de dados
    $query = "UPDATE trabalhadores SET nome='$sessnome', contacto='$sesscontacto', id_cargo='$sesscargo', id_horario='$sesshorario', login='$sesslogin', password='$sesspassword' WHERE id_trabalhador='$id_trabalhador'";
    mysqli_query($con, $query) or die("Erro SQL!");

    mysqli_close($con);

    echo "<script>
                      window.location.href = 'Admin_Users.php?success=5';
                  </script>";
} else {
    ?>

    <div class="formbold-form-wrapper">
    <?php

    $id_trabalhador = $_GET["id"];

    include "ligacao.php";

    $query = "SELECT * FROM trabalhadores WHERE id_trabalhador='$id_trabalhador'";
    $resultado = mysqli_query($con, $query) or die("Erro SQL!");

    $registos = mysqli_num_rows($resultado);

    if ($registos == 1) {
        $linha = mysqli_fetch_assoc($resultado);

        $nome = $linha["nome"];
        $contacto = $linha["contacto"];
        
        $id_cargo = $linha["id_cargo"];
        
        $id_horario = $linha["id_horario"];
        $login = $linha["login"];
        $password = $linha["password"];
        $foto = $linha["foto"];
    } else {
        echo "Registo não existe.";
    }

    mysqli_close($con);
    ?>

<form action="EditUser.php?id=<?php echo $id_trabalhador ?>" method="POST" enctype="multipart/form-data">
    <div class="formbold-mb-3">
        <label for="address" class="formbold-form-label"> Nome </label>
        <input
          type="text"
          name="nome"
          id="address"
          placeholder="Nome Completo"
          class="formbold-form-input formbold-mb-3"
          value="<?php echo $nome; ?>"
        />
    </div>

    <div class="formbold-input-flex">
        <div>
            <label for="post" class="formbold-form-label"> Nome de Utilizador </label>
            <input
                type="text"
                name="login"
                id="post"
                placeholder=""
                class="formbold-form-input"
                value="<?php echo $login; ?>"
            />
        </div>
        <div>
    <label for="city" class="formbold-form-label"> Password </label>
    <input
        type="password"
        name="password"
        id="city"
        placeholder=""
        class="formbold-form-input"
        value="<?php echo str_repeat('*', strlen($password)); ?>"
    />
</div>
    </div>

    <div class="formbold-input-flex">
        <div>
            <label class="formbold-form-label">Horário</label>
            <select class="formbold-form-input" name="id_horario" id="genero">
                <option value="1" <?php if ($id_horario == 1) echo "selected"; ?>>Tarde</option>
                <option value="2" <?php if ($id_horario == 2) echo "selected"; ?>>Manhã</option>
            </select>
        </div>
        <div>
            <label class="formbold-form-label">Cargo</label>
            <select class="formbold-form-input" name="id_cargo" id="ProgramaSaude">
                <option value="1" <?php if ($id_cargo == 1) echo "selected"; ?>>Enfermeiro</option>
                <option value="2" <?php if ($id_cargo == 2) echo "selected"; ?>>Médico</option>
                <option value="3" <?php if ($id_cargo == 3) echo "selected"; ?>>Secretário</option>
                <option value="4" <?php if ($id_cargo == 4) echo "selected"; ?>>Administrador</option>
            </select>
        </div>
    </div>

    <div class="formbold-mb-3">
        <label for="address" class="formbold-form-label"> Contacto </label>
        <input
            type="text"
            name="contacto"
            id="address"
            placeholder="Ex:919191919"
            class="formbold-form-input formbold-mb-3"
            value="<?php echo $contacto; ?>"
        />
    </div>
    <div class="formbold-mb-3">
    
    
</div>

    <div class="formbold-checkbox-wrapper">
        <label for="supportCheckbox" class="formbold-checkbox-label">
            <div class="formbold-relative">
                <div class="formbold-checkbox-inner">
                    <span class="formbold-opacity-0">
                        <svg
                            width="11"
                            height="8"
                            viewBox="0 0 11 8"
                            class="formbold-stroke-current"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M8.81868 0.688604L4.16688 5.4878L2.05598 3.29507C1.70417 2.92271 1.1569 2.96409 0.805082 3.29507C0.453266 3.66742 0.492357 4.24663 0.805082 4.61898L3.30689 7.18407C3.54143 7.43231 3.85416 7.55642 4.16688 7.55642C4.47961 7.55642 4.79233 7.43231 5.02688 7.18407L10.0696 2.05389C10.4214 1.68154 10.4214 1.10233 10.0696 0.729976C9.71776 0.357624 9.17049 0.357625 8.81868 0.688604Z"
                                fill="white"
                            />
                        </svg>
                    </span>
                </div>
            </div>
        </label>
    </div>

    <input type="submit" name="btn_enviar" class="formbold-btn" value="Atualizar dados de utilizador">
</form>
                    </div>
                    </div>
                    </form>
                    <?php
                    }
                    ?>    
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