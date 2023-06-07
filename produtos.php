<?php 
    require './classes/produto.class.php';

    $produto = new Produto();

    $produtos = $produto->mostrarProdutos();
?>


<html>
    <head>
        <title>Ola mundo</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@200;300;400;900&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>
    <body>
        <div>
            <?php foreach($produtos as $produto):?>
                <div class="card">
                    <?php foreach($produto['imagens'] as $imagem):?>
                        <img class="card-img-top" src="imagens/<?php echo $imagem?>" alt="none">
                    <?php endforeach;?>
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $produto['nome_produto'];?></h4>
                        <p class="card-text"><?php echo $produto['preco']?></p>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    </body>
</html>