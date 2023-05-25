<?php

require "bootstrap.php";

try {
    $data = router();

    extract($data);

    if (!isset($data['view'])){
        throw new Exception("O indice view esta faltando");
    }

    if (!file_exists(VIEWS.$data['view'])){
        throw new Exception("Essa view {$data['view']} não existe");
    }

    $view = $data['view'];

    require  VIEWS.'template.php';

}catch (Exception $e){
    var_dump($e->getMessage());
}

?>