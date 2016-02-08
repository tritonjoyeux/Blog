$(function () {
    $('form').submit(function () {
        var data = $(this).serialize();
        var erreur = $('#erreur');
        var storage = JSON.parse(localStorage.getItem('user'));
        data+='&id='+storage.id;

        $.ajax({
            url: 'script/php/creationArticle.php',
            type: 'POST',
            data: data,
            error: function (resultat, statut, erreur) {
                alert('Erreur n° ' + statut + ' : ' + erreur); //ERREUR <299 ou >200
            },
            success: function (data) {
                data = JSON.parse(data);
                if (data.etat == 'reussi') {
                    erreur.text('');
                    $('#gestionArticle').val('New article');
                    $('.creationArticle').hide(300);
                    $('#allArticle').append('<h3>'+$('#title').val()+'</h3>' +
                        $('#content').val()+'<br><br>');
                    $('#title').val('');
                    $('#content').val('');
                } else if (data.etat == 'erreur') {
                    erreur.text('Erreur lors de la création.');     //erreur de la cr�ation de compte
                } else if (data.etat == 'erreurChamp') {
                    erreur.text('Champ incomplet.');                //champ manquant
                }
            }
        });
        return false;
    });
});
