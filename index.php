<?php
/**
 * Created by PhpStorm.
 * User: CesarJose39
 * Date: 26/11/2018
 * Time: 11:21
 */

//Nunca dejes que nadie te sorprenda, porque de un momento a otro puedes PUTO EL QUE LEA ESTO :)
//Aqui implementaré la api con control de sessiones y gestion de roles

//Establecer zona horaria
date_default_timezone_set('America/Lima');

//LLamada a archivo gestor de base de datos
require 'core/Database.php';
//Levantamiento del Log para registro de errores
require 'app/models/Log.php';
//Levantamiento de registro de roles y permisos para acceso a vistas
require 'app/models/Menui.php';
//Inicio clase para la encriptacion de contenido
require 'app/models/Crypt.php';

//Inicialización de clases
$errores = new Log();
$vistas = new Menui();

// Manejo de Errores Personalizado de PHP a Try/Catch
function exception_error_handler($severidad, $mensaje, $fichero, $linea) {
    $cadena =  '[LEVEL]: ' . $severidad . ' IN ' . $fichero . ': ' . $linea . '[MESSAGGE]' . $mensaje . "\n";
    $guardar = new Log();
    $guardar->insert($cadena, "Excepcion No Manejada");
    //echo $cadena;
}

//Para manejo de caracteres
header("Content-Type: text/html;charset=utf-8");
//Especificar el manejo de errores personalizados
set_error_handler("exception_error_handler");
//Inicio de Sesion
session_start();

//Variables Globales
require 'core/globals.php';

//Inicio de Código de Verificación de Permisos

//Captura de Datos para Obtener el Controlador y la Accion

//Por Aquí Pasan Todas Las Funciones Para La Lectura de Vistas
if(isset($_GET['c'])){
    //Aqui se recibe el controlador, si es que no está declarado
    $controlador = $_GET['c'];
} else {
    //Si No Hay Controlador Declarado, Se Hace Validación

    //Esta Parte Del Código Es Para Software Que Sólo Funcionan Con Usuarios Registrados
    if(isset($_SESSION['role']) || isset($_COOKIE['role'])){
        //Si Entra Aquí, Es Porque Hay Una Sesión Iniciada
        $controlador = "Admin";
    } else {
        $controlador = "Login";
    }

    //Esta Parte Del Código Es Para Software Que Tienes Varias Vistas Libres Para Varios Usuarios
    //$controlador = "Index";
}
$controlador = trim(ucfirst($controlador));
//Obtencion de Datos de Accion, Si No Hay Una Declarada, Se Pone "Index" Por Defecto
$accion = $_GET['a'] ?? "index";

//Verificar existencia de los archivos
$function_action = $controlador . "|" . $accion;
$archivo = 'app/controllers/' . $controlador . 'Controller.php';
if(file_exists($archivo)){
    //Acciones si el archivo existe
    //Verificar si existe inicio de sesion
    $autorizado = false;

    if(isset($_SESSION['role']) || isset($_COOKIE['role'])){
        $crypt = new Crypt();
        $role = $_COOKIE['role'] ?? $_SESSION['role'];
        $rol = $crypt->decrypt($role, _PASS_);
        $view = $controlador . '/' . $accion;
        $autorizado = $vistas->readViewrole($rol, $view);

    } else {
        $view = $controlador . '/' . $accion;
        $autorizado = $vistas->readViewrole(1, $view);
    }
    //$autorizado =  true;
    if($autorizado){
        try{
            require $archivo;
            $clase = sprintf('%sController', $_GET['c'] ?? $controlador);
            $accion = $_GET['a'] ?? "index";
            $clase = trim(ucfirst($clase));
            $accion = trim(strtolower($accion));
            $controller = new $clase;
            $controller->$accion();
        } catch (\Throwable $e){
            require 'app/controllers/ErrorController.php';
            $clase = sprintf('%sController', 'Error');
            $clase = trim(ucfirst($clase));
            $accion = 'error';
            $controller = new $clase;
            $controller->$accion();
            //echo $e->getMessage();
            //echo 'Solicitud erronea. Contacte con el administrador';
            $errores->insert($e->getMessage(), $function_action);
        }
    } else {
        if(isset($_SESSION['role']) || isset($_COOKIE['role'])){
            //LLEGA AQUI SI SE TRATA DE ACCEDER A ACCION O FUNCION SIN PERMISOS
            require 'app/controllers/ErrorController.php';
            $clase = sprintf('%sController', 'Error');
            $clase = trim(ucfirst($clase));
            $accion = 'error';
            $controller = new $clase;
            $controller->$accion();
            $errores->insert("SIN PERMISOS SUFICIENTES", $function_action);
            //echo 'Estoy llegando aqui :/';

        } else {
            //LLEGA AQUI SI SE TRATA DE ACCEDER A ACCION O FUNCION SIN PERMISOS
            require 'app/controllers/LoginController.php';
            $clase = sprintf('%sController', 'Login');
            $clase = trim(ucfirst($clase));
            $accion = 'index';
            $controller = new $clase;
            $controller->$accion();
            $errores->insert("SIN PERMISOS SUFICIENTES", $function_action);
            //echo 'Estoy llegando aqui :/';
        }

    }
} else {
    require 'app/controllers/ErrorController.php';
    $clase = sprintf('%sController', 'Error');
    $clase = trim(ucfirst($clase));
    $accion = 'error';
    $controller = new $clase;
    $controller->$accion();
    //Acciones si el archivo no existe
    //Automaticamente, notificar error
    $errores->insert("ACCESO A CONTROLADOR NO EXISTENTE", $function_action);
    //echo 2;
}