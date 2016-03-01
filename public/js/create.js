$(function () {
    $(document).on('submit', '.formCreationAccount', function (e) {

        $.post("/user/create", $(this).serialize(), function (data) {
            if (data.error == 'champs') {
                $('#erreurDejaPris').text('');
                if (data.pseudo) {
                    $('#errorPseudo').text(data.pseudo)
                } else {
                    $('#errorPseudo').text('');
                }

                if (data.firstname) {
                    $('#errorFirstname').text(data.firstname)
                } else {
                    $('#errorFirstname').text('');
                }

                if (data.lastname) {
                    $('#errorLastname').text(data.lastname)
                } else {
                    $('#errorLastname').text('');
                }

                if (data.password) {
                    $('#errorPassword').text(data.password)
                } else {
                    $('#errorPassword').text('');
                }
            } else if (data.error == 'pris') {
                $('#errorPseudo').text('');
                $('#errorFirstname').text('');
                $('#errorLastname').text('');
                $('#errorPassword').text('');
                $('#erreurDejaPris').text('Pseudo deja existant');
            } else if (data.success == 'created') {
                $('#errorPseudo').text('');
                $('#errorFirstname').text('');
                $('#errorLastname').text('');
                $('#errorPassword').text('');
                $('#erreurDejaPris').text('');
                $('#bon').html('Création reussie :<br> Redirection ...<meta http-equiv="refresh" content="0.5">');
            }
        }, 'json');

        return false;
    });

});
