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
        <div>
            <?php

                
                $nome = basename($_FILES["arq"]["name"]);
                $des = $_POST["desc"];
                $localizacao = "carregados".DIRECTORY_SEPARATOR. $nome;
                $extensao = strtolower(pathinfo($localizacao,PATHINFO_EXTENSION)); 
                
                if ($extensao == "jpg" || $extensao == "jpeg" || $extensao == "png" || $extensao == "gif" || $extensao == "mp4" ) {
                    move_uploaded_file($_FILES["arq"]["tmp_name"],$localizacao);
                    

                    $elementoCond;
                    if ($extensao != "mp4") {
                        $elementoCond = "<img class='vitrine' src=$localizacao>";
                    }
                    else
                    {
                        $elementoCond = "<video class='vitrine'  controls><source src=$localizacao type='video/mp4'></video>";
                    }

                    $_SESSION["$nome"] = array($nome,$elementoCond,$des);
                    echo "O arquivo foi adicionado com sucesso!";
                }
                else
                {
                    echo "Desculpe, mas o formato enviado não é compatível. Dentre os formatos permitidos estão jpg, jpeg, png, gif e mp4";
                }
            
            
            ?>
        
        </div>
        <div>
            
           <a href="index.php"> Adicione outra mídia</a>
        </div>
    </main>
    
</body>
</html>

<?php
   
?>
