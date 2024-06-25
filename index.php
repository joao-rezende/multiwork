<?php
require_once "config.php";
require_once 'autoload.php';
require_once 'constants.php';
require_once 'vendor/autoload.php';
require_once 'helpers/app.php';

if (DEBUG) {
    ini_set('display_errors', 1);
    ini_set('display_startup_erros', 1);
    error_reporting(E_ALL);
}

// Obtenha a URI
$path = isset($_SERVER['PATH_INFO']) ? $_SERVER["PATH_INFO"] : "";
$uri = trim($path, '/');
$segments = explode('/', $uri);

// Defina o namespace base dos controladores
$namespace = 'Controllers\\';

// Defina a classe e o método a serem chamados
$class = !empty($segments[0]) ? ucfirst($segments[0]) : 'Orcamento';
$method = !empty($segments[1]) ? $segments[1] : 'index';

// Construa o nome completo da classe com o namespace
$full_class = $namespace . $class;

// Verifique se a classe existe
if (!class_exists($full_class)) erro_404("Classe não encontrada");

$controller = new $full_class();
// Verifique se o método existe na classe
if (!method_exists($controller, $method)) erro_404("Método não encontrada");

// Chame o método
call_user_func_array([$controller, $method], array_slice($segments, 2));