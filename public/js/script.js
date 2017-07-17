// JavaScript Document
$(document).ready( function() {
	
	/*
	      Кнопка наверх
	*/

	// hide #back-top first
	$("#back-top").hide();

	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

	/*
	     Скрыть сообщение 
	*/

    $('#message_box').delay(2300).slideUp(1000);
    $('#message_string').delay(2300).slideUp(1000);
		
});

function qwick_search(inputString, token, type) {
    $(".find_string").removeClass();
    if (inputString.length < 3){
        // Если ничего не найдено, то скрываем выпадающий список.
        $("#qwick_search_result").fadeOut();
    }
    else{
        $.post("/search/" + type, {_token: ""+token+"", query: ""+inputString+""}, function(data) { // Do an AJAX call
            $('#qwick_search_result').fadeIn(); // Show the suggestions box
            $('#list_qwick_search_result').html(data); // Fill the suggestions box
        });
    }

    $('#new_qwick_search').blur(function(){
        $('#qwick_search_result').fadeOut();
    });

    $('.change_pass').click(function () {
        $('.pass_hidden_form').slideToggle();
    });

}