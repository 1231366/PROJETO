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
    if (!isset($_SESSION['nome']) || $_SESSION['cargo'] !== 'administrador') {
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
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="AP_admin.php">
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
    <a class="nav-link" href="AP_admin.php">
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
    <a class="nav-link collapsed" href="+DoentesAdmin.php">
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
            <a class="collapse-item" href="+ConsultaAdmin.php">Agendar Consulta</a>
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


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="">
        <i class="fas fa-fw fa-folder"></i>
        <span>Stock de Materiais</span>
    </a>
    <a class="nav-link collapsed" href="">
        <i class="fas fa-fw fa-folder"></i>
        <span>Stock de Equipamentos</span>
    </a>
</li>

<div class="sidebar-heading">
    Gestão da Equipa
</div>


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="Admin_Users.php">
        <i class="fas fa-fw fa-folder"></i>
        <span>Gestão de Utilizadores</span>
    </a>
    <a class="nav-link collapsed" href="">
        <i class="fas fa-fw fa-folder"></i>
        <span>Escala de horários</span>
    </a>
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
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Pesquisar por NOP..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

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

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

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
                                <a class="dropdown-item" href="DefinicoesUserAdmin.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
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
                <div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
<div class="card-body">
  <table style="width: 100%; height: 100%;">
    <tr>
      <td valign="middle" align="center">
        <div class="account-settings">
          <div class="user-profile">
          <div class="user-avatar">


          <?php
// Realizar a verificação do formulário
if (isset($_POST['submit1'])) {
    // Obter os novos valores dos campos do formulário
    $nomecompleto = $_POST['nomecompleto'];
    $contacto = $_POST['contacto'];
    $login = $_POST['login'];

    // Conectar ao banco de dados
    include "ligacao.php"; // Certifique-se de que o arquivo de conexão está incluído corretamente

    // Atualizar os dados na tabela de trabalhadores
    $id_trabalhador = isset($_SESSION['id_trabalhador']) ? $_SESSION['id_trabalhador'] : 0; // Certifique-se de que 'id_trabalhador' está definido no array $_SESSION
    $atualizarDados = "UPDATE trabalhadores SET nome = '$nomecompleto', contacto = '$contacto', login = '$login' WHERE id_trabalhador = $id_trabalhador";
    $resultado = mysqli_query($con, $atualizarDados);

    // Verificar se a atualização foi bem-sucedida
    if ($resultado) {
        echo "Dados atualizados com sucesso.";
        // Atualizar as variáveis de sessão com os novos valores
        $_SESSION['nome'] = $nomecompleto;
        $_SESSION['contacto'] = $contacto;
        $_SESSION['login'] = $login;
    } else {
        echo "Erro ao atualizar os dados: " . mysqli_error($con); // Exibir o erro do banco de dados
    }

    // Fechar a conexão com o banco de dados
    mysqli_close($con);
}
?>
          <form action="DefinicoesUserAdmin.php" method="POST>
  <img src="img/faces/<?php echo $_SESSION['foto']; ?>" alt="Foto do Utilizador">
</div>
<h5 class="user-name">
    <?php echo "<span class='mr-2 d-none d-lg-inline text-gray-600 small'>" . $_SESSION['nome'] . "</span>"; ?>
</h5>
<h6 class="user-email">
    <?php echo "<span class='mr-2 d-none d-lg-inline text-gray-600 small'>@" . $_SESSION['login'] . "</span>"; ?>
</h6>
<!-- Profile picture upload button-->
<br>
<button class="btn btn-primary" type="button">Mudar Imagem</button>
</div>
</div>
</td>
</tr>
</table>
</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
    <div class="card-body">
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h6 class="mb-2 text-primary">Detalhes Pessoais</h6>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="fullName">Nome Completo</label>
                    <input type="text" class="form-control" id="nomecompleto" name="nomecompleto" value="<?php echo $_SESSION['nome']; ?>">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="phone">Telefone</label>
                    <input type="number" class="form-control" id="contacto" name="contacto" value="<?php echo $_SESSION['contacto']; ?>">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="website">ID de Utilizador</label>
                    <input type="text" class="form-control" id="login" name="login" value="<?php echo $_SESSION['login']; ?>">
                </div>
            </div>
        </div>
        <div class="text-right">
            <button type="button" id="submit" name="submit1" class="btn btn-primary">Atualizar</button>
        </div>
    </div>
</div>
</div>
</form>

<?php
// Realizar a verificação da senha atual ao receber o formulário
if (isset($_POST['submit2'])) {
    // Incluir o arquivo de conexão com o banco de dados
    include "ligacao.php";

    // Obter os valores dos campos do formulário
    $passwordAtual = $_POST['passwordAtual'];
    $passwordNova1 = $_POST['PasswordNova1'];
    $passwordNova2 = $_POST['PasswordNova2'];

    // Verificar se a senha atual está correta
    $usuario = $_SESSION['login'];
    $senhaAtualCorreta = false;

    // Consultar a senha atual no banco de dados
    $consulta = "SELECT password FROM trabalhadores WHERE login = '$usuario'";
    $resultado = mysqli_query($con, $consulta);

    if ($resultado) {
        $row = mysqli_fetch_assoc($resultado);
        $senhaBanco = $row['password'];

        // Verificar se a senha atual coincide com a senha do banco de dados
        if ($senhaBanco == $passwordAtual) {
            $senhaAtualCorreta = true;
        }
    }

    // Verificar se a senha atual é correta e as novas senhas coincidem
    if ($senhaAtualCorreta && $passwordNova1 == $passwordNova2) {
        // Atualizar a senha no banco de dados
        $atualizarSenha = "UPDATE trabalhadores SET password = '$passwordNova1' WHERE login = '$usuario'";
        $resultado = mysqli_query($con, $atualizarSenha);

        // Verificar se a atualização foi bem-sucedida
        if ($resultado) {
            echo "FAZER JAVASCRIPT.";
        } else {
            echo "Erro ao atualizar a senha: " . mysqli_error($con);
        }
    } else {
        echo "A senha atual está incorreta ou as novas senhas não coincidem.";
    }

    // Fechar a conexão com o banco de dados
    mysqli_close($con);
}
?>
<form action="DefinicoesUserAdmin.php" method="POST">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mt-3 mb-2 text-primary">Alterar password</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="Street">Password Atual</label>
					<input type="name" class="form-control" id="passwordAtual" name="passwordAtual" placeholder="">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="zIp">Password Nova</label>
					<input type="text" class="form-control" id="PasswordNova1" name="PasswordNova1" placeholder="">
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="zIp">Confirmar Password Nova</label>
					<input type="text" class="form-control" id="PasswordNova2" name="PasswordNova2" placeholder="">
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">
					<button type="submit" id="submit" name="submit2" class="btn btn-primary">Atualizar Password</button>
				</div>
			</div>
		</div>
</form>
	</div>
</div>
</div>
</div>
</div>
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
<style>
    body {
    margin: 0;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
}
.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}


</style>
