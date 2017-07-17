// JavaScript Document
$(document).ready( function() {

    $('.show_comment_box').click(function () {
        $(this).parent().children('.comment_hidden_form').slideToggle();
    });
    $('.add-comment-img').click(function () {
        $(this).parent().parent().children('.comment_hidden_form').slideToggle();
    });
});

