$(function () {
    $('.editAction').css({display: 'none'});


    function bindClick() {
        $('.editButton').click(function () {
            $('.editAction_' + this.id).css({display: 'inline-block'});
            $('.editButton_' + this.id).css({display: 'none'});
            var input = $("<input>", {
                val: $('.edit_title_' + this.id).text(),
                type: 'text',
                name: 'article_title',
                class: 'article_title_edit_' + this.id
            });
            $('.edit_title_' + this.id).replaceWith(input);
            var textarea = $("<textarea>", {
                val: $('.edit_content_' + this.id).text(),
                type: 'text',
                name: 'article_content',
                class: 'article_content_edit_' + this.id
            });
            $('.edit_content_' + this.id).replaceWith(textarea);

        });
    }
    bindClick();


    $(document).on('submit', '.article_delete', function (e) {

        $.post("/article/delete", $(this).serialize(), function (data) {
            $('#article-'+data.article_id).remove();
        }, 'json');

        return false;
    });

    $(document).on('submit', '.article-add', function (e) {

        $.post("/article/create", $(this).serialize(), function (data) {
            if (data.error == 'title or content missing') {
                $('#erreur-article').text(data.error);
            } else if (data.message == 'done') {
                $('ul').append('<li class="article" id="article-'+data.article_id+'">' +
                    '<form class="article_edit">' +
                    ' Titre : <span class="edit_title_' + data.article_id + '">' + data.article_title + '</span><br>' +
                    ' Contenu : <span class="edit_content_' + data.article_id + '">' + data.article_content + '</span><br>' +
                    ' Auteur : <span class="auteur">' +data.auteur+'</span><br>'+
                    '<input type="hidden" name="id_article" value="' + data.article_id + '">' +
                    '<input type="submit" class="editAction editAction_' + data.article_id + '" value="Edit" style="display: none;"></form>' +
                    '<input type="button" value="Edit" class="editButton editButton_' + data.article_id + '" id="' + data.article_id + '">' +
                    '<form class="article_delete">' +
                    '<input type="hidden" name="id_article" value="' + data.article_id + '">' +
                    '<input type="submit" value="Supprimer">' +
                    '</form></li>');
                $('#'+data.article_id).click(function(){
                    bindClick();
                });
            }
        }, 'json');

        return false;
    });

    $(document).on('submit', '.article_edit', function (e) {

        $.post("/article/update", $(this).serialize(), function (data) {
            $('.editAction_' + data.article_id).css({display: 'none'});
            $('.editButton_' + data.article_id).css({display: 'inline-block'});
            var span = $("<span>", {class: 'edit_title_' + data.article_id});
            $('.article_title_edit_' + data.article_id).replaceWith(span);
            span = $("<span>", {class: 'edit_content_' + data.article_id});
            $('.article_content_edit_' + data.article_id).replaceWith(span);

            $('.edit_title_' + data.article_id).text(data.article_title);
            $('.edit_content_' + data.article_id).text(data.article_content);

        }, 'json');

        return false;
    });
});
