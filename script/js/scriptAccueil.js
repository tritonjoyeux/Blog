if (localStorage.getItem('user')) {
    document.location.href = 'pages/accueil.html';
} else {
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
                    data = JSON.parse(data);
                    if (data.etat == 'connecte') {
                        localStorage.setItem('user', JSON.stringify({user: data.user, droits: data.droits, id: data.id,firstname: data.firstname}));
                        erreur.text('');
                        bon.html('Connection reussie :<br> Redirection ...'
                            + '<meta http-equiv="refresh" content="0.5; URL=pages/accueil.html">');  //redirection sur la page accueil.html
                    } else if (data.etat == 'erreur') {
                        erreur.text('Erreur lors de la connection');        //champs incorrect
                    }
                }
            });
            return false;
        });
    });
}
