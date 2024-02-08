<?php
include_once("database/conect.php");
include_once("database/query.php");
include_once("PedidoModel.php");

$mysqli = new conect();
$mysqli->OpenConnect();


function comprobarUsuario( $usuario, $contra ){

    $resultado = select( 'usuarios', $usuario, 'nombre' );
    $contrabd = mysqli_result( $resultado, 0, "contra" );

    
    if(password_verify($contra, $contrabd)){
        
        $vista = new Vista();
        $productos = pasarProductos();
        $vista->area_usuario($productos);

    } else {
        $vista = new Vista();
        $vista->Login();
    }
    
}