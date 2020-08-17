<?php

require "header.php";
$id = (int) filter_input(INPUT_GET,"id",FILTER_SANITIZE_STRIPPED);
$product = getProductById($id);
?>


<div class="container">
    <div class="row">
        <div class="col-3">
            <figure style="max-height: 200px; height:200px">
                <img class='img-thumbnail rounded mx-auto' src="media/<?= $product['image_url'] ?>" alt="">
            </figure>
        </div>
        <div class="col-9 d-flex flex-column">
            <h1>
                <?= $product['nome'] ?>
            </h1>

            <span>Descrição</span>
            <p><?= $product['descricao'] ?></p>
            <span>Preço</span>
            <span><?= number_format($product['valor'], 2, ",", ".") ?></span>
        <div>
        <a href="<?= url('productEdit?id=' . $product['id']) ?>" class="btn btn-primary">Editar informações do
          produto</a>
        <a class= "btn btn-danger" href="<?= url('delete?id=' . $product['id']) ?>">Deletar</a>
        </div>
        </div>    
    </div>
</div>