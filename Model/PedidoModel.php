<?php
include_once("database/conect.php");
include_once("database/query.php");

$mysqli = new conect();
$mysqli->OpenConnect();


function pasarProductos(){
    $select = select('ropa', 0, 0);
    return $select;
}
