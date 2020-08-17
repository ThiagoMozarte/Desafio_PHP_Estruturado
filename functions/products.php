<?php



function filterForm(){
    $data = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRIPPED);

    if(empty($data["nome"])){
        setMessage("danger", "O campo nome tem que está preenchido");
        return false;
    }

        if(!is_numeric($data["valor"])){
            setMessage("danger", "informe um valor numérico");
            return false;

        }
    return $data;
}


function insertProduct($product){

    $upload = imageUpload();
    if(!$upload){
        setMessage("danger", "Para cadastrar um novo produto, é necessário carregar uma imagem!");
        return false;
    }
    $file = file_get_contents(JSON_PRODUCTS_URL);
    $tmpArray = jsonToArray($file);
    $id = getLastInsertId() +1;
    incrementId();
    $newProduct = array("id"=>$id)+ $product + array("image_url" => $upload);
    array_push($tmpArray,$newProduct);
    $json = json_encode($tmpArray);
    if (file_put_contents(__DIR__."/../produtos.json",$json)){
        setMessage("success", "Produto cadastrado com sucesso!");
    }else {
        setMessage("danger", "Falha ao cadastrar o produto.");
    }

}

function getProductById($id){
    $products = getProducts();
    foreach ($products as $product){
        if($product['id'] === $id){
            return $product;
        }
    }

}

function getProducts(){
    $json = file_get_contents(JSON_PRODUCTS_URL);

    return jsonToArray($json);
}

function imageUpload(){
if(!empty($_FILES["image"]["name"])){
    $tmpfile = $_FILES["image"]["tmp_name"];
    $newName = md5(time()).$_FILES["image"]["name"];
    $dir = __DIR__."/../media/$newName";
    if(move_uploaded_file($tmpfile, $dir)){
        return $newName;
    }
}
    return false;
}

