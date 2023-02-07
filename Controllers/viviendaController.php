<?php
include '../Models/ViviendaModel.php';
class viviendaController
{

// Funcion de actualizar una vivienda 
    function updateVivienda()
    {

        if (isset($_POST['actualizar'])) {
            session_start();
            $id = $_POST['id'];
            echo 'Id: ' . $id;
            $vivienda = new ViviendaModel();

            $vivienda->__set('tipo', $_POST['tipo']);
            $vivienda->__set('zona', $_POST['zona']);
            $vivienda->__set('direccion', $_POST['direccion']);
            $vivienda->__set('ndormitorios', $_POST['ndormitorios']);
            $vivienda->__set('precio', $_POST['precio']);
            $vivienda->__set('tamano', $_POST['tamano']);
            $vivienda->__set('extras', $_POST['extras']);
            $vivienda->__set('observaciones', $_POST['observaciones']);
            $vivienda->__set('id', $id);
            $vivienda->actualizar();
            echo "Se ha actualizado el registro de vivienda ";
            // header("Location:../Views/updateVivienda.php?msg=se");
        }
    }

// Funcion de insertar una vivienda 
    function insertVivienda()
    {

        if (isset($_POST['insertar'])) {

            include '../Views/insertarVivienda.php';

            $vivienda = new ViviendaModel();
            $vivienda->__set('id', $_POST['id']);
            $vivienda->__set('tipo', $_POST['tipo']);
            $vivienda->__set('zona', $_POST['zona']);
            $vivienda->__set('direccion', $_POST['direccion']);
            $vivienda->__set('ndormitorios', $_POST['dormitorios']);
            $vivienda->__set('precio', $_POST['precio']);
            $vivienda->__set('tamano', $_POST['tamano']);
            $vivienda->__set('extras', $_POST['extras']);
            $vivienda->__set('foto', $_POST['file']);
            $vivienda->crearVivienda();
            echo "Se ha creado el registro de vivienda";

            // header("Location:../Views/updateVivienda.php?msg=se");
        }
    }

//Funcion de buscar una vivienda 
    function searchVivienda()
    {

        if(isset($_POST['buscar'])){
            require_once '../Views/buscarVivienda.php';
            echo 'entraaaaaa';
            $vivienda = new ViviendaModel();
            echo '<pre>';
            print_r($vivienda->obtenerPorFiltro($_POST['tipo'], $_POST['zona'], $_POST['dormitorios'], $_POST['precio'], $_POST['extras']));
            echo '</pre>';
        }
       
    }

//Funcion de borrar una vivienda 
    function deleteVivienda()
    {
        if (isset($_POST['borrar'])) {

            $vivienda = new ViviendaModel();
            $vivienda->borrar($_POST['id']);
            header("Location:../Views/ListadoVivienda.php");
        }
    }
}


$update = new viviendaController();
$update->updateVivienda();

$delete = new viviendaController();
$delete->deleteVivienda();

$insert = new viviendaController();
$insert->insertVivienda();

$search = new viviendaController();
$search->searchVivienda();