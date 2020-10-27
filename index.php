<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    
    <title>Carregador</title>

    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<?php
    require_once("sessao.php");
?>
    <header>
        <h1>
            Carregador de fotos e vídeos
        </h1>
    </header>
    <main>
        <div class="formulario">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <label name="arq">Adicione uma foto ou um vídeo:</label>
                <p class="detalhe">Os formatos permitidos são jpg, jpeg, png, gif e mp4.</p>
                <input type="file" name="arq" required><br>
                <label name="desc">Adicione uma descrição:</label></br>
                <textarea class="cx" type="text" name="desc" id=""></textarea><br>
                <input type="submit" value="Faça o upload" class="botao" name="submit">
             </form>
        </div>
        <div>
            <?php
                
                foreach ($_SESSION as $campo) {
                    echo "<div class='res'><section class='nome_midia'><b>$campo[0]</section><section class='compart' >$campo[1]</section><section class='descricao'>$campo[2]</section></div><br>";
                }

            ?>
        </div>
    </main>
    
</body>
</html>
