$(function () {
    $('form').submit(function () {
        var data = $(this).serialize();
        var erreur = $('#erreur');
        var bon = $('#bon');

        $.ajax({
            url: 'script/php/creation.php',
            type: 'POST',
            data: data,
            error: function (resultat, statut, erreur) {
                alert('Erreur n° ' + statut + ' : ' + erreur); //ERREUR <299 ou >200
            },
            success: function (data) {
                data = JSON.parse(data);
                if (data.etat == 'reussi') {
                    erreur.text('');
                    bon.html('Creation reussie :<br> Redirection ...'
                        + '<meta http-equiv="refresh" content="0.5; URL=index.html">'); //redirection a la page de connection
                } else if (data.etat == 'erreur') {
                    erreur.text('Erreur lors de la création.');     //erreur de la création de compte
                } else if (data.etat == 'dejaExistant') {
                    erreur.text('Pseudo deja pris.');               //erreur pseudo
                } else if (data.etat == 'erreurChamp') {
                    erreur.text('Champ incomplet.');                //champ manquant
                }
            }
        });
        return false;
    });
});
