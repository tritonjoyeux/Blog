$(function () {
    $('form').submit(function () {
        var data = $(this).serialize();
        var erreur = $('#erreur');
        var bon = $('#bon');

        $.ajax({
            url: 'script/php/login.php',
            type: 'POST',
            data: data,
            error: function (resultat, statut, erreur) {
                alert('Erreur n° ' + statut + ' : ' + erreur); //ERREUR <299 ou >200
            },
            success: function (data) {
                data=JSON.parse(data);
                if (data.etat == 'connecte') {
                    erreur.text('');
                    bon.html('Connection reussie :<br> Redirection ...'
                        + '<meta http-equiv="refresh" content="0.5; URL=pages/accueil.php">');  //redirection sur la page accueil.php
                } else if (data.etat == 'erreur') {
                    erreur.text('Erreur lors de la connection');        //champs incorrect
                }
            }
        });
        return false;
    });
});
