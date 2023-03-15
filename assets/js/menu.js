var num = 50; //number of pixels before modifying styles

        $(window).bind('scroll', function () {
            if ($(window).scrollTop() > num) {
                $('.menu').addClass('fixed-top');
                $('.menu').addClass('borda-menu');
                $('.navbar-brand').removeClass('visually-hidden');
                var largura = window.innerWidth;
                if (largura < 768) {
                    $('.barra-topo').addClass('fixed-top');
                }
if (largura > 768) {
                    $('.barra-topo').removeClass('fixed-top');
                }

            } else {
                $('.menu').removeClass('fixed-top');
                $('.navbar-brand').addClass('visually-hidden');
                $('.menu').removeClass('borda-menu');
                var largura = window.innerWidth;
                if (largura < 768) {
                    $('.barra-topo').removeClass('fixed-top');
                }
                if (largura > 768) {
                    $('.barra-topo').removeClass('fixed-top');
                }
            }
        });