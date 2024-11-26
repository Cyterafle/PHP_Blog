<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title id="article_list_page">Liste des articles</title>
        <link rel="stylesheet" href="../style/articles_list.css">
    </head>
    <body>
        <?php require_once 'header.php'; ?>
        <?php if (isset($GLOBALS['article_list'])){
                foreach ($GLOBALS['article_list'] as $article){
                    $publish_date = explode(' ',$article['DateCreation'])[0];
                    $date = new DateTime($publish_date);
                    $date = date_format($date, 'd/m/Y');
                    echo '<a href="'.generateUrl('article','view' . '/'. $article['Id'],).'"><div id="article_container">';
                    echo '<div id="author_date">';
                            echo '<h1>'. $article['Titre'] . '</h1>';
                            echo '<p>' . $article['Login'] . ' - ' . $date . '</p>';
                        echo '</div>';
                    echo '</div></a>';
                }
            } else {
                echo "<p id='nothing_to_show'>Pas d'articles disponibles</p>";
            } ?>
        <?php require_once 'new_article.php'; ?>
        <?php require_once 'footer.php'; ?>
    </body>
</html>