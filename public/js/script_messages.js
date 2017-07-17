// JavaScript Document
$(document).ready( function() {

    $('.respond_mess').click(function () {
        $(this).parent().parent().children('.respond_hidden_form').slideToggle();
    });

});