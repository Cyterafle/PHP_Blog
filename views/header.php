<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <?php require_once 'helper.php'; ?>
        <link rel="stylesheet" href="<?php echo adaptPath(); ?>style/header_footer_style.css">
        <link rel="stylesheet" href="<?php echo adaptPath(); ?>style/index.css">
        <script src="<?php echo adaptPath(); ?>js/navbar.js"></script>
    </head>
    <body>
        <nav id="header_nav">
            <ul>
                <li><h2><a href="<?= adaptLink() . '' . generateUrl('home') ?>">OmnéBlog</a></h2></li>
                <?php if (isset($_SESSION['Id'])){
                    echo '<li class="navbar_items" id="login_elt"><a href="'. adaptLink() .generateUrl('account','logout').'" id="logout_btn">Se déconnecter</a></li>';
                    echo '<li class="navbar_items"><a href="'. adaptLink() . '' . generateUrl('profile','me').'#infos" id="profile">Profil</a></li>';
                } else {
                    echo '<li class="navbar_items" id="login_elt"><a href="'. adaptLink() . '' .generateUrl('account','login').'" id="login_btn">Se connecter</a></li>';
                }?>
                <li class="navbar_items"><button onclick="switchLangage()" id="language_switch">Anglais</button></li>
                <li class="navbar_items"><a href="<?= adaptLink() . '' . generateUrl('article','list') ?>">Articles</a></li>
                <li class="navbar_items"><input type="image" id="dark_mode_toggle" onclick="toogleDarkMode()" src="<?php echo adaptPath(); ?>img/dark_mode_icon.png" style="height: 21px; width: 24px;"></li>
            </ul>
        </nav>
    </body>