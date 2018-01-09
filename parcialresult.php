<?php
include 'header.php';
include 'nav2.php';
include 'connectdb.php';

// variável contendo comando para recuperar os registros cadastrados no banco de dados
$sql = "SELECT j.titulo, COUNT(v.id) AS num FROM votantes v INNER JOIN jogos j ON v.jogo_id = j.id GROUP BY j.titulo ORDER BY COUNT(v.id) DESC";
// executa a instrução SQL
$result = $conn->query($sql);

// num_rows: indica o número de registros obtidos
if ($result->num_rows == 0) {
    echo "Não há jogos cadastrados";
}
$conn->close();
?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {packages: ["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {

        var data = new google.visualization.DataTable();

        data.addColumn('string', 'titulo');
        data.addColumn('number', 'num');

<?php while ($row = $result->fetch_assoc()) { ?>
            data.addRows([['<?= $row["titulo"] ?>', <?= $row["num"] ?>]]);
<?php } ?>

        var options = {
            title: 'Resultado Parcial da Votação'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>


<div class="row">
    <div class="col-sm-12">
        <h2><b>Resultado Parcial</b></h2>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div id="piechart" style="width: 900px; height: 500px;"></div>
    </div>
</div>        


<?php
include 'footer.php';
