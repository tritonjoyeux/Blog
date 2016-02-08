$(function () {
    $.ajax({
        url: 'script/php/getAllUsers.php',
        type: 'GET',
        error: function (resultat, statut, erreur) {
            alert('Erreur n° ' + statut + ' : ' + erreur); //ERREUR <299 ou >200
        },
        success: function (data) {
            localStorage.setItem('userAll',data);
        }
    });
});