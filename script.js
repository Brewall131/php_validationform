$(document).ready(function (){

	$("form").submit(function (e){
		
		function isEmail(email) {

		  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		 
		  return regex.test(email);

		}

		var errorMessage = "";

		var fieldsMissing = "";

		//FIELDS EMPTY

		if ($('#email').val() == "") {

			fieldsMissing += "The email field is required <br>";
		}

		if ($('#subject').val() == "") {

			fieldsMissing += "The subject field is required <br>";
		}

		if ($('#content').val() == "") {

			fieldsMissing += "The content field is required <br>";
		}

		if (fieldsMissing != "") {

			errorMessage += fieldsMissing;
		}

		//ADDING THE BOOTSTRAP ALERTS TO THE ERROR MESSAGE. OR SUBMIT

		if(errorMessage != "") {

			//this will prevent the form from submitting if there are errors
			e.preventDefault();


			$('#errorMessage').html('<div class="alert alert-danger"' 
				+ 'role="alert">' 
				+ '<p><strong> There were error(s) in your form</strong></p>'
				+ errorMessage +'</div>');
		}
	});
	//otherwise, it will submit as usual
	
	//vertically and horizontally center! YAY!
	$(function() {
    	$('#transparent').css({
        'position' : 'absolute',
        'left' : '50%',
        'top' : '50%',
        'margin-left' : -$('#transparent').outerWidth()/2,
        'margin-top' : -$('#transparent').outerHeight()/2
    });
});
});


