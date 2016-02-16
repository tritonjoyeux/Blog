$(function () {

    $(document).on('submit', '.article-add', function (e) {

        $.post("/article/create", $(this).serialize(), function (data) {
            if (typeof(data.error) != "undefined") {
                alert(data.error);
            } else {

            }
        }, 'json');

        return false;
    });

    $(document).on('submit', '.deco', function (e) {

        $('.redirection').html('Deconnexion :<br> Redirection ...'
            + '<meta http-equiv="refresh" content="0.5">');

        $.post("/user/disconnect", $(this).serialize(), function (data) {}, 'json');

        return false;
    });

    $(document).on('submit', '.userEdit', function (e) {
        $.post("/user/edit", $(this).serialize(), function (data) {
            if(data.message == 'Edit profil'){
                $('.home').text('');
                $('.edit').html('<form class="editNow">' +
                    '<input type="text" name="pseudo" value="'+data.pseudo+'"> Pseudo <br>'+
                    '<input type="text" name="firstname" value="'+data.firstname+'"> Prenom <br>'+
                    '<input type="text" name="lastname" value="'+data.pseudo+'"> Nom de famille <br>'+
                    '<input type="text" name="passOld"> Ancien pass <br>'+
                    '<input type="text" name="passNew"> New pass');
            }
        }, 'json');
        return false;
    });
});