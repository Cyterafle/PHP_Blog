<?php

session_start();
// Récupération de l'URL
$url = isset($_GET['url']) ? explode('/', $_GET['url']) : ['home'];

// Détermination du contrôleur et de l'action
$controllerName = ucfirst($url[0]) . 'Controller';
$actionName = isset($url[1]) ? $url[1] : 'index';
$id = isset($url[2]) ? $url[2] : '';

// Inclusion du fichier du contrôleur
require_once 'controllers/' . $controllerName . '.php';

// Instanciation du contrôleur et appel de l'action
$controller = new $controllerName();
$controller->$actionName($id);