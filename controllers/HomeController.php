<?php

class HomeController {
    public function index() {
        require_once 'views/home.php';
        require_once 'views/new_article.php';
    }
}