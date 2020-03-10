jQuery(document).ready(function($){
    var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent);
    if(iOS){
        $(document.body).addClass('ios');
    };
    //input date
    if($('.input-date').length){
        var pkcont = 'body';
        if($('.picker-container').length){
            pkcont = '.picker-container';
        }
        $('.input-date').datepicker({
            todayHighlight: true,
            startDate: "0d",
            container: pkcont
        });
    }
    
    //Show/Hide scroll-top on Scroll
    // hide #back-top first
	$("#scroll-top").hide();
    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#scroll-top').fadeIn();
            } else {
                $('#scroll-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#scroll-top').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 1000);
        });
    });
    $('.navbar-toggle').on('click',function(e){
        $(this).toggleClass('open');
        $('body').toggleClass('menuin');
    });
    $('.nav-overlay').on('click',this,function(e){
        $('.navbar-toggle').trigger('click');
    });
     $('.dropdown').on('click', '.dropdown-toggle',function(e){
       
        var $this = $(this);
        var parent = $this.parent('.dropdown');
        var submenu = parent.find('.sub-menu-wrap');
        parent.toggleClass('open').siblings().removeClass('open');
        e.stopPropagation();
        
        submenu.click(function(e){
           e.stopPropagation();
        });
        
       
    });
    $('body,html').on('click', function(){
        
        if($('.dropdown').hasClass('open')){

            $('.dropdown').removeClass('open');
        }
    });
    $('.loginpopcall').on('click', function(e){
        e.preventDefault();
        $.magnificPopup.open({
             items: {
                src: '#popup-login', // can be a HTML string, jQuery object, or CSS selector
              },
            mainClass: 'mfp-fade',
            prependTo: 'body',
            callbacks: {
                open: function() {
                    var $popC = this.content;

                },
                close: function() {
                    var $popC = this.content;
                }
            }
        });
    });
    $('.activecourcepopcall').on('click', function(e){
        e.preventDefault();
        $.magnificPopup.open({
             items: {
                src: '#popup-activecource', // can be a HTML string, jQuery object, or CSS selector
              },
            mainClass: 'mfp-fade',
            prependTo: 'body',
            callbacks: {
                open: function() {
                    var $popC = this.content;

                },
                close: function() {
                    var $popC = this.content;
                }
            }
        });
    });
//    $.magnificPopup.open({
//                 items: {
//                    src: '#addfilePop', // can be a HTML string, jQuery object, or CSS selector
//                  },
//                mainClass: 'file-popup',
//                prependTo: '.files-wrap',
//                callbacks: {
//                    open: function() {
//                        var $popC = this.content;
//
//                    },
//                    close: function() {
//                        var $popC = this.content;
//                    }
//                }
//            });
    $('.collapse').on('click','.heading',function(){
        var container = $(this).parent('.collapse');
        $(container).siblings().removeClass('on').find('.cont').slideUp();
        $(container).find('.cont').is(':visible')  ?  
        $(container).removeClass('on').find('.cont').slideUp() :
        $(container).addClass('on').find(':hidden').slideDown() ;
        
    });
    
    stickyHeader();
//    $(window).scrollTop() > $("#header").height() ? $("#header").addClass("sticky") : $("#header").removeClass("sticky");
    $(window).scroll(function () {
//        $(window).scrollTop() > $("#header").height() ? $("#header").addClass("sticky") : $("#header").removeClass("sticky");
        stickyHeader();
    });
    function stickyHeader(){
        var hdOffsetTop =  $("#header").offset().top;
        if($(window).scrollTop() > $("#header").height()){
            $("#header").addClass("sticky");

        } else {
            $("#header").removeClass("sticky");
        }
    }
    
    if ($('#slider-top').length){
        $('#slider-top').slick({
            dots: false,
            arrows:false,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2000,
            prevArrow: '<span class="slick-prev slick-arrow"><i class="fa fa-angle-left"></i></span>',
            nextArrow: '<span class="slick-next slick-arrow"><i class="fa fa-angle-right"></i></span>',
            responsive: [
                    {
                      breakpoint: 480,
                      settings: {
                        arrows:false,
                      }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                  ]
        });
    }
    if ($('#slider-cource').length){
        $('#slider-cource').slick({
            dots: false,
            arrows: true,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2000,
            variableWidth: true,
            
            centerPadding: 0,
            prevArrow: '<span class="slick-prev slick-arrow"><i class="fa fa-angle-left"></i></span>',
            nextArrow: '<span class="slick-next slick-arrow"><i class="fa fa-angle-right"></i></span>',
            responsive: [
                    {
                      breakpoint: 991,
                      settings: {
                         centerMode: true,
                      }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                  ]
        });
    }
    


});


