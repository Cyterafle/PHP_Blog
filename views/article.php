<!DOCTYPE html>
<html>
    <head>
        <?php require_once 'helper.php'; ?>
        <meta charset="utf-8">
        <title><?php echo $GLOBALS['article']['Titre'] ?></title>
        <link rel="stylesheet" href="<?php echo adaptPath(); ?>style/article.css">
        
    </head>
    <body>
        <?php require_once 'header.php'; ?>
        <div id="back_btn_div">
            <a id="back_btn" href="<?= adaptLink() . generateUrl('article','list')?>">< Retour à la liste d'articles</a>
        </div>
        <div id="article_item">
            <?php $publish_date = explode(' ',$GLOBALS['article']['DateCreation'])[0];
                    $date = new DateTime($publish_date);
                    $date = date_format($date, 'd/m/Y'); ?>
                <h1><?= $GLOBALS['article']['Titre'] ?></h1>
                <p><?= $GLOBALS['article']['Login'] ?> - <?= $date ?></p>
                <article id="content">
                    <?= $GLOBALS['article']['Contenu']; ?>
                </article>    
        </div>
        <?php if (isset($_SESSION['Id']) && ($_SESSION['Login'] == $GLOBALS['article']['Login'])){
            echo '<div id="delete_btn_area">';
            echo '<a href="'.adaptLink() . generateUrl('article','delete'.'/'.$GLOBALS['article']['Id']).'" id="del_article">Supprimer l\'article</a>';
            echo '</div>';
        } ?>
        <?php require_once 'footer.php'; ?>
    </body>
</html>