<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
       <title>Bienvenue</title> 
       <link rel="stylesheet" href="style/index.css">
       <link rel="stylesheet" href="style/home.css">
       <link rel="stylesheet" href="style/article.css">
       <?php require_once 'models/article_model.php'; ?>
    </head>
    <body>
        <?php require_once 'header.php'; ?>
        <div>
            <h1 id="what_is_omneblog">Qu'est-ce qu'OmnéBlog ?</h1>
            <p id="welcome_p">Bienvenue sur OmnéBlog, le blog où chacun peut publier sur ce qui l'intéresse et peut-être inspirer d'autres personnes à écrire des histoires, des poèmes, parler d'un sujet qui leur tient à coeur. Peut-être tenons-nous nos futurs romanciers ou journalistes, bon tour sur notre site !!</p>
            <div class="actions">
                <a href="<?= generateUrl('account','register') ?>" class="welcome_btn" id="register_btn">S'inscrire</a>
                <a href="<?= generateUrl('account','login') ?>" class="welcome_btn" id="login_btn">Se connecter</a>
                <a href="<?= generateUrl('article','list') ?>" class="welcome_btn" id="discover_articles">Découvrir les articles</a>
                
            </div>
        </div>
        <div>
            <h1 id="last_publish">Dernière publication</h1> 
            <?php
                $model = new ArticleModel();
                $result = $model->get_last_article();
                if (isset($result)){
                    $publish_date = explode(' ',$result['DateCreation'])[0];
                    $date = new DateTime($publish_date);
                    $date = date_format($date, 'd/m/Y');
                    echo '<a href="'.generateUrl('article','view' . '/'. $result['Id'],).'"><div id="article_elt">';
                    echo '<div id="author_date">';
                    echo '<h1>'.$result['Titre'].'</h1>';
                    echo '<p>'.$result['Login'].' - ' . $date .'</p>';
                    echo '</div></a>';
                } else {
                    echo '<h2 id="no_posts">Aucun post disponible</h2>';
                }
                ?>
        </div>
        </div>
        </div>
        <div class="best_authors">
            <h1 id="active_authors">Auteurs actifs</h1>
            <?php
                $model = new ArticleModel();
                $result = $model->best_authors();
                if (isset($result)){
                    foreach($result as $author){
                        echo '<a href="'.generateUrl('profile', 'user' .'/'. $author['Id']).'#infos"><div id="author">';
                        echo '<h1>'.$author['Login'].'</h1>';
                        echo '<h2>'.$author['articles_nb'].' article(s)</h2>';
                        echo '</div></a>';
                    }
                } else {
                    echo '<div id="no_authors">Personne n\'a encore posté</div>';
                }
            ?>
        </div>
        <?php require_once 'footer.php'; ?>
    </body>


