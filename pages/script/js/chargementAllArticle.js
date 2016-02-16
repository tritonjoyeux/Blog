$(function () {
    $.ajax({
        url: 'script/php/allArticles.php',
        type: 'GET',
        error: function (resultat, statut, erreur) {
            alert('Erreur n° ' + statut + ' : ' + erreur); //ERREUR <299 ou >200
        },
        success: function (data) {
            data=JSON.parse(data);
            var personne="";
            var allUser=localStorage.getItem('userAll');
            allUser=JSON.parse(allUser);

            for (var cle in data) {
                for (var incre in allUser){
                    if(allUser[incre].id_user == data[cle].id_user){
                        personne = data[cle].nickname;
                    }
                }
                $('#allArticle').append('<h3><u>Titre :</u> '+data[cle].title+'</h3>' +
                    data[cle].contenu+'<br>Par : '+personne+'<br>');
            }
        }
    });
});