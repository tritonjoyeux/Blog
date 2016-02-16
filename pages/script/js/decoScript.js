if(!localStorage.getItem('user')){
    document.location.href='../index.html';
}else {
    $(function () {
        $('#deco').click(function () {
            localStorage.removeItem('user');
            document.location.href = '../index.html';
        });
    });
}


