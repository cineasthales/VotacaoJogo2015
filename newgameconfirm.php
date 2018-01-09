<?php
session_start();
if (isset($_SESSION["logado"])){
    $usuario = $_SESSION["usuario"];
} else {
    header("location: login.php");
}

include 'header.php';
include 'navrestrict1.php';
?>

<div class="row">
    <div class="col-sm-12">
        <h2>Cadastramento de Jogos</h2>
        <?php
        // obtém os campos do formulário
        $titulo = $_POST["titulo"];
        $estudio = $_POST["estudio"];
        $produtora = $_POST["produtora"];
        $plataformas = $_POST["plataformas"];
        $imagem = $_FILES["imagem"]["name"];
        $imagem_tmp = $_FILES["imagem"]["tmp_name"];

        // exibe as informações do produto
        echo "<h3> Título: $titulo </h3>";
        echo "<h3> Estúdio: $estudio </h3>";
        echo "<h3> Produtora: $produtora </h3>";
        echo "<h3> Plataformas: $plataformas </h3>";
        echo "<h3> Imagem: $imagem </h3>";

        include 'connectdb.php';

        $sql = "INSERT INTO jogos(titulo, estudio, produtora, plataformas)
                VALUES ('$titulo', '$estudio', '$produtora', '$plataformas')";

        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
            echo "<h3> Jogo cadastrado com sucesso! Código: $last_id </h3>";

            // indica o destino da imagem e nome do arquivo da imagem
            $destino = "imagens/" . $last_id . ".jpg";

            // copia a imagem do local temporário para a pasta destino
            move_uploaded_file($imagem_tmp, $destino);
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        ?>
    </div>    
</div>
<?php
include 'footer.php';
