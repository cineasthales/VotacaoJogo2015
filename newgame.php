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
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <h2><b>Cadastramento de Jogos</b></h2>
    </div>
    <div class="col-sm-4"></div>
</div>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <form role="form" method="post" action="newgameconfirm.php" enctype="multipart/form-data">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" required autofocus>
                </div>
            </div>
            <div class="col-sm-12">    
                <div class="form-group">
                    <label for="estudio">Estúdio:</label>
                    <input type="text" class="form-control" id="estudio" name="estudio" required>
                </div>
            </div>
            <div class="col-sm-12">    
                <div class="form-group">
                    <label for="produtora">Produtora:</label>
                    <input type="text" class="form-control" id="produtora" name="produtora" required>
                </div>
            </div>
            <div class="col-sm-12">    
                <div class="form-group">
                    <label for="plataformas">Plataformas:</label>
                    <input type="text" class="form-control" id="plataformas" name="plataformas" required>
                </div>
            </div>
            <div class="col-sm-12">    
                <div class="form-group">
                    <label for="imagem">Imagem do Jogo:</label>
                    <input type="file" class="form-control" id="imagem" name="imagem" required>
                </div>
            </div>
            <div class="col-sm-12">
                <button type="submit" class="btn btn-success">Enviar</button>
                <button type="reset" class="btn btn-warning">Limpar</button>   
            </div>
        </form>        
    </div>    
    <div class="col-sm-4"></div>
</div>
<br><br><br><br>
<?php
include 'footer.php';
