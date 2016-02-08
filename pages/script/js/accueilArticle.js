$(function () {
    var hide = 0;
    $('.creationArticle').hide();
    $('#gestionArticle').click(function () {
        if (hide == 0) {
            $('#gestionArticle').val('Close article');
            $('.creationArticle').show(300);
            hide++;
        } else {
            $('#gestionArticle').val('New article');
            $('.creationArticle').hide(300);
            hide--;
        }
    });
    $('#hide').click(function () {
        hide--;
    });


});