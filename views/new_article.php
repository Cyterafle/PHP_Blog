<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8">
        <?php require_once 'helper.php'; ?>
        <link rel="stylesheet" href="<?php echo adaptPath(); ?>style/article.css">
</head>
<body>
    <?php if (isset($_SESSION['Id'])){
        echo '<div id="add_btn_area">';
        echo '<a id="new_article_btn" href="'.adaptLink() .generateUrl('article','new').'">Créer un nouvel article</a>';
        echo '</div>';
    }
    ?>