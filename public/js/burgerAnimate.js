$(function () {
    var opacity = 1;
    var rotateCroix1 = 0;
    var rotateCroix2 = 0;
    var marginTop = 0;
    var marginBot = 0;
    var marginBurgerTop = 9;
    var click = false;

    $('#hamburger').click(function () {
        if (click == false) {
            var interBurger = setInterval(function () {
                $('#burger2').css({opacity: opacity});
                opacity = opacity - 0.03;
                if (opacity < 0) {

                    var marginBurger = setInterval(function () {
                        $('#burger1').css({marginTop: marginTop});
                        $('#burger3').css({
                            marginBottom: marginBot,
                            marginTop: marginBurgerTop
                        });
                        marginBot = marginBot - 0.5;
                        marginTop = marginTop - 0.5;
                        marginBurgerTop = marginBurgerTop + 0.5;
                        if (marginBurgerTop > 25) {
                            var hrBurger = setInterval(function () {
                                $('#burger1').css({transform: 'rotate(' + rotateCroix1 + 'deg)'});
                                $('#burger3').css({transform: 'rotate(' + rotateCroix2 + 'deg)'});
                                rotateCroix1++;
                                rotateCroix2--;
                                if (rotateCroix1 == 46) {
                                    clearInterval(hrBurger);
                                }
                            }, 1);
                            clearInterval(marginBurger);
                        }
                    }, 1);
                    clearInterval(interBurger);
                }
            }, 1);
            $('#container').animate({marginLeft:'-40%',opacity:'0.4'},'800');
            $('header').animate({marginLeft:'-40%',opacity:'0.4'},'800');
            $('nav').animate({marginRight:'0px'},'800');
            click = true;
        } else {
            var interRotate = setInterval(function () {
                $('#burger1').css({transform: 'rotate(' + rotateCroix1 + 'deg)'});
                $('#burger3').css({transform: 'rotate(' + rotateCroix2 + 'deg)'});
                rotateCroix1--;
                rotateCroix2++;
                if (rotateCroix1 == -1) {
                    var interSepar = setInterval(function () {
                        $('#burger1').css({marginTop: marginTop});
                        $('#burger3').css({
                            marginBottom: marginBot,
                            marginTop: marginBurgerTop
                        });
                        marginBot = marginBot + 0.5;
                        marginTop = marginTop + 0.5;
                        marginBurgerTop = marginBurgerTop - 0.5;
                        if (marginBurgerTop < 9) {

                            var interFade = setInterval(function () {
                                $('#burger2').css({opacity: opacity});
                                opacity = opacity + 0.03;
                                if (opacity > 1) {
                                    clearInterval(interFade);
                                    $('#burger3').css({
                                        marginBottom: marginBot,
                                        marginTop: marginBurgerTop
                                    });
                                }
                            }, 1);
                            clearInterval(interSepar);
                        }
                    }, 1);
                    clearInterval(interRotate);
                }
            }, 1);
            $('#container').animate({marginLeft:'0px',opacity:'1'},'800');
            $('header').animate({marginLeft:'0px',opacity:'1'},'800');
            $('nav').animate({marginRight:'-40%'},'800');
            click = false;
        }
    });
});