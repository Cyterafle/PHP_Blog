<?php

require_once __DIR__ . '/../models/profile_model.php';

class ProfileController {
    public function me() {
        $model = new ProfileModel();
        $GLOBALS['user_infos'] = $_SESSION;
        $GLOBALS['user_articles'] = $model->get_article_list($_SESSION['Id']);
        $GLOBALS['nb_of_articles'] = $model->nb_of_articles($_SESSION['Id']);
        require_once 'views/profile.php';
    }

    public function user($id) {
        $model = new ProfileModel();
        $result = $model->get_infos($id);
        if ($result != NULL){
            $GLOBALS['user_infos'] = $result;
            $GLOBALS['user_articles'] = $model->get_article_list($id);
            $GLOBALS['nb_of_articles'] = $model->nb_of_articles($id);
            require_once 'views/profile.php';
        }
    }
}