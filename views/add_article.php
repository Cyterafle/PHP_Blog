    <!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title id="new_article">Nouvel article</title>
        <link rel="stylesheet" href="<?php if (isset($_GET['url'])) echo '../'; ?>style/article.css">
    <body>
        <?php require_once 'header.php'; ?>
        <div id="container">
            <h1 id="article_creation">Création d'un article</h1>
            <form action="post_article" method="post">
                <label for="title" id="article_title">Titre :</label><br>
                <input type="text" id="title" name="title" value="" required><br>
                <label for="article_content" id="news_content">Contenu (minimum 50 caractères) :</label><br>
                <textarea id="article_content" name="article_content" placeholder="Commencez à écrire..." minlength="50" width="fit-content" required></textarea>
                <input type="submit" id="submit_btn" value="Publier l'article">
            </form>
        </div>
        <?php require_once 'footer.php'; ?>
    </body>