<?php
require "header.php";
$products = getProducts();
?>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Preço</th>
                <th scope="col">Detalhes</th>
            </tr>
            <tbody>
                <?php foreach($products as $product): ?>
                 <tr>
                    <td><?= $product["nome"] ?></td>
                    <td><?= $product["descricao"] ?></td>
                    <td><?= $product["valor"] ?></td>
                    <td><a class='btn btn-primary' href='<?=url("showProduct?id=".$product["id"])?>'>Visualizar</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </thead>
    </table>
</div>