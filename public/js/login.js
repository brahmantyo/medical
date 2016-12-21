$(function() {
	$(document).ready(function(){
		if($("#state").val() == 'register'){
			$("#register-form-link").click();
			e.preventDefault();
		}
	});
    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		$("#username").focus();
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		$("#username1").focus();
		e.preventDefault();
	});
	$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
	   $("#success-alert").slideUp(500);
	});
});
