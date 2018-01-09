<?php
session_start();
if (isset($_SESSION["logado"])){
    $usuario = $_SESSION["usuario"];
} else {
    header("location: login.php");
}

include 'header.php';
include 'navrestrict2.php';
?>


<div class="col-sm-9">
    <div class="row">
        <div class="col-sm-12">
            <h2><b>Lista de Votantes</b></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Data e Hora</th>
                        <th>Id Voto</th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'connectdb.php';

// variável contendo comando para recuperar os registros cadastrados no banco de dados
                    $sql = "SELECT id, nome, email, jogo_id, data FROM votantes ORDER BY id";
// executa a instrução SQL
                    $result = $conn->query($sql);

// num_rows: indica o número de registros obtidos
                    if ($result->num_rows > 0) {

// output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id'];
                            $nome = $row['nome'];
                            echo "<tr><td> $id </td>";                            
                            echo "<td>" . $row['nome'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['data'] . "</td>";
                            echo "<td>" . $row['jogo_id'] . "</td></tr>";                            
                        }
                    } else {
                        echo "Não há votos.";
                    }
                    $conn->close();
                    ?>            
                </tbody>
            </table>
        </div>
    </div>
</div>         
</div> 

<?php
include 'footer.php';
