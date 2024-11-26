function tab(value){
    body = document.getElementsByTagName("body")
    if (value === 'infos'){
        document.getElementById('infos_item').style.backgroundColor="orange"
        if (localStorage.getItem('dark_mode') === 'true')
            document.getElementById('article_list_item').style.backgroundColor="#212121"
        else
            document.getElementById('article_list_item').style.backgroundColor="white" 
    } else {
        document.getElementById('article_list_item').style.backgroundColor="orange"
        if (localStorage.getItem('dark_mode') === 'true')
            document.getElementById('infos_item').style.backgroundColor="#212121"
        else
            document.getElementById('infos_item').style.backgroundColor="white"
    }
}