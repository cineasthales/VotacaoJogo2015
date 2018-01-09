<?php
session_start();

$mensagem = "";

// verifica se existe a variável $_POST("email")
// se existe: o formulário foi preenchido
if (isset($_POST["email"])) {

    // obtém os campos preenchidos do formulário
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // inclui o código de conexão com o BD
    include "connectdb.php";

    // consulta para verificar se e-mail e senha estão cadastrados
    $sql = "SELECT * FROM usuarios WHERE email='$email' AND senha=md5('$senha')";
    // executa o comando SQL
    $result = $conn->query($sql);

    // se encontrou 1 registro
    if ($result->num_rows == 1) {

        // recupera a linha obtida da consulta SQL
        $row = $result->fetch_assoc();

        // define as variáveis de sessão
        $_SESSION["usuario"] = $row["nome"];
        $_SESSION["logado"] = 1;

        // carrega a página principal da área restrita
        header("location: newgame.php");
    } else {
        $mensagem = "Combinação e-mail e senha incorreta.";
    }
    $conn->close();
}
?>

<?php
include 'header.php';
include 'nav3.php';
?>

<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <br><br><br>
        <form class="form-signin" method="post">
            <h2 class="form-signin-heading"><b>Área Restrita</b></h2>
            <br><label for="inputEmail" class="sr-only">E-mail</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="E-mail" required autofocus>
            <br><label for="inputPassword" class="sr-only">Senha</label>
            <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Senha" required>        
            <br><button class="btn btn-lg btn-success btn-block" type="submit">Entrar</button>
        </form>
        <h4 class="text-center text-danger"><?= $mensagem ?></h4>
        <br><br><br><br><br><br><br>
    </div>
    <div class="col-sm-4"></div>
</div>

<?php
include 'footer.php';
