<head>
    <meta charset="utf-8">
    <title id="login_page_title">Page de connexion</title>
    <link rel="stylesheet" href="../style/login_register.css"/>
    </head>
    <body>
        <div id="login_page">
            <h1 id="connect_title">Connexion</h1>
            <form method="post" action="access_account">
               <br><input type="text" id="login" name="login" placeholder="Nom d'utilisateur" required><br>
                <br><input type="password" id="pass" name="pass" placeholder="Mot de passe" required><br>
                <input type="submit" value="Se connecter" id="login_submit">
                <p id="no_account">Vous n'avez pas de compte ? </p><a id="register" href="<?= generateUrl('account','register') ?>">Créer un compte</a>
            </form> 
        </div>
    </body>