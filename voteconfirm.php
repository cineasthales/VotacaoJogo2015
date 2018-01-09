<?php
include 'header.php';
include 'nav1.php';
?>

<div class="row">
    <div class="col-sm-12">
        <h2>Confirmação de Voto</h2>
        <?php
        // obtém os campos do formulário
        $nome = $_POST["nomeVotante"];
        $email = $_POST["emailVotante"];
        $voto = $_POST["jogo"];
        $titulo = $_POST["titulo$voto"];

        // exibe as informações do votante
        echo "<h3> Nome: $nome </h3>";
        echo "<h3> Email: $email </h3>";
        echo "<h3> Voto: $titulo (Código do jogo: $voto)</h3>";

        include 'connectdb.php';

        // consulta para verificar se e-mail e senha estão cadastrados
        $sql = "SELECT * FROM votantes WHERE email='$email'";
        // executa o comando SQL
        $result = $conn->query($sql);

        // se encontrou 1 registro
        if ($result->num_rows == 1) {
            // dá erro
            echo "<h3>Voto não registrado. Não é possível votar mais de uma vez com o mesmo e-mail.</h3>";
        } else {
            // registra
            $sql = "INSERT INTO votantes(nome, email, jogo_id, data)
                    VALUES ('$nome', '$email', '$voto', now())";

            if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id;
                echo "<h3> Voto registrado com sucesso! </h3>";
            } else {
                echo "Erro: " . $sql . "<br>" . $conn->error;
            }
        }
        $conn->close();
        ?>
    </div>    
</div>
<?php
include 'footer.php';
