<!doctype html>
<html lang="en">
    <head>
    <title>Produto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    </head>

    <body>
        <form method="post" enctype="mulipart/form-data">
            <div class="mb-3">
              <label for="name" class="form-label">Nome</label>
              <input type="text"
                class="form-control" name="nome" id="name" placeholder="Insira o nome do produto...">
            </div>
            <div class="mb-3">
              <label for="preco" class="form-label">Preço</label>
              <input type="number"
                class="form-control" name="preco" id="preco" placeholder="Insira a descrição do produto...">
            </div>
            <div class="mb-3">
              <label for="desc" class="form-label">Descrição</label>
              <input type="text"
                class="form-control" name="descricao" id="desc" placeholder="Insira a descrição do produto...">
            </div>
            <div class="mb-3">
              <label for="fotos" class="form-label">Escolha um ou mais imagens</label>
              <input type="file" class="form-control" name="foto[]" multiple  id="fotos" placeholder="Insira uma ou mais imagens">
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" onclick="enviar_imagem()" type="submit" name="btn">
            </div>

        </form>
        <a href="./produtos.php">Ir para produtos</a>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    </body>
</html>

<?php
    if (isset($_POST['nome'])) {
        $nome = addslashes($_POST['nome']);
        $descricao = addslashes($_POST['descricao']);
        $preco = addslashes($_POST['preco']);
        $fotos = array();
    }

    if (isset($_FILES['foto'])) {
        for ($i = 0; $i < count($_FILES['foto']['name']); $i++) {
            $temp_nome_foto = $_FILES['foto']['tmp_name'][$i];
            $nome_foto = md5(uniqid('', true)) . '.jpg';
            $destino = 'imagens/' . $nome_foto;
            move_uploaded_file($temp_nome_foto, $destino);

            array_push($fotos, $nome_foto);
        }
    }

    if (!empty($nome) && !empty($descricao)) {
        require './classes/produto.class.php';
        $p = new Produto();
        $p->enviarProduto($nome, $descricao, $fotos, $preco);
    }
?>

<script>
    function enviar_imagem() {
        alert("Imagem transferida com sucesso!");
    }
</script>        
    </body>
</html>

