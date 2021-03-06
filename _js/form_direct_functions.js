$(document).ready(function() {
	/* Globals  */
	var contact_form = $("#signup_form");

	contact_form.validator().on("submit", function (event) {
		if(event.isDefaultPrevented()){
			/* Handle the failure actions  */
			tryagain();
		} else {
			/* Handle the success actions */
			event.preventDefault();
			loading();
			submit_the_form();
		}
	});

	function submit_the_form () {
		 /* Initiate variables for processing and data collection */
		 var form_data = $("#signup_form").serializeArray();
		 console.log(form_data);
		 $.ajax({
		 	url: 'assets/inc/process.php',
		 	type: 'POST',
		 	dataType: 'text',
		 	data: form_data
		 })
		 .done(function(text) {
		 	if (text.indexOf("SUCCESS") !== -1 ){
		 		// console.log(text);
		 		successActions(form_data);
		 	} else if (text.indexOf("ERROR:INVALIDEMAIL") !== -1 ){
		 		$(".email_field").addClass('has-error has-danger');
		 		$("div.email_field div.help-block.with-errors").html("<ul class=\"list-unstyled text-danger\"><li>The Email Address Is Invalid.</li></ul>");
				tryagain();
		 		// console.log(form_data);
		 		// console.log(text);
		 	} else {
		 		// console.log(form_data);
		 		// console.log(text);
		 		getServerStatusMsg(text);
				tryagain();
		 	}
		 })
		 .fail(function(text) {
		 	// console.log(text);
		 	getServerStatusMsg(text,"Internal Processor Error");
		 })
		 .always(function(text) {
			console.log("Action Complete");	
		 });
	}
	function getServerStatusMsg(statusMsg){
		$("#statuscontrol").removeClass('hidden').html(function () {
			return "<p><b>" + statusMsg + "<b></p>";
		});
	}
	function successActions(form_data) {
		var redirect_url = "wait.php";
		$(location).attr('href', redirect_url);
	}
	function loading() {
		$("#submitbutton").html("Please Wait Processing... <i class='fa fa-cog fa-spin' aria-hidden='true'></i>").prop('disabled', true);
	}
	function tryagain() {
		$("#submitbutton").html("An Error Occurred, Please Try Again!").prop('disabled', false);
	}
});
