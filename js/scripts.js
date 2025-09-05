$(document).ready(function(){
	
	/* Wow animated */
	new WOW().init();
	
	/* Smooth scroll to anchor */
	$("a[href*=#]").click(function(event){     
		event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
	});
	
});

/* Скрипт для плавной прокрутки к якорю
$("a[href*=#]").bind("click", function(e){
	var anchor = $(this);
	var name = anchor.attr("href").replace(new RegExp("#", "gi"), "");
	$('html, body').stop().animate({
		scrollTop: $("a[name=" + name + "]").offset().top
	}, 1000); /* Скорость прокрутки
	e.preventDefault();
	return false;
});
 */
  
// Убираем модальное окно об успешной отправки данных
$("#background-msg").click(function(){
	$("#background-msg, #message").fadeOut();
});

// Подгрузка дополнительного контента на страницу, кнопка "Показать/загрузить еще"
var lazyload = lazyload || {};

(function($, lazyload) {

    "use strict";

    var page = 2,
        buttonId = "#button-more",
        loadingId = "#loading-div",
        container = "#data-container";

    lazyload.load = function() {

        var url = "./" + page + ".php";

        $(buttonId).hide();
        $(loadingId).show();

        $.ajax({
            url: url,
            success: function(response) {
                if (!response || response.trim() == "NONE") {
                    $(buttonId).fadeOut();
                    $(loadingId).text("Больше нет данных.");
                    return;
                }
                appendContests(response);
            },
            error: function(response) {
                $(loadingId).text("Sorry, there was some error with the request. Please refresh the page.");
            }
        });
    };

    var appendContests = function(response) {
        var id = $(buttonId);

        $(buttonId).show();
        $(loadingId).hide();

        $(response).appendTo($(container));
        page += 1;
    };

})(jQuery, lazyload);

/* Script for Parallax v.1
window.onscroll =()=>{
	let scroll = window.pageYOffset;
	document.querySelector('.parallax-background').style.top = `${-scroll*0.5}px`;
}
*/
/* Script for Parallax v.2 */
$(window).scroll(function(e){
	var scrolled = $(window).scrollTop();
	$('.parallax-background').css('top',-(scrolled*0.5)+'px');
});
