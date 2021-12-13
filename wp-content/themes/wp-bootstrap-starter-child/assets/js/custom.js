jQuery(document).ready(function($) {
    $('.video-icon').click(function() {
        if ($(this).siblings("video").get(0).paused) {
            $(this).siblings("video").get(0).play();
            $(this).parents(".video").addClass('play');
            $(this).children('img').attr("src", "/nhui/wp-content/uploads/2021/12/video-pause-icon.png");
        } else {
            $(this).siblings("video").get(0).pause();
            $(this).parents(".video").removeClass('play');
            $(this).children('img').attr("src", "/nhui/wp-content/uploads/2021/12/video-play-icon.png");
        }
    });


    jQuery('.search-video-slider').slick({
        dots: false,
        arrows: true,
        infinite: false,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
        ]
    });


    $('.dropdown-menu .dropdown-item').on('click', function() {
        var type = window.location.hash.substr(1);
        console.log(type);
    });

    $(function() {

        var $filter = $('.filter');
        var $tab = $('.filter a');
        var $offers = $('.all-images-content .image-card');





        $filter.on('click touch', '.all', function(e) {
            e.preventDefault();
            $tab.removeClass('current');
            $(this).addClass('current');

            $offers.hide();
            $offers.fadeIn(700);

        });


        $filter.on('click touch', '.Tigers', function(e) {
            e.preventDefault();
            $tab.removeClass('current');
            $(this).addClass('current');

            $offers.show();
            $offers.fadeOut(400);
            $offers.filter('.Tigers').fadeIn(400);

        });

        $filter.on('click touch', '.Lions', function(e) {
            e.preventDefault();
            $tab.removeClass('current');
            $(this).addClass('current');

            $offers.show();
            $offers.fadeOut(400);
            $offers.filter('.Lions').fadeIn(400);

        });

        $filter.on('click touch', '.Nature', function(e) {
            e.preventDefault();
            $tab.removeClass('current');
            $(this).addClass('current');

            $offers.show();
            $offers.fadeOut(400);
            $offers.filter('.Nature').fadeIn(400);
        });

        $filter.on('click touch', '.Birds', function(e) {
            e.preventDefault();
            $tab.removeClass('current');
            $(this).addClass('current');

            $offers.show();
            $offers.fadeOut(400);
            $offers.filter('.Birds').fadeIn(400);
        });


    });

    var cw = $('.all-images-content .image-card img').width();
    $('.all-images-content .image-card img').css({ 'height': cw + 'px' });





    var myVideoPlayer = document.getElementById('video1'),
        meta = document.getElementById('video1-time');


    myVideoPlayer.addEventListener('loadedmetadata', function() {
        var duration = myVideoPlayer.duration;
        var minutes = Math.floor(duration / 60);
        meta.innerHTML = minutes.toFixed(2) + " min."
    });

});