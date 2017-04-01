<?php

	$error = "";
	$successMessage ="";

	if($_POST) {


		if(!$_POST["email"]) {

			$error .= "An email address is required.<br>";
		}
		if(!$_POST["subject"]) {

			$error .= "A subject is required.<br>";
		}

		if(!$_POST["content"]) {

			$error .= "Input text is required.<br>";
		}

		//validate the email
		if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {

			$error .= "The email address that you entered is not valid <br>";
		}

		// Add it all together to show the error messages
		
		if ($error != "") {

			$error = '<div class="alert alert-danger"' 
				. 'role="alert">' 
				. '<p><strong> There were error(s) in your form</strong></p>'
				. $error .'</div>';

		}

		//send if there are no errors
		else {

			$emailTo = "breanawallace131@gmail.com";
			$subject = $_POST['subject'];
			$body = $_POST['content'];
			$headers = "from: ".$_POST['email'];

			if(mail($emailTo, $subject, $body, $headers)) {
				$successMessage = '<div class="alert alert-success"' 
				. 'role="alert">' 
				. '<p><strong> Thank you, we will get back to you shortly!</strong></p>'
				.'</div>';
			} 
			else {

				$error = '<div class="alert alert-danger"' 
				. 'role="alert">' 
				. '<p><strong> Your message could not be sent, try again later. </strong></p>'
				.'</div>';

			}


		}


	}

?>

<!DOCTYPE html>
<html>

<head>
	<title>PHP Form</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

	<!-- MY LINKS -->
	<link rel="stylesheet" href="stylesheet.css"> 
	<script type="text/javascript" src="script.js"></script> 

</head>

<body>

<div  class="container-fluid" id="transparent">	

		<h1> Get in touch! </h1>

		<div id="errorMessage"><? echo $error, $successMessage ?></div>
		<div id="successMessage"></div>
	
		<form method="post">
		  <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
		  
		  </div>
		  <div class="form-group">
		    <label for="subject">Subject</label>
		    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
		  </div>
		  
		  <div class="form-group">
		    <label for="content">What would you like to ask us?</label>
		    <textarea class="form-control" id="content" name="content"rows="3"></textarea>
		  </div>
		  
		  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
		</form>

	</div>


</body>
</html>