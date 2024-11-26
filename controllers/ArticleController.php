<?php

require_once __DIR__ . '/../models/article_model.php';
require_once __DIR__ . '/../helper.php';

class ArticleController {
    public function new(){
        require_once 'views/add_article.php';
    }

    public function post_article(){
        $model = new ArticleModel();
        $result = $model->upload();
        require_once 'views/header.php';
        if ($result){ 
            echo "<p id=\"uploaded\">C'est en ligne !</p>";
            echo '<script language="javascript">window.location.href ="'.generateUrl('article','list').'"</script>';
        } else {
            echo "<p id=\"upload_fail\">Problème lors de la publication</p>";
        }
    }

    public function view($id){
        $model = new ArticleModel();
        $result = $model->get_article_content($id);
        if ($result != NULL){
            $GLOBALS['article'] = $result;
            require_once 'views/article.php';
        } else {
            require_once 'views/404.php';
            http_response_code(404);
            
        }
    }

    public function list(){
        $model = new ArticleModel();
        $result = $model->get_article_list();
        if ($result != NULL){
            $GLOBALS['article_list'] = $result;
            require_once 'views/articles_list.php';
        } else {
            require_once 'views/articles_list.php';
        }
    }

    public function delete($id){
        $model = new ArticleModel();
        $result = $model->delete_article($id);
        if ($result){
            echo '<script language="javascript">window.location.href ="'.adaptLink().generateUrl('article','list').'"</script>';
        } else {
            echo '<script language="javascript">window.location.href ="'.adaptLink().generateUrl('home').'"</script>';
            echo '<script>"alert(\'Erreur dans la suppression / Error while deleting\')"</script>';
        }
    }
}