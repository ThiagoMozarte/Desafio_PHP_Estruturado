<?php 

require "header.php"; 

if(isset($_POST["nome"])){
  $data = filterForm();
  
  if($data){
    insertProduct($data);
  
  }
}




?>
    <div class="container-fluid">
      <h1>Cadastrar Produto</h1>
    <?= getMessage() ?>
      <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <label for="nome">Nome do Produto</label>
          <input class="form-control" id="nome" type="text" name="nome">
        </div>

      <div class="form-group">
        <label for="descricao">Descrição do Produto</label>
        <input class="form-control" id="descricao" type="text" name="descricao">
      </div>

      <div class="form-group">
        <label for="valor">Preço</label>
        <input class="form-control" id="valor" type="text" name="valor">
      </div>

      <div class="form-group">
        <label for="ImagemDoProduto">Foto</label>
        <input class="form-control" id="ImagemDoProduto" name="image" type="file">
      </div>

      <div class="form-group">
        <button class="btn btn-primary"type="submit">Enviar</button>
        <button class="btn btn-primary"type="reset">Limpar</button>
      </div>

      </form>
      </div>
  </body>
</html>
