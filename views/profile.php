<!DOCTYPE html>
<head>
</head>
<body>
    <meta charset="utf-8">
    <?php require_once 'header.php'; ?>
    <title><?= $GLOBALS['user_infos']['Login'] ?></title>
    <script src="<?php echo adaptPath(); ?>js/profile.js"></script>
    <link rel="stylesheet" href="<?= adaptPath() ?>style/profile.css">
    <link rel="stylesheet" href="<?= adaptPath() ?>style/articles_list.css">
<body>
    
        <nav>
            <ul class="tabs">
                <a href="#infos" onclick="tab('infos')"><li class="tabs" id="infos_item">Informations</li></a>
                <a href="#article_list" onclick="tab('articles')"><li class="tabs" id="article_list_item">Articles créés</li></a>
            </ul>
        </nav>
        <div class="info_content" style="">
            <div id="infos">
                <div id="cred">
                    <h1><?= $GLOBALS['user_infos']['Login'] ?></h1>
                    <p><?php if (empty($GLOBALS['user_infos']['Résumé'])){
                            echo '<p id="empty">Pas de description</p>';
                    } else {
                            echo $GLOBALS['user_infos']['Résumé'];
                    } ?></p>
                    <p id="written_articles">Nombre d'articles rédigés : </p>
                    <h2><?= $GLOBALS['nb_of_articles']['COUNT(*)'] ?></h2>
                    <p id="since">Membre depuis : </p>
                    <?php 
                    $publish_date = explode(' ',$GLOBALS['user_infos']['DateCreation'])[0];
                    $date = new DateTime($publish_date);
                    $date = date_format($date, 'd/m/Y');
                    echo '<h2>'.$date.'</h2>';
                    ?>
                </div>
            </div>   
            <div id="article_list">
                <?php if (isset($GLOBALS['user_articles'])){
                    foreach ($GLOBALS['user_articles'] as $article){
                        $publish_date = explode(' ',$article['DateCreation'])[0];
                        $date = new DateTime($publish_date);
                        $date = date_format($date, 'd/m/Y');
                        echo '<a href="'.adaptLink() .generateUrl('article','view' . '/'. $article['Id'],).'"><div id="article_container">';
                        echo '<div id="author_date">';
                                echo '<h1>'. $article['Titre'] . '</h1>';
                                echo '<p>' . $date . '</p>';
                            echo '</div>';
                        echo '</div></a>';
                    }
                } else {
                    echo "<p id='nothing_to_show'>Pas d'articles disponibles</p>";
                } ?>
            </div>
        </div>
        <?php require_once 'new_article.php'; ?>
        <?php require_once 'footer.php'; ?>
</body>