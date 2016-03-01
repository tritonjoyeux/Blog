$(function () {

    $(document).on('submit', '.article_delete', function (e) {

        $.post("/article/delete", $(this).serialize(), function (data) {
            console.log('lol');
        }, 'json');

        return false;
    });

    $(document).on('submit', '.article-add', function (e) {

        $.post("/article/create", $(this).serialize(), function (data) {
            if (data.error == 'title or content missing') {
                $('#erreur-article').text(data.error);
            } else if (data.message == 'done') {
                $('li:last-child').append('<form class="article" id="' + data.article_id + '">' +
                    ' Titre : ' + data.article_title + '<br>' +
                    ' Contenu : ' + data.article_content +
                    '<a class="article_delete" href="" data-articleid="' + data.article_id + '">' +
                    ' <input type="button" value="Supprimer"> </a></form>');
            }
        }, 'json');

        return false;
    });

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
});