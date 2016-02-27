$(function () {
    $(document).on('submit', '.login', function (e) {

        $.post("/user/login", $(this).serialize(), function (data) {
            if (typeof(data.error) != "undefined") {
                $('#erreur').html('Pseuso ou mot de passe manquant');
            } else {
                if (data.message != 'Erreur login') {
                    $('#bon').html('Connection reussie :<br> Redirection ...'
                        + '<meta http-equiv="refresh" content="0.5">');
                    $('#erreur').html('');

                } else {
                    $('#erreur').html('Erreur nom de compte ou mot de passe');
                }
            }
        }, 'json');

        return false;
    });

});