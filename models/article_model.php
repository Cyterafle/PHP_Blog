<?php
include 'db_connect.php';

class ArticleModel {
    public function upload(){
       $titre = filter_var($_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS);
       $auteur = $_SESSION['Id'];
       $contenu = filter_var($_POST['article_content'], FILTER_SANITIZE_SPECIAL_CHARS); 
       try {
        if (($conn = connection_init()) == NULL){
            return false;
        } else {
            $result = $conn->query("INSERT INTO `articles`(`Titre`, `IdAuteur`,`Contenu`) VALUES (  '" . $titre ."'," . $auteur .",'" . $contenu ."');");
            $conn->close();
            return true;
        }  
       } catch (mysqli_sql_exception $e) {
            return $e->getMessage();
        }
    }

    public function get_last_article(){
        try {
            if (($conn = connection_init()) == NULL){
                return NULL;
            } else {
                $result = $conn->query("SELECT articles.Id, Titre, Login, articles.DateCreation FROM articles JOIN comptes ON articles.IdAuteur=comptes.Id ORDER BY `DateCreation` DESC LIMIT 1;");
                $row = $result->fetch_assoc();
                $conn->close();
                return $row;
            }  
           } catch (mysqli_sql_exception $e) {
                return $e->getMessage();
            }
    }

    public function get_article_content($id){
        try {
            if (($conn = connection_init()) == NULL){
                return NULL;
            } else {
                $result = $conn->query("SELECT articles.Id, Titre, Login, articles.DateCreation, Contenu FROM articles JOIN comptes ON articles.IdAuteur=comptes.Id WHERE articles.Id = ". $id .";");
                $row = $result->fetch_assoc();
                $conn->close();
                return $row; 
            }
        } catch (mysqli_sql_exception $e) {
            return $e->getMessage();
        }
    }

    public function get_article_list(){
        try {
            if (($conn = connection_init()) == NULL){
                return NULL;
            } else {
                $result = $conn->query("SELECT articles.Id, Titre, Login, articles.DateCreation FROM articles JOIN comptes ON articles.IdAuteur=comptes.Id ORDER BY `DateCreation` DESC;");
                $row = $result->fetch_all(MYSQLI_ASSOC);
                $conn->close();
                return $row;
            }  
           } catch (mysqli_sql_exception $e) {
                return $e->getMessage();
            }
    }

    public function best_authors(){
        try {
            if (($conn = connection_init()) == NULL){
                return NULL;
            } else {
                $result = $conn->query("SELECT COUNT(*) AS articles_nb, Login, comptes.Id FROM `comptes` JOIN `articles` ON `comptes`.`Id` = `articles`.`IdAuteur` ORDER BY articles_nb DESC LIMIT 3;");
                $row = $result->fetch_all(MYSQLI_ASSOC);
                $conn->close();
                return $row;
            }  
           } catch (mysqli_sql_exception $e) {
                return $e->getMessage();
            }
    }

    public function delete_article($id){
        try {
            if (($conn = connection_init()) == NULL){
                return false;
            } else {
                $result = $conn->query("DELETE FROM `articles` WHERE `Id` =".$id.";");
                $conn->close();
                return true;
            }  
           } catch (mysqli_sql_exception $e) {
                return false;
            }
    }
}