<?php
include 'db_connect.php';

class ProfileModel {
    public function get_article_list($id){
        try {
            if (($conn = connection_init()) == NULL){
                return NULL;
            } else {
                $result = $conn->query("SELECT articles.Id, Titre, Login, articles.DateCreation FROM articles JOIN comptes ON articles.IdAuteur=comptes.Id WHERE comptes.Id = " . $id . " ORDER BY DateCreation DESC;");
                $row = $result->fetch_all(MYSQLI_ASSOC);
                $conn->close();
                return $row;
            }  
           } catch (mysqli_sql_exception $e) {
                return $e->getMessage();
            }
    }

    public function nb_of_articles($id){
        try {
            if (($conn = connection_init()) == NULL){
                return NULL;
            } else {
                $result = $conn->query("SELECT COUNT(*) FROM `comptes` JOIN `articles` ON `comptes`.`Id` = `articles`.`IdAuteur` WHERE `comptes`.`Id` =". $id .";");
                $row = $result->fetch_assoc();
                $conn->close();
                return $row;
            }  
           } catch (mysqli_sql_exception $e) {
                return $e->getMessage();
            } 
    }

    public function get_infos($id){
        try {
            if (($conn = connection_init()) == NULL){
                return NULL;
            } else {
                $result = $conn->query("SELECT Login, Résumé, DateCreation FROM `comptes` WHERE `comptes`.`Id` =". $id .";");
                $row = $result->fetch_assoc();
                $conn->close();
                return $row;
            }  
           } catch (mysqli_sql_exception $e) {
                return $e->getMessage();
            }
    }
}