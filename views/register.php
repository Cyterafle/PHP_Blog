<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title id="acc_register">Création de compte</title>
        <link rel="stylesheet" href="../style/login_register.css"/>
    </head>
    <body>
        <div id="login_page">
            <h1 id="registering">Inscription</h1>
            <form method="post" action="create_account">
               <br><input type="text" id="login" name="login" placeholder="Nom d'utilisateur" required><br>
                <br><input type="password" id="pass" name="pass" placeholder="Mot de passe" required><br>
                <textarea id="biography" name="biography" placeholder="Présentez vous en quelques mots (facultatif) (max 100 caractères)" maxlength="100" width="fit-content"></textarea><br>
                <input type="submit" value="Créer mon compte" id="register_submit">
                <p id="account_exists">Vous avez déjà un compte ?</p><a id="login_btn" href="<?= generateUrl('account','login') ?>">Se connecter</a>
            </form> 
        </div>
    </body>
</html>