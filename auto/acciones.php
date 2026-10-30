<?php
require_once '../modelo/auto.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Accion = $_POST['accion'] ?? '';
    $Marca = $_POST['marca'] ?? '';
    $Modelo = $_POST['modelo'] ?? '';
    $Rodado = $_POST['rodado'] ?? '';
    $CantidadCambios = $_POST['cantidadCambios'] ?? '';
    $Color = $_POST['color'] ?? '';
    $Precio = $_POST['precio'] ?? '';
    
    
    $Id = $_POST['id'] ?? '';

    if ($Accion === 'agregar') {
        Auto::agregar($Marca, $Modelo, $Rodado, $CantidadCambios, $Color, $Precio);
        header('Location: vistas/listar.php');
        exit;
    }

    if ($Accion === 'editar') {
        Auto::editar($Id, $Marca, $Modelo, $Rodado, $CantidadCambios, $Color, $Precio);
        header('Location: vistas/listar.php');
        exit;
    }

    if ($Accion === 'eliminar') {
        Auto::eliminar($Id);
        header('Location: vistas/listar.php');
        exit;
    }
}
?>
