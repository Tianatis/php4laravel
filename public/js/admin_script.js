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

    $('.change_pass').click(function () {
        $('.pass_hidden_form').slideToggle();
        if($('.change_pass').prop('checked')){
            $("#password_field").attr('disabled', false);
            $("#password2_field").attr('disabled', false);
        }else{
             $("#password_field").attr('disabled', true);
             $("#password2_field").attr('disabled', true);
        }

    });

});