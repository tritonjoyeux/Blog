$(function () {
    $('form').submit(function () {
        var data = $(this).serialize();
        var erreur = $('#erreur');

        $.ajax({
            url: 'script/login.php',
            type: 'POST',
            data: data,
            error: function (resultat, statut, erreur) {
                alert('Erreur n° ' + statut + ' : ' + erreur);
            },
            success: function (data) {
                data = eval('(' + data + ')');
                console.log(data.etat);
                if (data.etat == 'connecte') {
                    erreur.html('Connection reussie : Redirection ...'
                    +'<meta http-equiv="refresh" content="0.5; URL=pages/accueil.php">');
                } else if (data.etat == 'erreur') {
                    erreur.text('Erreur lors de la connection');
                }
            }
        })
        return false;
    });
});
