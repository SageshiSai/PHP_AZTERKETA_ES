<?php 
include_once("../Model/database/query.php");
include_once("../View/Vista.php");
include_once("../Model/UsuarioModel.php");

session_start();
if(isset($_POST['Iniciar'])){
    $botones = 'Iniciar';
} else if(isset($_POST['Alta'])){
    $botones = 'Alta';
} else if(isset($_POST['Cambiar'])){
    $botones = 'Cambiar';
} else if(isset($_POST['Darse_de_alta'])){
    $botones = 'Darse_de_alta';
} else if(isset($_POST['Cambiar_pass'])){
    $botones = 'Cambiar_pass';
} else if(isset($_POST['Comprar'])) {
    $botones = 'Comprar';
} else if(isset($_POST['Productos'])) {
    $botones = 'Productos';
} else if(isset($_POST['Pedidos'])) {
    $botones = 'Pedidos';
} else if(isset($_POST['Crear_Producto'])) {
    $botones = 'Crear_Producto';
} else {
    echo "Error";
}

switch ($botones) {
    case 'Iniciar':
        comprobarUsuario();
        break;
    case 'Alta':
        $vista = new Vista();
        $vista->Alta();
        break;
    case 'Cambiar':
        $vista = new Vista();
        $vista->cambiarContra();
        break;
    case 'Darse_de_alta':
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $usuario = $_POST['usuario'];
        $contra = $_POST['contra'];
        $admin = 0;
        $query = new Query();
        $query->insertInjection('usuarios', $nombre, $apellido, $usuario, $contra, $admin);
        $vista = new Vista();
        $vista->Login();
        break;
    case 'Cambiar_pass':
        $contra = $_POST['contra'];
        $query = new Query();
        $query->updateInjection('usuarios', $contra, 'id', $_SESSION['id']);
        $vista = new Vista();
        $vista->Login();
        break;
    case 'Comprar':
        $id_usuario = $_SESSION['id'];
        $id_ropa = $_POST['productos'];
        $cantidad = $_POST['numeros'];
        $query = new Query();
        $query->insertInjection('compras', $id_usuario, $id_ropa, $cantidad);
        $vista = new Vista();
        $vista->area_usuario($query->select('ropa'));
        break;
    case 'Productos':
        $vista = new Vista();
        $vista->crearProducto();
        break;
    case 'Pedidos':
        $vista = new Vista();
        $vista->mostrarPedidos($query->select('compras'));
        break;
    case 'Crear_Producto':
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $query = new Query();
        $query->insertInjection('ropa', $nombre, $precio);
        $vista = new Vista();
        $vista->area_usuario_admin();
        break;
}