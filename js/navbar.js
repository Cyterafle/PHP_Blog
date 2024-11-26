
window.onload = function() {
    if (localStorage.getItem("dark_mode") === 'true'){
        document.getElementById('dark_mode_toggle').setAttribute("src", basePath + "/img/light_mode_icon.png")
        document.body.classList.toggle("dark_mode")
    }
    display_lang = localStorage.getItem("site_lang")
    language_switch(display_lang)
}

let lang = {
    fr: {
        language_switch: 'Anglais',
        new_article: 'Nouvel article',
        article_list_page: 'Liste des articles',
        login_page_title: 'Page de connexion',
        login_btn: 'Se connecter',
        logout_btn: 'Se déconnecter',
        profile: 'Profil',
        error_msg: 'Cette page n\'existe pas',
        article_title: 'Titre :',
        article_creation: 'Création d\'un article',
        news_content: 'Contenu (minimum 50 caractères) :',
        submit_btn: 'Publier l\'article',
        back_btn: '< Retour à la liste des articles',
        del_article: 'Supprimer l\'article',
        nothing_to_show: 'Pas d\'article à afficher',
        what_is_omneblog: 'Qu\'est-ce qu\'OmnéBlog ?',
        welcome_p: 'Bienvenue sur OmnéBlog, le blog où chacun peut publier sur ce qui l\'intéresse et peut-être inspirer d\'autres personnes à écrire des histoires, des poèmes, parler d\'un sujet qui leur tient à coeur. Peut-être tenons-nous nos futurs romanciers ou journalistes, bon tour sur notre site !!',
        register_btn: 'S\'inscrire',
        login: 'Nom d\'utilisateur',
        discover_articles: 'Découvrir les articles',
        last_publish: 'Dernière publication',
        no_posts: 'Aucun post disponible',
        active_authors: 'Acteurs actifs',
        no_authors: 'Perosnne n\'a encore posté',
        no_account: 'Vous n\'avez pas de compte ?',
        new_article_btn: 'Créer un nouvel article',
        infos_item: 'Informations',
        connect_title: 'Connexion',
        login_submit: 'Se connecter',
        empty: 'Pas de description',
        written_articles: 'Nombres d\'articles rédigés :',
        acc_register: 'Création de compte',
        pass: 'Mot de passe',
        biography: 'Présentez vous en quelques mots (facultatif) (max 100 caractères)',
        register_submit: 'Créer mon compte',
        register: 'Créer un compte',
        account_exists: 'Vous avez déjà un compte ?',
        registering: 'Inscription',
        since: 'Membre depuis :',
        article_list_item: 'Articles créés',
        article_content: 'Commencez à écrire...'
    },
    en: {
        language_switch: 'French',
        new_article: 'New article',
        article_list_page: 'Articles list',
        login_page_title: 'Login page',
        login_btn: 'Log In',
        logout_btn: 'Log Out',
        profile: 'Profile',
        error_msg: 'This page does not exist',
        article_title: 'Title :',
        article_creation: 'Creation of an article',
        news_content: 'Content (at least 50 characters) :',
        submit_btn: 'Publish article',
        back_btn: '< Back to articles list',
        del_article: 'Delete this article',
        nothing_to_show: 'Nothing to show !',
        what_is_omneblog: 'What\'s OmnéBlog ?',
        welcome_p: 'Welcome to OmnéBlog, the blog where anyone can post about anything that interests them, and perhaps inspire others to write stories, poems, or talk about a subject close to their hearts. Maybe we\'re looking at our future novelists or journalists, enjoy our website !!',
        register_btn: 'Register',
        login: 'Username',
        discover_articles: 'Discover articles',
        last_publish: 'Last publish',
        no_posts: 'No posts available',
        active_authors: 'Active authors',
        no_authors: 'No active authors yet',
        no_account: 'Don\'t have an account ?',
        new_article_btn: 'Create a new article',
        infos_item: 'Details',
        connect_title: 'Connect',
        login_submit: 'Log In',
        empty: 'No description',
        written_articles: 'Number of written articles :',
        acc_register: 'Register',
        pass: 'Password',
        biography: 'Introduce yourself with few words (not required) (not more than 100 characters)',
        register_submit: 'Create my account',
        register: 'Create an account',
        account_exists: 'Already an account ?',
        registering: 'Register',
        since: 'Member since :',
        article_list_item: 'Articles done',
        article_content: 'Start writting...'
    }

}

// Calculer la racine du site dynamiquement
var path =  window.location.pathname.split('/');
var max = 2
if (path[1].includes('~')){
    max = 3
}
var basePath = path.slice(0, max).join('/') + '/';

const storedDarkMode = localStorage.getItem('dark_mode');
if (storedDarkMode !== null) {
  dark_mode = storedDarkMode === 'true';
}



function toogleDarkMode(){
    dark_mode = !dark_mode;
    localStorage.setItem('dark_mode', dark_mode);
    document.body.classList.toggle("dark_mode")
    if (dark_mode){
        document.getElementById('dark_mode_toggle').setAttribute("src", basePath + "/img/light_mode_icon.png")
    } else {
        document.getElementById('dark_mode_toggle').setAttribute("src", basePath + "/img/dark_mode_icon.png")
    }
}

function switchLangage(){
    if (localStorage.getItem("site_lang") !== 'fr' && localStorage.getItem("site_lang") !== 'en'){
        page_lang = 'fr'
    } else {
        page_lang = localStorage.getItem("site_lang")
    }
    if (page_lang === 'fr') {
        page_lang = 'en'
    } else {
        page_lang = 'fr'
    }
    language_switch(page_lang)
    localStorage.setItem("site_lang", page_lang)
}

function language_switch(page_lang){
    const item = lang[page_lang];
    for (const prop in item) {
        if ((element = document.getElementById(prop)))
            if (element.textContent.length > 0)
                element.textContent = item[prop]
            else if (element.value.length > 0)
                element.value = item[prop]
            else
                element.placeholder = item[prop]
    }
}
