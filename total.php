<?php
session_start();
if (isset($_SESSION["logado"])){
    $usuario = $_SESSION["usuario"];
} else {
    header("location: login.php");
}

include 'header.php';
include 'navrestrict3.php';
?>


<div class="col-sm-9">
    <div class="row">
        <div class="col-sm-12">
            <h2><b>Total de Votos</b></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Votos</th>
                        <th>Título</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'connectdb.php';

// variável contendo comando para recuperar os registros cadastrados no banco de dados
                    $sql = "SELECT j.titulo, COUNT(v.id) AS num FROM votantes v INNER JOIN jogos j ON v.jogo_id = j.id GROUP BY j.titulo ORDER BY COUNT(v.id) DESC";
// executa a instrução SQL
                    $result = $conn->query($sql);

// num_rows: indica o número de registros obtidos
                    if ($result->num_rows > 0) {

// output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $titulo = $row['titulo'];
                            echo "<tr><td>" . $row['num'] . "</td>";
                            echo "<td>" . $row['titulo'] . "</td>";
                        }
                    } else {
                        echo "Não há jogos cadastrados";
                    }
                    $conn->close();
                    ?>            
                </tbody>
            </table>
        </div>
    </div>
</div>         
</div> 
<br><br><br><br>
<?php
include 'footer.php';
