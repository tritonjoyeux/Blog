$(function () {

    $(document).on('submit', '.deco', function (e) {

        $('.redirection').html('Deconnexion :<br> Redirection ...'
            + '<meta http-equiv="refresh" content="0.5">');

        $.post("/user/disconnect", $(this).serialize(), function (data) {
        }, 'json');

        return false;
    });

    $(document).on('submit', '.userEdit', function (e) {
        $.post("/user/show", $(this).serialize(), function (data) {
            if (data.message == 'Edit profil') {
                $('.edit').show();
                $('#pseudo').val(data.pseudo);
                $('#firstname').val(data.firstname);
                $('#lastname').val(data.lastname);

            }
        }, 'json');
        return false;
    });

    $(document).on('submit', '.editNow', function (e) {
        $.post("/user/edit", $(this).serialize(), function (data) {
            if (data.message == 'Champ modifies') {
                $('.edit').hide();
            }
        }, 'json');
        return false;
    });

    $(document).on('submit', '.delete', function (e) {

        $('.redirection').html('Suppression du compte .Deconnexion :<br> Redirection ...<meta http-equiv="refresh" content="0.5">');

        $.post("/user/delete", $(this).serialize(), function (data) {
        }, 'json');
        return false;
    });

    $('#ajouterArticle').click(function(){
       $('.addArticleContainer').fadeIn(500);
    });

});