<?php
include 'header.php';
include 'nav1.php';
?>

<div class="row">
    <div class="col-sm-6">
        <h3><b>Instruções</b></h3>
        <p>O site <b>Jogo Limpo</b> elege todos os anos os melhores jogos nas
            mais diversas categorias. Agora é a sua vez de decidir qual título
            merece o <b>Prêmio Júri Popular</b>. Para votar, basta preencher os
            dados e clicar no botão <b>Votar</b> do game de sua escolha! Contudo,
            só é permitido um voto por e-mail!</p>
        <p><b>Vote agora!</b></p>
        <p><b>Divulgue para os amigos!</b></p>
    </div>
    <div class="col-sm-6">
        <h3>Para votar, por favor, preencha seus dados abaixo.</h3>
        <form class="form" role="form" method="post" action="voteconfirm.php">
            <div class="form-group">
                <label for="nomeVotante">Nome:</label>
                <input type="text" class="form-control" id="nomeVotante" name="nomeVotante" required autofocus>
            </div>        
            <div class="form-group">
                <label for="emailVotante">E-mail:</label>
                <input type="email" class="form-control" id="emailVotante" name="emailVotante" required>
            </div>            
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <hr>
        <h2><b>Prêmio Júri Popular</b></h2>
        <br>
        <?php
        include 'connectdb.php';

// variável contendo comando para recuperar os registros cadastrados no banco de dados
        $sql = "SELECT id, titulo, estudio, produtora, plataformas FROM jogos ORDER BY titulo";
// executa a instrução SQL
        $result = $conn->query($sql);

// num_rows: indica o número de registros obtidos
        if ($result->num_rows > 0) {

// output data of each row
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $titulo = $row['titulo'];
                echo "<input type='hidden' name='titulo$id' value='$titulo'>";
                echo "<div class='col-sm-4'>";
                echo "<img src='imagens/$id.jpg' style='width: 350px; height: 450px;'><br>";
                echo "<br>" . $row['titulo'];
                echo "<br>" . " " . $row['estudio'];
                echo "<br>" . " " . $row['produtora'];
                echo "<br>" . " " . $row['plataformas'];
                echo "<br><button type='submit' class='btn btn-success' name='jogo' value='$id'>Votar</button><br><br></div>";
            }            
        } else {
            echo "Não há jogos cadastrados.";            
        }
        $conn->close();
        ?>
        </form>
    </div> 
</div>



<?php
include 'footer.php';
