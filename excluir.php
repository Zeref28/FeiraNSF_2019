<?php
require 'banco.php';

if(isset($_GET['id']) && empty($_GET['id']) == false){

    $id = addslashes($_GET['id']);

    $c = new Banco();
    $c->deleteDados($id);

    header("Location: index.php");

} else{
    header("Location: index.php");
}