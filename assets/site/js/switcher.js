/*==============================
	Style Switcher Script Installation
 ===============================*/
 
(function($) {
	"use strict";

    $('.boxed,.pattren-wrap a').on('click', function(){
        $('.main-wrapper').addClass('wrapper-boxed');
        $('.main-wrapper').removeClass('wrapper-wide');
        $(window).resize(); 
    });
    $('.wide').on('click', function(){
        $('.main-wrapper').addClass('wrapper-wide');
        $('.main-wrapper').removeClass('wrapper-boxed');
        $(window).resize();
    });

    //Background Switcher
    $('.bg-list li a').on('click', function() {
          var bg = $(this).css("backgroundImage");
          $("body").css("backgroundImage",bg);
          $(window).resize();
    });

	$(".style1" ).on("click", function(){
		$("#colors" ).attr("href", "css/styles.css" );
		$("#logo" ).attr("src", "img/logos/logo-color-01.png" );
		$(".header-style6 #logo" ).attr("src", "img/logos/logo-white.png" );
        $(window).on('scroll', function() {
            var scroll = $(window).scrollTop();
            var logostyle1 = $(".navbar-brand img");
            if (scroll <= 50) {
                logostyle1.attr('src', 'img/logos/logo-color-01.png');
                $(".header-style6 #logo" ).attr("src", "img/logos/logo-white.png" );
            } 
            else {
                logostyle1.attr('src', 'img/logos/logo-color-01.png');
                $(".header-style6 #logo" ).attr("src", "img/logos/logo-white.png" );
            }
        });
		return false;
	});

	$(".style2" ).on("click", function(){
		$("#colors" ).attr("href", "css/styles-2.css" );
		$("#logo" ).attr("src", "img/logos/logo-color-02.png" );
		$(".header-style6 #logo" ).attr("src", "img/logos/logo-white.png" );
        $(window).on('scroll', function() {
            var scroll = $(window).scrollTop();
            var logostyle1 = $(".navbar-brand img");
            if (scroll <= 50) {
                logostyle1.attr('src', 'img/logos/logo-color-02.png');
                $(".header-style6 #logo" ).attr("src", "img/logos/logo-white.png" );
            } 
            else {
                logostyle1.attr('src', 'img/logos/logo-color-02.png');
                $(".header-style6 #logo" ).attr("src", "img/logos/logo-white.png" );
            }
        });
		return false;
	});

	$(".style3" ).on("click", function(){
		$("#colors" ).attr("href", "css/styles-3.css" );
		$("#logo" ).attr("src", "img/logos/logo-color-03.png" );
		$(".header-style6 #logo" ).attr("src", "img/logos/logo-white.png" );
        $(window).on('scroll', function() {
            var scroll = $(window).scrollTop();
            var logostyle1 = $(".navbar-brand img");
            if (scroll <= 50) {
                logostyle1.attr('src', 'img/logos/logo-color-03.png');
                $(".header-style6 #logo" ).attr("src", "img/logos/logo-white.png" );
            } 
            else {
                logostyle1.attr('src', 'img/logos/logo-color-03.png');
                $(".header-style6 #logo" ).attr("src", "img/logos/logo-white.png" );
            }
        });
		return false;
	});

	$(".style4" ).on("click", function(){
		$("#colors" ).attr("href", "css/styles-4.css" );
		$("#logo" ).attr("src", "img/logos/logo-color-04.png" );
		$(".header-style6 #logo" ).attr("src", "img/logos/logo-white.png" );
        $(window).on('scroll', function() {
            var scroll = $(window).scrollTop();
            var logostyle1 = $(".navbar-brand img");
            if (scroll <= 50) {
                logostyle1.attr('src', 'img/logos/logo-color-04.png');
                $(".header-style6 #logo" ).attr("src", "img/logos/logo-white.png" );
            } 
            else {
                logostyle1.attr('src', 'img/logos/logo-color-04.png');
                $(".header-style6 #logo" ).attr("src", "img/logos/logo-white.png" );
            }
        });
		return false;
	});

	$(".style5" ).on("click", function(){
		$("#colors" ).attr("href", "css/styles-5.css" );
		$("#logo" ).attr("src", "img/logos/logo-color-05.png" );
		$(".header-style6 #logo" ).attr("src", "img/logos/logo-white.png" );
        $(window).on('scroll', function() {
            var scroll = $(window).scrollTop();
            var logostyle1 = $(".navbar-brand img");
            if (scroll <= 50) {
                logostyle1.attr('src', 'img/logos/logo-color-05.png');
                $(".header-style6 #logo" ).attr("src", "img/logos/logo-white.png" );
            } 
            else {
                logostyle1.attr('src', 'img/logos/logo-color-05.png');
                $(".header-style6 #logo" ).attr("src", "img/logos/logo-white.png" );
            }
        });
		return false;
	});

	$(".style6" ).on("click", function(){
		$("#colors" ).attr("href", "css/styles-6.css" );
		$("#logo" ).attr("src", "img/logos/logo-color-06.png" );
		$(".header-style6 #logo" ).attr("src", "img/logos/logo-white.png" );
        $(window).on('scroll', function() {
            var scroll = $(window).scrollTop();
            var logostyle1 = $(".navbar-brand img");
            if (scroll <= 50) {
                logostyle1.attr('src', 'img/logos/logo-color-06.png');
                $(".header-style6 #logo" ).attr("src", "img/logos/logo-white.png" );
            } 
            else {
                logostyle1.attr('src', 'img/logos/logo-color-06.png');
                $(".header-style6 #logo" ).attr("src", "img/logos/logo-white.png" );
            }
        });
		return false;
	});		

	$(".style7" ).on("click", function(){
		$("#colors" ).attr("href", "css/styles-7.css" );
		$("#logo" ).attr("src", "img/logos/logo-color-07.png" );
		$(".header-style6 #logo" ).attr("src", "img/logos/logo-white.png" );
        $(window).on('scroll', function() {
            var scroll = $(window).scrollTop();
            var logostyle1 = $(".navbar-brand img");
            if (scroll <= 50) {
                logostyle1.attr('src', 'img/logos/logo-color-07.png');
                $(".header-style6 #logo" ).attr("src", "img/logos/logo-white.png" );
            } 
            else {
                logostyle1.attr('src', 'img/logos/logo-color-07.png');
                $(".header-style6 #logo" ).attr("src", "img/logos/logo-white.png" );
            }
        });
		return false;
	});		

	$(".style8" ).on("click", function(){
		$("#colors" ).attr("href", "css/styles-8.css" );
		$("#logo" ).attr("src", "img/logos/logo-color-08.png" );
		$(".header-style6 #logo" ).attr("src", "img/logos/logo-white.png" );
        $(window).on('scroll', function() {
            var scroll = $(window).scrollTop();
            var logostyle1 = $(".navbar-brand img");
            if (scroll <= 50) {
                logostyle1.attr('src', 'img/logos/logo-color-08.png');
                $(".header-style6 #logo" ).attr("src", "img/logos/logo-white.png" );
            } 
            else {
                logostyle1.attr('src', 'img/logos/logo-color-08.png');
                $(".header-style6 #logo" ).attr("src", "img/logos/logo-white.png" );
            }
        });
		return false;
	});			

})(jQuery);

