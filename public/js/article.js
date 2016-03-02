$(function () {
    $('.editAction').css({display:'none'});

    $('.editButton').click(function(){
        $('.editAction_'+this.id).css({display:'inline-block'});
        $('.editButton_'+this.id).css({display:'none'});
        var input = $("<input>", { val: $('.edit_title_'+this.id).text(),type: 'text' , name :'article_title' , class:'article_title_edit_'+this.id});
        $('.edit_title_'+this.id).replaceWith(input);
        var textarea = $("<textarea>", { val: $('.edit_content_'+this.id).text(),type: 'text' , name :'article_content' , class:'article_content_edit_'+this.id});
        $('.edit_content_'+this.id).replaceWith(textarea);

    });

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

    $(document).on('submit', '.article_edit', function (e) {

        $.post("/article/update", $(this).serialize(), function (data) {
            $('.editAction_'+data.article_id).css({display:'none'});
            $('.editButton_'+data.article_id).css({display:'inline-block'});
            var span = $("<span>", { class:'edit_title_'+data.article_id});
            $('.article_title_edit_'+data.article_id).replaceWith(span);
            span = $("<span>", { class:'edit_content_'+data.article_id});
            $('.article_content_edit_'+data.article_id).replaceWith(span);

            $('.edit_title_'+data.article_id).text(data.article_title);
            $('.edit_content_'+data.article_id).text(data.article_content);

        }, 'json');

        return false;
    });
});
