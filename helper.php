<?php


function generateUrl($controller, $action = 'index', $params = []) {
    if ($controller == 'home'){
        $controller = '';
    }
    if (isset($_GET['url'])) {
        $url = '../' . $controller;
    } else {
        $url = '' . $controller;
    }
    if ($action != 'index') {
        $url .= '/' . $action;
    }
    return $url;
}


function adaptPath(){
    if (isset($_GET['url'])){
        $url = explode('/', $_GET['url']);
            if (sizeof($url) == 2){
                return '../';
            } 
            if (sizeof($url) == 3){
                return '../../';
            }
    } else {
        return '';
    }
}

function adaptLink(){
    if (isset($_GET['url'])){
        $url = explode('/', $_GET['url']);
        if (sizeof($url) == 2){
            return '';
        } 
        if (sizeof($url) == 3){
            return '../';
        }
    } else {
        return '';
    }
}